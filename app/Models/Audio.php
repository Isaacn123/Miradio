<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $fillable =[
        'message_id',
        'file_url',
        'audio_title',
        'file_type',
        'size'
    ];
    public function message(){
        // ,'company_id', 'id'
        return $this->belongsTo('App\Models\Message','audio_id', 'id');
    }
}
