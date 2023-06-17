<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radios extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id' ,
        'radio_name',
        'radio_image',
        'radio_url',
        'featured',
        'last_update'
    ];

}
