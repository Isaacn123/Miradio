<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class Category extends Model
{
    use HasFactory, MediaAlly;

    protected $fillable = [
        'category_name',
        'category_image',
        'featured',
        'slug'
    ];

    public function messages(){
    
        return $this->hasMany('App\Models\Message','cid', 'id');  
    }
}

