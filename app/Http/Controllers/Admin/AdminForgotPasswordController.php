<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // ✅ Correct import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Admin;

class AdminForgotPasswordController extends Controller
{
    /**
     * Show the admin forgot password form.
     */
    public function showLinkRequestForm()
    {
        return view('admin.password.email');
    }

    /**
     * Send password reset link to admin email.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:admins,email']);

        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email, 'guard' => 'admin'],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        $resetLink = route('admin.password.reset', $token) . '?email=' . urlencode($request->email);

        Mail::raw("Reset your admin password using this link:\n\n$resetLink", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Admin Password Reset');
        });

        return back()->with('status', 'Reset link sent to your email!');
    }

    /**
     * Show password reset form for admin.
     */
    public function showResetForm($token)
    {
        return view('admin.password.reset', ['token' => $token]);
    }

    /**
     * Handle password reset.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        $resetData = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token, 'guard' => 'admin'])
            ->first();

        if (!$resetData) {
            return back()->withErrors(['email' => 'Invalid token or email.']);
        }

        // Update admin password
        Admin::where('email', $request->email)
            ->update(['password' => bcrypt($request->password)]);

        // Delete reset record
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('admin.login')->with('status', 'Password reset successfully!');
    }
}
