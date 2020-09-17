<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = [
            'category_id',
            'description',
            'link_heading',
            'link_label',
            'link_view_label',
            'service_type',
            'name',
            'mode',
            'mobile_platform',
            'app_type',
            'track_album',
            'track_album_playlist',
            'keyword_option',
            'tracking_mode',
            'timing_mode',
            'verify_mode',
            'status',
    ];

     public function service_price()
     {
         return $this->hasMany(ServicePricing::class, 'service_id');
     }

     public function campaign()
     {
        return $this->hasMany(Campaign::class, 'service_id');
     }

    public function audienceCampaigns()
    {
        return $this->hasMany(Campaign::class, 'service_id')
            ->orderBy('bid_amount', 'desc')
            ->where('status', 1);
    }

     public function category()
     {
         return $this->belongsTo(Category::class, 'category_id');
     }
}
