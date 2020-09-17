<?php

namespace App;

use App\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WaletBox extends Model
{
    use SoftDeletes;

    protected $fillable = 
    [
    'client_id',
    'campaign_id',
    'amount',
    'fund_type',
    'fund_source',
    'fund_source_detail',
    'fund_added_by',
   ];
   public function client()
   {
       return $this->belongsTo(Client::class, 'client_id');
   }
}
