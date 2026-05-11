<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'instagram','tiktok','whatsapp','address','about','open_hours','qris_image'
    ];
}