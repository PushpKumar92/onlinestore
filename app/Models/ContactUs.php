<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'is_replied'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_replied' => 'boolean',
    ];

    // Scope for unread messages
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    // Scope for unreplied messages
    public function scopeUnreplied($query)
    {
        return $query->where('is_replied', false);
    }

    // Get formatted date
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('M d, Y h:i A');
    }

    // Get subject label
    public function getSubjectLabelAttribute()
    {
        $subjects = [
            'general' => 'General Inquiry',
            'support' => 'Customer Support',
            'order' => 'Order Issue',
            'feedback' => 'Feedback',
            'other' => 'Other'
        ];

        return $subjects[$this->subject] ?? ucfirst($this->subject);
    }
}