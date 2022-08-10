<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductMedia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'image',
    ];

    /**
     * Define Relationship, One Product_media can belongs To One Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
