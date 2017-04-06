<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetColumn extends Model
{
    //
    protected $table = 'petColumn';
    protected $fillable = [
        'name','is_public','thumbnail','user_id','describe'
    ];
    public function users(){
        return $this->belongsTo('App\User');
    }
    public function googleCharts(){
        return $this->hasMany('App\Models\GoogleCharts');
    }
}
