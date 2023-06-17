<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fcm_template extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'image',
        'title',
        'link',
    ];
}
