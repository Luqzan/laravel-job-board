<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => 'required|email|unique:users,email',
                'name' => 'required|min:3',
                'password' => [
                    'required',
                    'min:8',
                    'confirmed',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/',
                ],
            ],
            [
                'email.required' => 'The email field is required.',
                'email.email' => 'Please provide a valid email address.',
                'email.unique' => 'This email address is already registered.',
                'name.required' => 'The name field is required.',
                'name.min' => 'The name must be at least 3 characters long.',
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least 8 characters long.',
                'password.confirmed' => 'The password confirmation does not match.',
                'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            ]
        );

        try {
            $user = User::create([
                'email' => $validatedData['email'],
                'name' => $validatedData['name'],
                'email_verified_at' => now(),
                'password' => Hash::make($validatedData['password']),
                'remember_token' => Str::random(10),
            ]);

            if ($user) {
                return redirect()->route('auth.create')->with('success', 'User registered successfully.');
            } else {
                return redirect()->back()->with('error', 'User registration failed. Please try again.');
            }
        } catch (\Exception $e) {
            Log::error('User registration error: '.$e->getMessage());

            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
