<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $table = 'faq_categories';
    protected $fillable = [
      'name', 'description', 'status'
    ];

    public function getFaq(){
        return $this->hasMany(Faq::class, 'faq_category_id', 'id')->where('status', 1);
    }
}
