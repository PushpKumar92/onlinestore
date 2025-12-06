<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Wishlist;
use App\Models\Category;
use DB;
Use Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        
        return view('frontend.profile.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Registered successfully! Please login.');
    }
    public function showLoginForm()
    {
        return view('frontend.profile.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'login' => 'required',
        'password' => 'required',
    ]);

    $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

    // Check if user exists
    $userExists = \App\Models\User::where($loginType, $request->login)->exists();

    if (!$userExists) {
        return back()->withErrors(['login' => 'This account is not registered.']);
    }

    $credentials = [
        $loginType => $request->login,
        'password' => $request->password,
    ];

    if (Auth::guard('user')->attempt($credentials)) {
        return redirect()->route('index');
    }

    return back()->withErrors(['login' => 'Invalid credentials.']);
}



public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = Auth::guard('user')->user();

    // Check if current password matches
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    // Update the password
    $user->password = Hash::make($request->password);
    $user->save();

    return back()->with('success', 'Password updated successfully.');
}
   
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('index');
    }
    

    public function showProfile()
{
    $user = Auth::guard('user')->user();
     // Fetch user orders with products
    $orders = Order::with('items.product')->where('user_id', $user->id)->get();

    // Fetch wishlist products
    $wishlistItems = Wishlist::with('product')->where('user_id', $user->id)->get();
     $categories = Category::all();

    return view('frontend.profile.userprofile', compact('user','orders','wishlistItems','categories'));
}

public function editProfile()
{
    $user = Auth::guard('user')->user();
    return view('frontend.profile.editprofile', compact('user'));
}

public function updateProfile(Request $request)
{
    $user = Auth::guard('user')->user();

     $request->validate([
        'name'     => 'required|string|max:255',
        'email'          => 'required|email|unique:users,email,' . $user->id,
        'mobile'         => 'nullable|string|max:20',
        'country'        => 'nullable|string|max:100',
        'address'        => 'nullable|string|max:255',
        'city'           => 'nullable|string|max:100',
        'pinocde'            => 'nullable|string|max:20',
        'profile_image'  => 'nullable|image|max:2048',
    ]);

    // Save user data
    $user->name = $request->name;
    $user->email      = $request->email;
    $user->mobile     = $request->mobile;
    $user->country    = $request->country;
    $user->address    = $request->address;
    $user->city       = $request->city;
    $user->pincode        = $request->pincode;

    if ($request->hasFile('profile_image')) {
        if ($user->profile_image && File::exists(public_path('profile_images/' . $user->profile_image))) {
            File::delete(public_path('profile_images/' . $user->profile_image));
        }

        $image = $request->file('profile_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('profile_images'), $imageName);
        $user->profile_image = $imageName;
    }

    $user->save();

    return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
}

 public function index()
    {
        $users = User::all(); // fetch all users
        return view('admin.user.index', compact('users'));
    }


}