<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worship extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'music_name' ,
        'music_image',
        'music_url',
        'featured',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id', 'id');
         }
}
