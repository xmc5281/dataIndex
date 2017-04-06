<?php
/**
 * Created by PhpStorm.
 * User: 76683
 * Date: 2017/1/16
 * Time: 13:13
 */

/*
 * 单一字段二维数组转一维数组
 */

if(hasFunction('madeOne'))
{
    function madeOne($arr)
    {
        $value = [];
        foreach ($arr as $v){
            foreach ($v as $val){
                $value[] = $val;
            }
        }
        return $value;
    }
}
function hasFunction($functionName){
   if(!function_exists($functionName))
       return true;
   else
       dd('函数'.$functionName.'()已存在，请另命名');
}
/*
 * 随机颜色
 */
function randrgb()
{
    $str='0123456789ABCDEF';
    $estr='#';
    $len=strlen($str);
    for($i=1;$i<=6;$i++)
    {
        $num=rand(0,$len-1);
        $estr=$estr.$str[$num];
    }
    return $estr;
}



function makeColors($n=7){
    $colors = [];
    for ($i = 0; $i<=$n;$i++)
    {
        $colors[$i] = randrgb();
    }
    return $colors;
}


 function makeChart($array,$type,$kind,$title){
    $labels = [];
    $sales = [];
    $orders = [];
    foreach ($array as $v)
    {
        if(is_array($v))
        {
            $labels[] = $v['date_key'];
            $sales[] = $v['sales'];
            $orders[] = $v['orders_num'];
        }
        elseif (is_object($v))
        {
            $labels[] = $v->date_key;
            $sales[] = $v->sales;
            $orders[] = $v->orders_num;
        }
    }
    $chart = Charts::multi($type, $kind)
        ->title($title)
        ->colors([randrgb(),randrgb(),randrgb()])
        ->labels($labels)
        ->dimensions(1000,500)
        ->dataset('销售额', $sales)
        ->dataset('订单量', $orders)
        ->responsive(true);
    return $chart;
}
function makeVSChart($array1,$array2,$type,$kind,$title){
    $month = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
    $labels1 = [];
    $sales1 = [];
    $orders1 = [];
    $labels2 = [];
    $sales2 = [];
    $orders2 = [];
    foreach ($array1 as $v)
    {
        $labels1[] = $v['date_key'];
        $sales1[] = $v['sales'];
        $orders1[] = $v['orders_num'];
    }
    foreach ($array2 as $v)
    {
        $labels2[] = $v['date_key'];
        $sales2[] = $v['sales'];
        $orders2[] = $v['orders_num'];
    }
    $colors = makeColors();
    $chart = Charts::multi($type, $kind)
        ->title($title)
        ->colors($colors)
        ->labels($month)
        ->dimensions(1000,500)
        ->dataset('上月销售额', $sales1)
        ->dataset('本月销售额', $sales2)
        ->dataset('上月订单量', $orders1)
        ->dataset('本月订单量', $orders2)
        ->responsive(true);
    return $chart;
}

