<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as RestPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'uid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'email_verified', 'status', 
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
     * 发送重置密码邮件
     *
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RestPasswordNotification($token));
    }
}
