<?php
/**
 * Created by PhpStorm.
 * User: 76683
 * Date: 2017/1/21
 * Time: 11:32
 */

namespace App\Reply\Focus;

use Auth;
use App\Models\Epet\Dim\DimBrand;
use App\Models\Users\FocusBrand;
use Carbon\Carbon;
use Image;
use App\Models\Data\DataBrandsDay;
use DB;
class FocusBrandReply
{

    protected $brandName;
    function __construct()
    {

    }

    public static function showBrandsModal(){
            $focused = Auth::user()->focusBrands()->select('brandid')
                ->where('is_show',1)
                ->get()->toArray();
            $brands = DimBrand::select('name','brandid')
                ->whereNotIn('brandid',$focused)->get();
            return $brands;
        }
        public static function addFocusBrands($request){
            $alreadyFocus = self::alreadyFocus($request);
            $arr = $request->brandid;
            if ($arr){
                foreach ($arr as $brand){
                    if(in_array($brand,$alreadyFocus))
                    {
                        self::updated($request,$brand);
                    }
                    else
                    {
                        $dogs[] = new FocusBrand(['brandid'=>$brand]);
                        $dog_msg =  $request->user()->focusBrands()->saveMany($dogs);
                    }
                }
            }
        }
        public static function alreadyFocus($request)
        {
            $arr = FocusBrand::select('brandid')
                ->where([['is_show',0],['user_id',$request->user()->id]])
                ->get()->toArray();
            if (count($arr)>0)
            {
                //二维数组转一维
                return madeOne($arr);
            }
            else
            {
                return $arr;
            }
        }
        public static function updated($request,$brand)
        {
            return $request->user()->focusBrands()->where('brandid',$brand)->update(['is_show'=>1]);
        }


        //显示关注的品牌
        public static function showFocusBrands()
        {
           $showFocusBrands = Auth::user()->focusBrands()
               ->join('jz_brand','jz_brand.brandid','=','focus_brands.brandid')
               ->where([['focus_brands.is_show',1]])
               //->toSql();
               ->get();
           //dd($showFocusBrands);
           return $showFocusBrands;
        }
        public static function updateFocus($request){
            if($request->hasFile('thumbnail'))
            {
                $thumbnail = self::thumbnail($request);
            }
            $request->user()->focusBrands()->where('brandid',$request->brandid)->update(['thumbnail'=>$thumbnail]);
        }
    public static function thumbnail($request){
        if($request->hasFile('thumbnail')){
            $file = $request->thumbnail;
            $name = str_random(20).'.jpg';
            $path = public_path().'/thumbnails/'.$name;
            $meg = Image::make($file)->resize(261,98)->encode('jpg')->save($path);
            return $name;
        }
    }

    public static function ThisMonthVSLastMonth($brandid){
        $brandName = self::getBrandName($brandid);
        $thisMOnth = date('Y-m-01',strtotime('0 month'));
        $lastMOnth = date('Y-m-01',strtotime('-1 month'));
        $thisMOnthValue = DataBrandsDay::select('date_key','sales','orders_num','buyer_num','avg_order_price','avg_buyer_price')->where([['brandid',$brandid],['date_key','>=',$thisMOnth]])->get()->toArray();
        $lastMOnthValue = DataBrandsDay::select('date_key','sales','orders_num','buyer_num','avg_order_price','avg_buyer_price')->where([['brandid',$brandid],['date_key','>=',$lastMOnth],['date_key','<',$thisMOnth]])->get()->toArray();
        $chart = makeVSChart($lastMOnthValue,$thisMOnthValue,'line','highcharts',$brandName.'本月VS上月');
        return $chart;
    }
    public static function getBrandName($brandid){
       $brandName =  DimBrand::findOrFail($brandid);
       return $brandName->name;

    }
    public static function showMonth($brandid){
        $brandName = self::getBrandName($brandid);
        $monthValue = DataBrandsDay::select(DB::raw('date_format(date_key,"%Y-%m") as date_key , sum(sales) as sales , sum(orders_num) as orders_num'))->where([['brandid',$brandid]])->groupBy(DB::raw('date_format(date_key,"%Y-%m")'))->get()->toArray();
        $chart = makeChart($monthValue,'bar','highcharts',$brandName.'月份销售趋势');
        return $chart;
    }
    public static function showQuarter($brandid){
        $brandName = self::getBrandName($brandid);
        $QuarterValue = DataBrandsDay::select(DB::raw("CONCAT(YEAR(date_key),'-',QUARTER(date_key),'Q') as date_key,sum(sales) as sales,sum(orders_num) as orders_num,sum(buyer_num) as buyer_num"))
            ->where([['brandid',$brandid]])
            ->groupBy(DB::raw("CONCAT(YEAR(date_key),'-',QUARTER(date_key),'Q')"))
            ->get()
            ->toArray();
        $chart = makeChart($QuarterValue,'bar','highcharts',$brandName.'季度销售趋势');
        return $chart;
    }
    public static function showBigSales($brandid){
        $brandName = self::getBrandName($brandid);
        $bigSales = DB::select('SELECT
                                                    `date_key`,
                                                    `sales`,
                                                    `orders_num`
                                                FROM
                                                    `dataBrandDay`
                                                WHERE
                                                    (`brandid` = '.$brandid.')
                                                AND (
                                                    `date_key` LIKE "%06-16"
                                                    OR `date_key` LIKE "%06-17"
                                                    OR `date_key` LIKE "%06-18"
                                                    OR `date_key` LIKE "%11-11"
                                                    OR `date_key` LIKE "%12-12"
                                                )');
        $chart = makeChart($bigSales,'bar','highcharts',$brandName.'大促销售趋势');
        return $chart;
    }
}