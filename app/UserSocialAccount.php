<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'account_type', 'account_id', 'account_token', 'social_permission', 'other_data', 'refresh_token', 'response_object',
    ];
}
