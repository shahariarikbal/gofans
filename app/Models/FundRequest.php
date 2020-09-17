<?php

namespace App\Models;

use App\Client;
use App\Attachment;
use Illuminate\Database\Eloquent\Model;

class FundRequest extends Model
{
    protected $fillable = [
        'client_id'
        ,'amount'
        ,'remarks'
        ,'status'
    ];

    public function requestAttachments()
    {
        return $this->morphMany(Attachment::class, 'attachment');
    }

    public function getStatusAliasAttribute()
    {
        if($this->status == 0) return "Pending";
        else if($this->status == 1) return "Approved";
        else if($this->status == 2) return "Rejected";
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
