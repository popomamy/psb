<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:6'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);
        $user->assignRole('siswa');

        $request->session()->flash('success', 'Registration success');

        return redirect()->route('login');
    }
}
