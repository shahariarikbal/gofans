<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWithdrawRate extends Model
{
    protected $table = 'user_withdraw_rates';

    protected $fillable = [
        'minimum_amount', 'maximum_amount', 'status'
    ];
}
