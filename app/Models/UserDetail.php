<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id', 'cover_photo', 'skype_id', 'gender', 'date_of_birth', 'career', 'education', 'skill', 'wedding_day', 'about_me', 'current_city', 'home_city', 'device', 'device_id', 'os', 'brand', 'model',
    ];
}
