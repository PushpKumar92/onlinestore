<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\User;

class UserForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('frontend.password.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email, 'guard' => 'user'],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        $resetLink = route('password.reset', $token) . '?email=' . urlencode($request->email);

        Mail::raw("Reset your user password using this link: $resetLink", function ($message) use ($request) {
            $message->to($request->email)->subject('User Password Reset');
        });

        return back()->with('status', 'Reset link sent to your email!');
    }

    public function showResetForm($token)
    {
        return view('frontend.profile.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        $resetData = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token, 'guard' => 'user'])
            ->first();

        if (!$resetData) {
            return back()->withErrors(['email' => 'Invalid token or email']);
        }

        User::where('email', $request->email)
            ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('login')->with('status', 'Password reset successfully!');
    }
}
