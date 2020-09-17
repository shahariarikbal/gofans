<?php

namespace App\Models;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Model;

class CampaignPrice extends Model
{
    protected $fillable = [
        'campaign_id',
        'quantity',
        'amount',
    ];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}
