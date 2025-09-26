<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatePasswordRequest;


class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        return Inertia::render('Auth/Register');
    }


    public function showLoginForm()
    {
        return Inertia::render('Auth/Login');
    }

    public function registerUser(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        User::create($validatedData);
        return redirect()->route('user.auth.showLoginForm');
    }

    public function loginUser(LoginUserRequest $request)
    {
        dd($request->all());

        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            
            return redirect()->route('home');
        }
        return back()->with('message', ['message' => 'Incorrect email or password', 'type' => 'error']);
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('message', ['message' => 'good bay', 'type' => 'success']);
    }

    public function changePassword(UpdatePasswordRequest $request)
    {

        $checkPassword = Hash::check($request->validated()['currentPassword'], $request->user()->password);

        if ($checkPassword) {
            $request->user()->password = $request->newPassword;
            $request->user()->save();
            return redirect()->back()->with('message', ['message' => 'Password Change Successful', 'type' => 'success']);
        }
        return redirect()->back()->with('message', ['message' => 'Incorrect Password', 'type' => 'error']);
    }
}
