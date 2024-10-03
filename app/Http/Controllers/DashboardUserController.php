<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard/user-dashboard", [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // dd($user);
        return view("dashboard/edit-user", [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = [
            'address' => 'required',
            'dob' => ['required', 'date', 'before:' . Carbon::now()->subYears(17)->toDateString()],
            'verifStatus' => 'required|string|in:Not Verified,Pending,Verified',
        ];

        if ($request->username != $user->username) {
            $validate['username'] = 'required|unique:users|min:3';
        }

        if ($request->email  != $user->email) {
            $validate['email'] = 'required|unique:email|email:dns';
        }

        $validated = $request->validate($validate);

        User::where('id', $user->id)->update($validated);
        return redirect('/dashboard/users')->with('success', 'User has been updated!');
    }

    public function destroy(User $user)
    {
        dd($user);
        // User::destroy($user->id);
        return redirect('dashboard/users')->with('success', 'User has been deleted!');
    }
}
