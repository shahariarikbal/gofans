<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsCode extends Model
{

    protected $table = 'sms_codes';

    protected $fillable = [
      'user_id', 'client_id', 'code'
    ];

}
