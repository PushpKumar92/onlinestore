<?php


namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VendorApproved;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
   public function register()
{
    return view('frontend.vendor.register');
}

public function registerSubmit(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:vendors,email',
        'mobile' => 'required|string|max:15|unique:vendors,mobile',
        'address' => 'required|string|max:255',
        'shop_name' => 'required|string|max:100|unique:vendors,shop_name',
        'shop_url' => 'required|string|max:100|unique:vendors,shop_url',
        'password' => 'required|string|min:6|confirmed',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $vendor = new Vendor();
    $vendor->fill($validatedData);
    $vendor->password = bcrypt($request->password);

    if ($request->hasFile('profile_image')) {
        $imageName = time() . '.' . $request->profile_image->extension();
        $request->profile_image->move(public_path('vendor'), $imageName);
        $vendor->profile_image = $imageName;
    }

    $vendor->is_approved = 0;
    $vendor->save();

    return redirect()->route('vendor.login')->with('message', 'Registration successful! Please wait for admin approval.');
}

public function showvendorlogin(){
    return view ('frontend.vendor.login');
}
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('vendor')->attempt($credentials)) {
            return redirect()->route('vendor.dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
public function showdashboard(){
    return view('frontend.vendor.dashboard');
}
    
    public function showPendingVendors()
    {
        $vendors = Vendor::where('is_approved', false)->get();
        return view('admin.pending_vendors', compact('vendors'));
    }

    public function approveVendor($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->is_approved = true;
        $vendor->save();

        Mail::to('ashvanimaurya22@gmail.com')->send(new VendorApproved($vendor));
        // You can also send SMS here using Twilio or Fast2SMS

        return back()->with('success', 'Vendor approved successfully!');
    }
     public function decline($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete(); // or use soft delete if using SoftDeletes trait
        return back()->with('success', 'Vendor declined and removed.');
    }
      public function index()
    {
        $vendors = Vendor::orderBy('created_at', 'desc')->get();
        return view('admin.vendor.index', compact('vendors'));
    }
 public function showVendor()
{
    $vendors = Vendor::where('is_approved', true)->get();
    return view('frontend.sellers', compact('vendors'));
}


public function showChangePasswordForm()
{
    return view('vendor.change-password');
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    $admin = Auth::guard('vendor')->user();

    if (!Hash::check($request->current_password, $admin->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    $admin->password = Hash::make($request->new_password);
    $admin->save();

    return back()->with('success', 'Password changed successfully.');
}

    

    public function logout()
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login');
    }
}