<?php

namespace App\Http\Controllers;

use App\Enums\AdminStatus;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::user()) {
            return redirect()->route('dashboard');
        }

        return view('pages.auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        $user = Admin::where(
            'username',
            $request->username
        )->first();

        if (is_null($user) || ! Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->withErrors(['message' => 'Invalid username or password']);
        } elseif (in_array($user->status->value, [AdminStatus::Banned, AdminStatus::Disable])) {
            return redirect()->route('login')->withErrors(['message' => 'Your Account Disable, Please Contact Admin !']);
        } elseif (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
