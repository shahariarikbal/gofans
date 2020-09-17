<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLoginLog extends Model
{
    protected $table = 'user_login_logs';

    protected $fillable = [
        'user_id', 'county_name', 'ip_address', 'device', 'browser', 'version'
    ];
}
