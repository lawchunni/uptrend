<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'response',
        'status',
        'credit_card_info',
    ];

    /**
     * Define Relationship, One Transaction can belongs To one Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
