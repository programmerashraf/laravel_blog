<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;
use Carbon\Carbon;

class Post extends Model
{
    use Taggable;

    protected $fillable = [ 'title', 'body', "category_id", "image",'user_id','slug'];

    public function getCreatedAtAttribute($timestamp) {
        return Carbon::parse($timestamp)->format('d M Y');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany("App\Comment");
    }

}
