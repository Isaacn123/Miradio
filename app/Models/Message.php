<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;


class Message extends Model
{
    use HasFactory, MediaAlly;

    protected $fillable = [
       'cid',
       'title',
       'image_cover',
       'stream_url',

    ];


    public function category(){
        // ,'company_id', 'id'
        return $this->belongsTo('App\Models\Category','cid', 'id');
    }

    public function audios(){
        // ,'company_id', 'id'
        return $this->hasMany('App\Models\Audio');
    }


}
