<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable=[
        'name','thumbnail'
    ];
    public function tasks(){
        return $this->hasMany('App\Task');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function getThumbnailAttribute($value){
        if(!$value)
        {
            return 'laravel.jpg';
        }
        else
            return $value;
    }
}
