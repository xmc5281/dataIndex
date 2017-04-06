<?php
/**
 * Created by PhpStorm.
 * User: 76683
 * Date: 2017/1/13
 * Time: 11:38
 */

namespace app\Reply\Focus;

use Auth;
use App\Models\Epet\Dim\DimCategory;
use App\Models\Users\FocusCategory;
use Carbon\Carbon;
use Image;
use App\Models\Epet\Category;
use Charts;
use App\Models\Data\DataCategoryDay;
use App\Models\Data\DataCategoryWeek;
use App\Models\Data\DataCategoryMonth;
use App\Models\Data\DataCategoryQuarter;
use DB;
class FocusReply
{
        protected $keys;
        protected $arr = [] ;
        protected $array = [];
        public function __construct($cateid)
        {
            // $this->arr = $this->alreadyFocus($request);
           $this->categoryName = self::getCategoryName($cateid);
        }

    /*
     *  查询所有已经关注的
     */
    public static function alreadyFocus($request){
        $arr = FocusCategory::select('cateid')
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


        /*
         * 此方法需重构
         */

        public static function updated($request,$category){
         return $request->user()->focusCategory()->where('cateid',$category)->update(['is_show'=>1]);
        }
    public static function addFocusCategory($request){
        $alreadyFocus = self::alreadyFocus($request);
        $arr = self::keys($request);
        if ($arr){
            foreach ($arr as $dog){
                if(in_array($dog,$alreadyFocus))
                {
                    self::updated($request,$dog);
                }
                else
                {
                    $dogs[] = new FocusCategory(['cateid'=>$dog]);
                    $dog_msg =  $request->user()->focusCategory()->saveMany($dogs);
                }
            }
        }
    }
        public static function keys($request){
        $arr = $request->all();
            unset($arr['_token']);
            return call_user_func_array('array_merge', $arr);
        }
        /*
         * 此方法需重构
         */
        public static function ShowCategoryModal(){
            $focused = Auth::user()->focusCategory()->select('cateid')
                ->where('is_show',1)
                ->get()->toArray();
            $dog = DimCategory::select('name','cateid')
                ->where([['bigtype','dog'],['owner',0]])
                ->whereNotIn('cateid',$focused)->get();
            $cat = DimCategory::select('name','cateid')->where([['bigtype','cat'],['owner',0]])
                ->whereNotIn('cateid',$focused)
                ->get();
            $category = [$dog,$cat];
            return $category;
        }
        public static function showPetsCategory($pet){
            $showCategory = Auth::user()->focusCategory()->join('jz_category','focus_categories.cateid','=','jz_category.cateid')
                ->select('focus_categories.id','focus_categories.cateid','jz_category.name','focus_categories.thumbnail')
                ->where([['jz_category.bigtype',$pet],['focus_categories.is_show',1]])
                ->get();
                return $showCategory;
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
    public static function updateFocus($request){
        if($request->hasFile('thumbnail'))
        {
            $thumbnail = self::thumbnail($request);
        }
        $request->user()->focusCategory()->where('cateid',$request->cateid)->update(['thumbnail'=>$thumbnail]);
    }
    public static function getCategoryName($cateid){
       $name = DimCategory::select('name')->where('cateid',$cateid)->get()->toArray();
        return $name[0]['name'];
    }


    public static function showYesterday($cateid){
//        $yesterday = Carbon::yesterday();
            $yesterday = '2017-02-06';
        $row = Category::select('jz_category.name')
            ->join('dataCategoryDay','jz_category.cateid','=','dataCategoryDay.cateid')
            ->where([['jz_category.owner',$cateid],['dataCategoryDay.date_key',$yesterday]])
            ->get()->toArray();
        $r = madeOne($row);
        $children = Category::select('jz_category.name','jz_category.cateid')
            ->join('dataCategoryDay','jz_category.cateid','=','dataCategoryDay.cateid')
            ->where([['jz_category.owner',$cateid]])
            ->distinct('jz_category.name')
            ->get();
        $val = Category::select('dataCategoryDay.sales')
            ->join('dataCategoryDay','jz_category.cateid','=','dataCategoryDay.cateid')
            ->where([['jz_category.owner',$cateid],['dataCategoryDay.date_key',$yesterday]])
            ->get()->toArray();
        if (empty($val))
        {
            $val = Category::select('dataCategoryDay.sales')
                ->join('dataCategoryDay','jz_category.cateid','=','dataCategoryDay.cateid')
                ->where([['jz_category.cateid',$cateid],['dataCategoryDay.date_key',$yesterday]])
                ->get()->toArray();
        }
        $value = madeOne($val);
        $categoryName = self::getCategoryName($cateid);
        $chart = Charts::create('pie', 'highcharts')
            ->title($categoryName.'昨日销售组成')
            ->labels($r)
            ->values($value)
            ->dimensions(1000,500)
            ->responsive(false);
       return [$chart,$children];
    }

    /*
     * 类目的趋势图
     */


    public static function showThisMonth($cateid){
        $categoryName = self::getCategoryName($cateid);
        $start = date('Y-m-01',strtotime('-2 month'));
        $end = date('Y-m-01',strtotime('-1 month'));

        $array = DataCategoryDay::select('date_key','sales','orders_num','buyer_num','avg_order_price','avg_buyer_price')->where([['date_key','>=',$start],['date_key','<',$end],['cateid',$cateid]])->get()->toArray();
        $chart = makeChart($array,'line','highcharts',''.$categoryName.'本月销售情况');
        return $chart;
    }




    public static function showMonth($cateid){
        $categoryName = self::getCategoryName($cateid);
        $array = DataCategoryDay::select(DB::raw("date_format(date_key,'%Y-%m') as date_key,sum(sales) as sales,sum(orders_num) as orders_num,sum(buyer_num) as buyer_num"))
        //$array = DataCategoryMonth::select('date_key','sales','orders_num')
            ->where([['cateid',$cateid]])
            ->groupBy(DB::raw("date_format(date_key,'%Y-%m')"))
            ->get()
            ->toArray();
        $chart = makeChart($array,'bar','highcharts',''.$categoryName.'最近几月销售趋势');
        return $chart;
    }




    public static function showYear($cateid){
        $categoryName = self::getCategoryName($cateid);
        $array = DataCategoryDay::select(DB::raw("date_format(date_key,'%Y') as date_key,sum(sales) as sales,sum(orders_num) as orders_num,sum(buyer_num) as buyer_num"))
            ->where([['cateid',$cateid]])
            ->groupBy(DB::raw("date_format(date_key,'%Y')"))
            ->get()
            ->toArray();
        $chart = makeChart($array,'bar','highcharts',''.$categoryName.'最近几年销售趋势');
        return $chart;
    }




    public static function showQuarter($cateid){
        $categoryName = self::getCategoryName($cateid);
        $array = DataCategoryDay::select(DB::raw("CONCAT(YEAR(date_key),'-',QUARTER(date_key),'Q') as date_key,sum(sales) as sales,sum(orders_num) as orders_num,sum(buyer_num) as buyer_num"))
           //$array = DataCategoryQuarter::select('date_key','sales','orders_num')
            ->where([['cateid',$cateid],['date_key','>=','2016-06-01']])
            ->groupBy(DB::raw("CONCAT(YEAR(date_key),'-',QUARTER(date_key),'Q')"))
            ->get()
            ->toArray();
        $chart = makeChart($array,'bar','highcharts',''.$categoryName.'最近季度销售趋势');
        return $chart;
    }




    public static function showLastyear($cateid){
        $categoryName = self::getCategoryName($cateid);
        $lastYear = date('Y-01-01', strtotime("-1 year"));
        $thisYear = date('Y-01-01', strtotime("0 year"));
        $val = DataCategoryDay::select(DB::raw('jz_category.name,sum(dataCategoryDay.sales) as sales'))
            ->join('jz_category','jz_category.cateid','=','dataCategoryDay.cateid')
            ->where([['jz_category.owner',$cateid],['dataCategoryDay.date_key','>=',$lastYear],['dataCategoryDay.date_key','<',$thisYear]])
            ->groupBy('jz_category.name')
            ->get()->toArray();
        if (empty($val))
        {
            $val = DataCategoryDay::select(DB::raw('jz_category.name,sum(dataCategoryDay.sales) as sales'))
                ->join('jz_category','jz_category.cateid','=','dataCategoryDay.cateid')
                ->where([['jz_category.cateid',$cateid],['dataCategoryDay.date_key','>=',$lastYear],['dataCategoryDay.date_key','<',$thisYear]])
                ->groupBy('jz_category.name')
                ->get()->toArray();
        }
        $r=[];
        $value = [];
        foreach ($val as $v){
            $r[] = $v['name'];
            $value[] = $v['sales'];
        }
        $chart = Charts::create('pie', 'highcharts')
            ->title($categoryName.'去年销售组成')
            ->labels($r)
            ->values($value)
            ->dimensions(1000,500)
            ->responsive(false);
        return $chart;
    }
}