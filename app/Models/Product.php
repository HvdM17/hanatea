<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','slug','category','description','price','image','status','sold_count',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}