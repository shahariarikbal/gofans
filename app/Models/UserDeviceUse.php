<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDeviceUse extends Model
{
    protected $table = 'user_device_uses';
    protected $fillable = ['user_id', 'android', 'ios', 'desktop', 'all'];
}
