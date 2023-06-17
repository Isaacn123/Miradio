<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
// implements HasMedia
class Album extends Model 
{
    // use HasFactory, InteractsWithMedia, MediaAlly;
    use HasFactory, MediaAlly;

    protected $fillable = [
        'title',
        'url'
    ];



    public function songs(){
        return $this->hasMany('App\Models\Songs');
    }
    
}
