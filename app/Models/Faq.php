<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'type', 'faq_category_id', 'question', 'answer', 'status'
    ];

    public function faqCategory(){
        return $this->belongsTo(FaqCategory::class, 'faq_category_id', 'id');
    }
}
