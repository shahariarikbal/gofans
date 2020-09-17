<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignView extends Model
{
    protected $fillable = [
        'campaign_id',
        'user_id',
        'quantity',
        'amount',
        'point',
        'mobile_brand',
        'mobile_model',
        'device_id',
        'os',
        'os_version',
        'browser_info',
        'ip',
        'verification_status',
        'verified_date',
    ];

    public function camping(){
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }
}
