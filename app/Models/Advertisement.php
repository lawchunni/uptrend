<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertisement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image',
        'title',
        'link',
        'pages',
        'area',
    ];
}
