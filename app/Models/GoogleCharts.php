<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class GoogleCharts extends Model
{
    //
    protected $table = 'googleCharts';
    protected $fillable = [
        'name','google_src','pet_column_id','describe'
    ];
    public function petColumn(){
        return $this->belongsTo('App\Models\PetColumn');
    }
}
