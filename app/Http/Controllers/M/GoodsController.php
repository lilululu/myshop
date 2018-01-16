<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/4/18
 * Time: 3:19 PM
 */
namespace App\Http\Controllers\M;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller{

    function showGoods(){

        $info=DB::table('product')->where('id',1)->first();


        $info->cover_img=explode(',',$info->cover_img);
        $info->pdesc=htmlspecialchars_decode($info->pdesc,ENT_HTML5);

//        dd($info);

        $priceInfo=DB::table('product_stock')->where('product_id',1)->get();

        $pricedata=[];

        $color=[];
        $size=[];
        $price=[];

        $first=[];

        foreach($priceInfo as $k=>$v){

            $color[]=$v->color;
            $size[]=$v->size;
            $price[]=$v->price;

            $pricedata[$v->color][$v->size]['stock']=$v->stock;
            $pricedata[$v->color][$v->size]['price']=$v->price;

            $pricedata[$v->size][]=$v->color;


        }

        $color=array_unique($color);

        $size=array_unique($size);
        $price=array_unique($price);

//        dd($price);




        return view('M.Goods.showGoods',['info'=>$info,'pricedata'=>$pricedata,'color'=>$color,'size'=>$size,'price'=>$price]);
    }

}
