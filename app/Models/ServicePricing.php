<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePricing extends Model
{
    protected $fillable = ['service_id', 'service_mode', 'platform', 'pay_mode', 'required_days', 'times', 'min_price', 'max_price',];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
