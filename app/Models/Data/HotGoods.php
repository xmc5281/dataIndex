<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;
use App\Models\Epet\Dim\DimGoods;
use App\Models\Epet\Dim\DimBrand;
use App\Models\Epet\Dim\DimCategory;
class HotGoods extends Model
{
    //
    protected $table = 'top_goods';
    public function dimGood(){
        return $this->hasOne('App\Models\Epet\Dim\Dimgoods','gid','gid');
    }
    public function getGidAttribute($value){
        $dd = DimGoods::findOrFail($value);
        return $dd->subject;
    }
    public function getCateidAttribute($value){
//        $dd = DimCategory::where('cateid',$value)->get()->toArray();
        $dd = DimCategory::findOrFail($value);
      //  dd($dd);
//        return $dd[0]['name'];
        return $dd->name;
    }
}
