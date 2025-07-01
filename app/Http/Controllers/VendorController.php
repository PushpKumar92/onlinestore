<?php


namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VendorApproved;

class VendorController extends Controller
{
   public function register()
{
    return view('vendor.register');
}

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:vendors',
            'mobile' => 'required',
            'address' => 'required',
            'shop_name' => 'required',
            'shop_url' => 'required',
            'password' => 'required|confirmed',
        ]);

        Vendor::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'shop_name' => $request->shop_name,
            'shop_url' => $request->shop_url,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('message', 'Registration successful. Awaiting admin approval.');
    }

    public function login(Request $request)
    {
        $vendor = Vendor::where('email', $request->email)->first();

        if (!$vendor || !Hash::check($request->password, $vendor->password)) {
            return back()->withErrors(['Invalid credentials.']);
        }

        if (!$vendor->is_approved) {
            return back()->withErrors(['Your account is not yet approved by admin.']);
        }

        session(['vendor_id' => $vendor->id]);
        return redirect()->route('vendor.dashboard');
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

        Mail::to($vendor->email)->send(new VendorApproved($vendor));
        // You can also send SMS here using Twilio or Fast2SMS

        return back()->with('success', 'Vendor approved successfully!');
    }
}

