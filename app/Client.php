<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notifications\ClientResetPasswordNotification;

class Client extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'skype_id', 'mobile_number', 'profile_photo', 'balance','password', 'status', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Send password reset notification
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPasswordNotification($token));
    }

    public function balance()
    {
        $deposits = WaletBox::where('client_id',$this->id)->where('fund_type','=','deposite')->sum('amount');
        $withdraw = WaletBox::where('client_id',$this->id)->where('fund_type','=','withdraw')->sum('amount');
        return $deposits - $withdraw;
    }

   /*  public function getBalanceAttribute()
    {
        return $this->balance;
    } */
}
