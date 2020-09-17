<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $table = 'user_messages';
    protected $fillable = [
        'subject', 'message'
    ];

    public function getMessage(){
        return $this->hasMany(UserMessageSend::class, 'message_id', 'id');
    }
}
