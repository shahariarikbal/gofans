<?php

namespace App\Models;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Model;

class TrafficSource extends Model
{
    protected $fillable = ['campaign_id','traffic_source_name'];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}
