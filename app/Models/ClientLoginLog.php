<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientLoginLog extends Model
{
    protected $table = 'client_login_logs';

    protected $fillable = [
        'client_id', 'county_name', 'ip_address', 'device', 'browser', 'version'
    ];
}
