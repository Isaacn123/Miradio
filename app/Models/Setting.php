<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable =[
        'app_fcm_key',
        'api_key',
        'package_name',
        'onesignal_app_id',
        'onesignal_rest_api_key',
        'protocol_type',
        'privacy_policy'
    ];
}
