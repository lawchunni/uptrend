<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'color',
        'description',
        'price',
        'quantity',
        'gender_id',
        'size_id',
    ];

    /**
     * Define Relationship, One Product can belongs To one Size
     */
    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    /**
     * Define Relationship, One Product can have one Gender
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * Define Relationship, One Product can have many Product_media
     */
    public function product_media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    /**
     * Define Relationship, One Product can have many Category
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Define Relationship, One Product can belongs To many Order
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class);
    }
}
