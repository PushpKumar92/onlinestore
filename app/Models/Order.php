<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'billing_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_country',
        'billing_city',
        'billing_zip',
        'payment_method',
        'total_amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Status badge color helper
    public function getStatusBadgeClassAttribute()
    {
        return match($this->status) {
            'pending' => 'bg-warning text-dark',
            'confirmed' => 'bg-info',
            'processing' => 'bg-primary',
            'shipped' => 'bg-primary',
            'delivered' => 'bg-success',
            'cancelled' => 'bg-danger',
            'refunded' => 'bg-secondary',
            default => 'bg-secondary',
        };
    }

    // Scope for filtering orders
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}