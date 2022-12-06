<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_number', 'user_id', 'status', 'grand_total', 'item_count', 'payment_status', 'payment_method',
        'first_name', 'last_name', 'address', 'city', 'country', 'post_code', 'phone_number', 'notes'
    ];

    /**
     * Orders BelongsTo a single User 
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * One Order can have Many Items for eg: Apple and Samsung
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
