<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }
            return redirect()->intended(route('home'));;
        }

        return back()->with('loginError', 'Email or Password Wrong');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('home'));
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $registeredUser = User::where("google_id", $googleUser->id)->first();

        if (!$registeredUser) {
            $user = User::updateOrCreate([
                'google_id' => $googleUser->id,
            ], [
                'username' => Str::slug($googleUser->getName()),
                'email' => $googleUser->email,
                'password' => Hash::make('123'),
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
                'dob' => '2000-01-01',
                'address' => 'Edit Here',
            ]);

            Auth::login($user);

            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect('/');
        }


        Auth::login($registeredUser);

        if ($registeredUser->role === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect('/');
    }
}
