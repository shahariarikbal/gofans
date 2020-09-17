<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketSubject extends Model
{
    protected $table = 'ticket_subjects';
    protected $fillable = [
        'name', 'description', 'status'
    ];
}
