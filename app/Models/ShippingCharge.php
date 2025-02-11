<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingCharge extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'continent',
        'country',
        'charge',
    ];

    protected $date = [
        'deleted_at'
    ];
}
