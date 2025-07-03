<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $vendor;

    public function __construct($vendor)
    {
        $this->vendor = $vendor;
    }

    public function build()
    {
        return $this->to($this->vendor->email, $this->vendor->name)
                    ->subject('Your Vendor Account has been Approved')
                    ->view('frontend.vendor.vendor_approve')
                    ->with([
                        'vendor' => $this->vendor
                    ]);
    }
}