<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\DashboardEventController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Activity;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/volunteer', function () {
    return view('volunteer', ['activities' => Activity::all()]);
})->name('volunteer');

Route::get('/article', function () {
    return view('article');
})->name('article');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::middleware(['web'])->group(function () {
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', function () {
    return view('register');
})->name('register')->middleware('guest');

Route::middleware(['web'])->group(function () {
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
})->name('admin.dashboard')->middleware('auth');

Route::get('/dashboard/create-activity', function () {
    return view('dashboard/create_activity');
})->name('create-activity')->middleware('auth');

Route::resource('/dashboard/users', DashboardUserController::class)->middleware('auth')->names(['index' => 'dashboard.user']);

Route::resource('/dashboard/events', DashboardEventController::class)->middleware('auth')->names(['index' => 'dashboard.event', 'create' => 'dashboard.event.create', 'store' => 'dashboard.event.store', 'edit' => 'dashboard.event.edit', 'update' => 'dashboard.event.update', 'destroy' => 'dashboard.event.destroy']);

Route::resource('/dashboard/articles', DashboardArticleController::class)->middleware('auth')->names(['index' => 'dashboard.article', 'create' => 'dashboard.article.create', 'store' => 'dashboard.article.store', 'edit' => 'dashboard.article.edit', 'update' => 'dashboard.article.update', 'destroy' => 'dashboard.article.destroy']);
// Route::post('/dashboard/create-activity', [ActivityController::class, 'store'])->name('activity.store');


Route::get('/volunteer/{Activity:id}', function ($id) {
    $activity = Activity::find($id);
    return view('volunteer-detail', ['activity' => $activity]);
})->middleware('auth')->name('volunteer.detail');

Route::post('/volunteer/join', [ActivityController::class, 'join'])->name('volunteer.join');
Route::post('/volunteer/leave', [ActivityController::class, 'leave'])->name('volunteer.leave');

// Route::get('/volunteer-user/{User:id}', function (User $user) {
//     return view('volunteer-user', ['activities' => $user->activities]);
// })->name('volunteer.user');

Route::get('/volunteer-user/{User:id}', function ($id) {
    $user = User::find($id);
    return view('volunteer-user', ['activities' => $user->activities]);
})->name('volunteer.user');

Route::get('/profile/{User:id}', function ($id) {
    $user = User::find($id);
    return view('profile', ['user' => $user]);
})->name('profile');

Route::put('/profile/{User}', [RegisterController::class, 'update'])->name('profile.update');

Route::get('/article', function () {
    return view('article', ['articles' => Article::All()]);
})->name('article');

Route::get('/article/{Article:id}', function ($id) {
    $article = Article::find($id);
    return view('article-detail', ['article' => $article]);
})->name('article.detail');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/verif', function () {
    return view('verif');
})->name('verif');

Route::put('/verif/{User}', [RegisterController::class, 'image'])->name('verif.image');


Route::middleware(['web'])->group(function () {
    Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
});

Route::get('/dashboard/check/{Activity:ID}', function ($id) {
    $activity = Activity::find($id);
    return view('dashboard/check-activity', ['users' => $activity->users, 'title' => $activity->activityTitle]);
})->name('dashboard.event.check');
