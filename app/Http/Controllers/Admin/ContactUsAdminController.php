<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsAdminController extends Controller
{
    // List all contact messages
    public function index()
    {
        $contacts = ContactUs::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    // Show single message
    public function show($id)
    {
        $contact = ContactUs::findOrFail($id);
        
        // Mark as read
        if (!$contact->is_read) {
            $contact->is_read = true;
            $contact->save();
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    // Mark as replied
    public function markReplied($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->is_replied = true;
        $contact->save();
        
        return redirect()->back()->with('success', 'Marked as replied!');
    }

    // Delete message
    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();
        
        return redirect()->back()->with('success', 'Message deleted successfully!');
    }
}