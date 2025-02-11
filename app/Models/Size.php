<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    protected $date = [
        'deleted_at'
    ];

    /**
     * Define Relationship, One Size can have many Product
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
