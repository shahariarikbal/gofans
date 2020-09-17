<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $table = 'friendships';
    protected $fillable = [
        'sender_id', 'receiver_id', 'status',
    ];

}
