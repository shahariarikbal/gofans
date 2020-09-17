<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $table = 'contact_settings';

    protected $fillable = [
        'type', 'email_1', 'email_2', 'phone_number_1', 'phone_number_2', 'address', 'map'
    ];
}
