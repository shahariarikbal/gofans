<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SideNotification extends Model
{
    protected $table = 'side_notifications';
    public $timestamps = true;
    protected $fillable = [
      'user_id', 'client_id', 'type', 'message', 'status', 'is_delete',
    ];


}
