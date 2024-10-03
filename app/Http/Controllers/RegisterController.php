<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|min:3',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:5',
            'address' => 'required',
            'dob' => ['required', 'date', 'before:' . Carbon::now()->subYears(17)->toDateString()],
        ], [
            'dob.before' => 'You must be at least 17 years old.',
        ]);

        User::create($validated);
        session()->flash('success', 'Registration Successfull! Please Login');
        return redirect('/login');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validate = [
            'address' => 'required',
            'dob' => ['required', 'date', 'before:' . Carbon::now()->subYears(17)->toDateString()],
        ];

        if ($request->username != $user->username) {
            $validate['username'] = 'required|unique:users|min:3';
        }

        if ($request->email  != $user->email) {
            $validate['email'] = 'required|unique:email|email:dns';
        }

        $validated = $request->validate($validate);
        User::where('id', $user->id)->update($validated);
        return redirect(route('profile', $user->id))->with('success', 'Profile has been updated!');
    }

    public function image(Request $request, $id)
    {

        $user = User::find($id);
        $validated = $request->validate([
            'userKTP' => 'required|image|max:4096',
        ]);

        $validated['userKTP'] = $request->file('userKTP')->store('ktp', 'public');
        $user->verifStatus = 'Pending';
        $user->save();

        User::where('id', $user->id)->update($validated);
        return redirect(route('profile', $user->id))->with('success', 'Image saved');
    }
}
