<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'image',
    ];

    /**
     * Define Relationship, One Category can have many Product
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
