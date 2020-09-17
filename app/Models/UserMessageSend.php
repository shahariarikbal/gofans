<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMessageSend extends Model
{
    protected $table = 'user_message_sends';
    protected $fillable = [
        'user_id', 'message_id', 'status'
    ];

    public function message(){
        return $this->belongsTo(UserMessage::class, 'message_id', 'id');
    }
}
