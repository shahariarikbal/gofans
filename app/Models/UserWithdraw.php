<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWithdraw extends Model
{
    protected $table = 'user_withdraws';
    protected $fillable = [
      'user_id',
      'withdraw_point',
      'withdraw_amount',
      'payment_method',
      'payment_id',
      'requested_at',
      'approved_at',
      'status',
    ];
}
