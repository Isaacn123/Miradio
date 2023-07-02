<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable =[
     'firstname',
     'company_id',
     'lastname',
     'full_name',
     'occupation',
     'email',
     'phone',
     'mobile',
     'date_of_birth',
     'country',
     'photoUrl',
      


    ];
}