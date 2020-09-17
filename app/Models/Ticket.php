<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $table = 'tickets';
    protected $fillable = [
        'subject_id', 'message', 'status', 'close_date'
    ];

    public function subject(){
        return $this->belongsTo('App\Models\TicketSubject', 'subject_id', 'id');
    }
}
