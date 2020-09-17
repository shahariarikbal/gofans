<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Category;
use App\Models\CampaignPrice;
use App\Models\TrafficSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes;
    protected $fillable =
    [
            'id',
            'category_id',
            'service_id',
            'name',
            'link',
            'keywords',
            'start_date',
            'end_date',
            'bid_amount',
            'quantity',
            'day_limit',
            'mobile_platform',
            'app_type',
            'app_type_price',
            'play_type',
            'mode',
            'status',
            'mode_value',
            'country_mode',
            'additional_data',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function traffic_source()
    {
        return $this->hasMany(TrafficSource::class, 'campaign_id');
    }
    public function campaign_price()
    {
        return $this->hasMany(CampaignPrice::class, 'campaign_id');
    }
}
