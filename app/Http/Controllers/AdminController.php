<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function adminDashboard()
    {
        $userCount = User::count();
      
        return view('admin.dashboard', compact('userCount'));
    }


public function showChangePasswordForm()
{
    return view('admin.change-password');
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    $admin = Auth::guard('admin')->user();

    if (!Hash::check($request->current_password, $admin->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    $admin->password = Hash::make($request->new_password);
    $admin->save();

    return back()->with('success', 'Password changed successfully.');
}

    

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}