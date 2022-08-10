<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'gst',
        'pst',
        'hst',
        'sub_total',
        'shipping_charge',
        'total',
        'order_status',
        'shipping_address',
        'billing_address',
    ];

    /**
     * Define Relationship, One Order can belongs To many Product
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->using(OrderProduct::class)->withPivot('unit_price', 'quantity', 'line_price', 'product_name', 'size', 'updated_at', 'created_at');
    }

    /**
     * Define Relationship, One Order can belongs To One User
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    /**
     * Define Relationship, One Order can belongs To one Transaction
     */
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
