<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use QCod\ImageUp\HasImageUploads;
use Carbon\Carbon;
class Visitor extends Authenticatable
{
    use Notifiable, HasImageUploads;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function getCreatedAtAttribute($timestamp) {
        return Carbon::parse($timestamp)->format('d M Y');
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

}
