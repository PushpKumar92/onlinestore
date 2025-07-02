<?php

namespace App\Mail;

use App\Models\Vendor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $vendor;

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    public function build()
    {
        return $this->subject('Your Vendor Account has been Approved')
            ->view('frontend.vendor.vendor_approve');
    }
}