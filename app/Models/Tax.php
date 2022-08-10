<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tax extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'province',
        'province_short',
        'gst',
        'pst',
        'hst',
    ];
}
