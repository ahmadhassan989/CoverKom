<?php

namespace App\Models;
use App\Events\OrderCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_message','seller_name', 'seller_acount', 'seller_phone', 'duration', 'amount', 'total', 'used_acount', 'seller_address'
    ];

    protected $dispatchesEvents = [
        'created' => OrderCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
