<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function show(User $user)
    {
         return view('admin.show', compact('user'));
    }

    // public function edit(User $user)
    // {
    //     return view('users.edit', compact('user'));
    // }

    // public function update(Request $request, User $user)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //     ]);

    //     $user->update($request->all());

    //     return redirect()->route('users.index')->with('success', 'User updated successfully.');
    // }

    // public function destroy(User $user)
    // {
    //     $user->delete();
    //     return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    // }
}
