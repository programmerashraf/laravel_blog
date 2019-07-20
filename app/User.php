<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use QCod\ImageUp\HasImageUploads;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable, HasImageUploads;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',"admin","bio"
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

    protected static $imageFields = [
        'image' => [
            'placeholder' => 'https://api.adorable.io/avatars/160',
            'width' => 160,
            'height' => 160,
            'resize_image_quality' => 90,
            'crop' => true
        ]
    ];

    public function getCreatedAtAttribute($timestamp) {
        return Carbon::parse($timestamp)->format('d M Y');
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }


    public function posts(){
        return $this->hasMany('App\Post');
    }


    public function delete()
    {
        // delete all related photos
        $this->posts()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }

}
