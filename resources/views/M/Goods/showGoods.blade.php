@include('M.layout')


<link rel="stylesheet" href="{{elixir('assets/js/touchTouch/touchTouch.css')}}" />
<script type="text/javascript" src="{{elixir('assets/js/jquery.js')}}"></script>
<style type="text/css">
    .disabled{
        pointer-events: none;
        background: #b3b3b3 !important;
        opacity: 0.5;
    }
    .
    .p_pre_left::after{
        content: '元'
    }
    .min_price{
        float: left;
        font-size: 1.5rem;
        font-weight: 600;
    }
    .min_coin{
        float: left;
        font-size: 18px;
        font-weight: 600;
    }
    .min_price::after{
        content: '元起';
        margin-left: 7px;
    }
    .main_image{position:relative; width:100%; height:13em}
    .main_image ul{position:relative;top:0;left:0}
    .main_image li{float:left; display:inline-block; background: #EEEEEE;}
    .main_image li span{display:block;width:100%;}
    .main_image li a{display:block;width:100%;height:13em;position:relative;}
    .main_image li img{ width:100%;}
    .jine{display: inline-block;width: 100%;}
    .p_time, .p_yhq {
        margin-bottom: 0px;
    }

</style>

<style type="text/css">
    .bottommenu{
        background: #e6e6e6;
        z-index: 99999;
        position: fixed;
        /*width: 100%;*/
        height:50%;
        overflow: hidden;
        bottom: 0;
        padding: 20px;
        display:none;
    }
    .bg_gary1 {
        background-color: rgba(0,0,0,.5);
        z-index: 11110;
        bottom: 0;
        width: 100%;
        height: 100%;
        top: 0;
        position: fixed;
    }
    .hide{display: none;}
</style>

<div class="bottommenu">
    满99元，享部分地区包邮；不包邮地区：甘肃、宁夏、新疆、西藏、台湾、香港、澳门、海外；不满99元，北京市内运费6元，其他城市10元起。
</div>
<div class="bg_gary1 hide" ></div>


<div id="before_tags">

    <div class="p_banner">
        <div class="flicking_con"  style="display:none">
            <a href="#">1</a>
    </div>
    <div class="main_image">
        <ul>
            @foreach($info->cover_img as $val)

                <li>
                    <img src="{{$val}}" />
                </li>

                @endforeach
        </ul>
    </div>
</div>
<script type="text/javascript" src="{{elixir('assets/js/jquery.touchSlider.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $dragBln = false;
        var conW = $('.flicking_con').width()/2;
        $('.flicking_con').css('margin-left',-conW);
        var M_Len = $(".main_image li").children().length;
        var ww = $(window).width()/2;
        // $('.main_image,.main_image li').css('height',ww);

        if (M_Len > 1) {
            $dragBln = false;

            $(".main_image").touchSlider({
                flexible : true,
                speed : 200,
                paging : $(".flicking_con a"),
                counter : function (e){
                    $(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
                }
            });

        } else{
            false;

        }

        $(".main_image").bind("mousedown", function() {
            $dragBln = false;
        });

        $(".main_image").bind("dragstart", function() {
            $dragBln = true;
        });

        $(".main_image a").click(function(){
            if($dragBln) {
                return false;
            }
        });

    });
</script>
<form name="myform" id="myform" action="{:U('/m/Order/bookGoods')}?time=<?=time()?>" method="post">
    <input type="hidden" name="id" value="{$info.id}">
    <input type="hidden" name="price_id" id="h_price_id" value="{$priceList[0][id]}">
    <input type="hidden" name="price_count" id="h_price_count" value="1">


    <div class="p_title">
        <h2>{{$info->name}} @if($info->status==1)<span class="orange">(商品已下架)</span>@endif</h2>
        <span class="p_pre">

            <font class="min_price orange">{!! min($price) !!}</font>

            <font class="p_pre_right orange">200</font>
            <del class="market_price" style="margin-left: 0.5rem;"></del>
        </span>

    </div>

    <div class="p_yhq" id="yhq_jian1" >
        <div class="tag_text">
            <span>包邮</span>
        </div>
        <span class="text jzf" style="overflow: initial;">满0元，享部分地区包邮</span>
    </div>

    <div class="s_box">

            <h3>类型</h3>
            <ul class="s_type s_name">
                @foreach($color as $v)

                    @if($loop->first)

                    <li class="change product_price_name on" data-color="{{$v}}">{{$v}}</li>

                    @else
                        <li class="change product_price_name" data-color="{{$v}}" >{{$v}}</li>

                    @endif

                    @endforeach

            </ul>
            <span class="price_models" style="margin-top: 0.2rem;">
            <h3>属性</h3>
            <ul class="s_type s_size" >


                 @foreach($size as $vv)



                    @if($loop->first)

                    <li  class="change size on" data-name="{{$vv}}">{{$vv}}</li>

                    @else
                    <li class="change size"  data-name="{{$vv}}">{{$vv}}</li>

                    @endif


                @endforeach



            </ul>
            </span>

            <h3>数量</h3>
            <div class="s_numbox">

                <button type="button" id="cut">-</button>

                <span id="s_num">1</span>

                <button type="button" id="add">+</button>

            </div>

            <span class="s_stock">库存<font id="cur_stock">100</font>件</span>


    </div>

    <script type="text/javascript" src="{{elixir('js/layer3/layer/mobile/layer.js')}}"></script>

    <script>

        var sy = 'background-color:#09C1FF; color:#fff; border:none;';

        var pdata='{!! json_encode($pricedata,JSON_UNESCAPED_UNICODE)!!}';

        pdata=jQuery.parseJSON(pdata);

        var color=$('ul.s_name li.on').html();
        var size=$('ul.s_size li.on').html();


        $('#cur_stock').html(pdata[color][size]['stock']);


        $('.change').click(function(){


            $(this).siblings().removeClass('on');

            $(this).addClass('on');

            var color=$('ul.s_name li.on').html();
            var size=$('ul.s_size li.on').html();


            $('#cur_stock').html(pdata[color][size]['stock']);
            $('.min_price').html(pdata[color][size]['price']);

        });

        $('.product_price_name').click(function(){

            $('.s_size li').addClass('disabled');

            var color=$(this).html();

            var cdata=pdata[color];


            for(x in cdata){


                $(".s_size li").filter('[data-name="'+x+'"]').removeClass('disabled');


            }




        });

        $('.size').click(function() {

            $('.s_name li').addClass('disabled');

            var size = $(this).html();

            var sdata = pdata[size];


            for (x in sdata) {


                $(".s_name li").filter('[data-color="' + sdata[x] + '"]').removeClass('disabled');


            }

        });

        $('#add').click(function(){

            var num=$('#s_num').html();

            num=parseInt(num)+1;

            all=parseInt($('#cur_stock').html());

            if(num<=all){

                $('#s_num').html(num);
            }else{

                layer.open({
                    content: '购买数量不能超过库存数量!',
                    style: sy,
                    time: 1
                });
            }

        });


        $('#cut').click(function(){

            var num=$('#s_num').text();

            num=num-1;

            if(num>=1){

                $('#s_num').html(num);
            }else{

                layer.open({
                    content: 'too small!',
                    style: sy,
                    time: 1
                });
            }

        });

    </script>

    <ul class="pShow_tag" >
        <li class="on"><a href="#Show_tag">商品详情</a></li>
        <li><a href="#Show_tag">基本信息</a></li>
        <!-- <li><a href="#Show_tag">相关推荐</a></li> -->
        <li><a href="#Show_tag">买家秀</a></li>
        <li><a href="#Show_tag">配送&amp;售后</a></li>

        <span class="Bline"></span>
    </ul>
    <style type="text/css">
        .customer_show{margin-bottom: 10px;}
        .show_head{border-bottom: 1px solid #aaa;width:100%;line-height: 20px;padding:5px 0px;overflow:hidden;}
        .show_head a{float:left;}
        .show_head img {border-radius:45px; border:1px solid transparent;}
        .show_head>p{float:left;margin-top:10.5px;padding:0 5px}
        .show_pic{float:left;margin-bottom: 5px;}
        .show_pic>ul>li{float:left;list-style: none;}
        .show_pic>ul>li img{width:7rem;vertical-align: middle;}
        .show_pic>ul>li>a{display: block;margin-right: 5px;margin-bottom: 5px;}
        .show_bottom{float:left;}
        .show_bottom p{display:-webkit-box; line-height: 20px;overflow:hidden;text-overflow: ellipsis;-webkit-line-clamp:2;-webkit-box-orient:vertical;margin-bottom: 5px;}
        .show_bottom_2{color:#aaa;font-size: 9px;text-align: right;}
    </style>

    <div class="pShow_box">
        <div class="pShow_cen">
            {!! $info->pdesc !!}
        </div>

        <div class="pShow_cen trip_text">
            <p>{!! $info->basic_info !!}</p>
        </div>
        {{--<div class="pShow_cen trip_text">--}}
            {{--<p>{$info.introduce}</p>--}}
        {{--</div>--}}

        <div class="pShow_cen trip_text">
            <p></p>
        </div>


        <div class="pShow_cen">



            <b style="font-size:18px; color: #0b74ab; ">退货政策</b><br/>
            凡是在探路者官方服务号“官方商城”购买的商品（除旅行线路、签证），都会为您提供退货服务。<br/>
            <b>退货期限：</b>您收到商品起7天内。<br/>
            <b>运费承担：</b>非质量问题寄回运费由您自行承担，不接受「到付件」哦！<br/>
            <b>商品要求：</b><br />
            1.要求商品外包装、配件、吊牌等均完整；<br/>
            2.购买商品不能洗涤、磨损、人为破坏或标牌拆卸，不影响二次销售。如您所购买有鞋类商品，请不要在鞋盒上粘胶条。<br/>
            <b style="font-size:18px; color: #0b74ab; ">成功退货流程：</b><br/>
            联系客服——客服受理——寄回商品——提供快递信息——仓储质检——退款<br/>
            邮寄要求：写个便条务必备注好您的订单编号和购买ID，原包装快递发回。<br/>
            快递单上请您填写寄件人和电话时务必和订单信息一致，以便准确收集您的信。<br/>
            如有疑问，请咨询客服：<br/>
            1.在商品详情页左下角点击“咨询”<br/>
            2.拨打探路者”官方商城”客服热线电话：400-776-8188（客服工作时间：工作日8:30-17:30）<br/>
            <b style="font-size:18px; color: #0b74ab; ">关于运费：</b><br/>
            由于运营成本的上升，微信商城自2017年7月21日起部分收取运费。<br/>
            运费收取规则为：<br/>
            单笔订单满99元，享部分地区包邮；甘肃、宁夏、新疆、西藏运费10元；台湾、香港、澳门、海外按照实际货运情况收取。<br/>
            单笔订单不满99元，北京市内运费6元，其他城市10元，甘肃、宁夏、新疆、西藏运费20元；台湾、香港、澳门、海外按照实际货运情况收取。<br/>

        </div>
    </div>

    <div class="pShow_bottom2">

            <a class="fav" href="http://wechattest.toread.com.cn/amcc-webonlinecli/comm/wowsuser/clientkf.html?customerid="  ><font class="iconfont">&#xe6aa;</font>咨询</a>

            <a class="cart " href="javascript:void(0);">
                <font class="iconfont">&#xe69a;</font>加入购物车
            </a>

            <a class="buy <empty name='priceList'>disabled</empty>" href="javascript: $('#myform').submit();" >立即预订</a>


    </div>
    <script type="text/javascript" src="{{elixir('assets/js/jquery.lazyload.js')}}"></script>
    <script src="{{elixir('assets/js/touchTouch/touchTouch_extend.jquery.js')}}"></script>
    <script>
        $(function(){
            $('#thumbs a').touchTouch();
        });
    </script>

    <script>
        $(document).ready(function(){
            $(".pShow_cen").find('img').lazyload({
                placeholder : "__PUBLIC__/m/js/d-1u.gif",
                effect : "fadeIn"
            });
        });
    </script>

    <div class="goTop">
        <font class="iconfont">&#xe64b;</font>
        <span>顶部</span>
    </div>

</form>
