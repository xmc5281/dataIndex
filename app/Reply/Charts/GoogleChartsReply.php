<?php
/**
 * Created by PhpStorm.
 * User: 76683
 * Date: 2017/2/6
 * Time: 17:15
 */

namespace App\Reply\Charts;

use App\Models\GoogleCharts;
class GoogleChartsReply
{
        public static function updateCharts($request,$id){
            $chart =  GoogleCharts::findOrFail($id);
            $chart->name = $request->name;
            $chart->google_src = $request->google_src;
            $chart->describe = $request->describe;
            $msg = $chart->save();
        }
        public static function newCharts($request){
            GoogleCharts::create([
                'name'=> $request->name,
                'google_src' => $request->google_src,
                'pet_column_id'=>$request->pet_column_id,
                'describe' => $request->describe
            ]);
        }
        public static function hiddenCharts($id)
        {
            GoogleCharts::where('id',$id)
                ->update(['is_show' => 0]);
        }
}