<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    // Show contact form
    public function index()
    {
      
           $categories = Category::all();
        return view('frontend.contact-us',compact('categories'));
    }

    // Store contact form data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|in:general,support,order,feedback,other',
            'message' => 'required|string|min:10|max:1000',
        ]);

        try {
            // Store in database
            $contact = ContactUs::create($validated);

            // Optional: Send email notification to admin
            // $this->sendAdminNotification($contact);

            // Optional: Send acknowledgment email to user
            // $this->sendUserAcknowledgment($contact);

            return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    // Optional: Send email to admin
    private function sendAdminNotification($contact)
    {
        // Implement email logic here
        Mail::to('admin@example.com')->send(new \App\Mail\ContactFormSubmitted($contact));
    }

    // Optional: Send acknowledgment email to user
    private function sendUserAcknowledgment($contact)
    {
        // Implement email logic here
        Mail::to($contact->email)->send(new \App\Mail\ContactFormAcknowledgment($contact));
    }
}