<!DOCTYPE html>
<html class="cs8">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta charset="utf-8">
    <meta name="description" content="{$infoWechat.share_desc}" />
    <title>my laravel</title>
    <link href="{{ elixir('assets/css/m.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/1.1.0/weui.min.css">
    <script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.1/weui.min.js"></script>
    <style>
        /* 一部分头部nav色 */
        .cs1 .fl-btn-bbc1, .cs8 .hom-hd-bbg, .cs8 .pShow_bottom a.buy, .cs8 .p_tag, .cs8 .p_top, .cs8 .pro_top, .cs8 .remarks_bnt, .cs8 .share_list li span.bnt_box span.ewm, .cs8 .share_top a.s_link, .cs8 .user_addad::before, .cs8 .user_dj .dj i, .cs8 .user_name span {
            background: #e60012;
        }
        /* 大部分头部nav色 */
        .cs8 .bc_sub, .cs8 .but_red, .cs8 .cart_sub, .cs8 .cus_search, .cs8 .dlsh_list span.r_but a.red_but, .cs8 .ewm_list li span.xz a, .cs8 .fl-bg-2, .cs8 .fl-btn-pb, .cs8 .fl-btn-tx, .cs8 .focus span.current, .cs8 .my_top, .cs8 .order_tag, .cs8 .order_top, .cs8 .pro_but2, .cs8 .sale_but, .cs8 .sale_list span.name .p_ewm a, .cs8 .sale_total, .cs8 .salesman_header, .cs8 .tcc_fx ul.fx a.bcdbd_but {
            background: #e60012;
        }
        /* 图标色与文字色 */
        .pShow_bottom2 a.cart .iconfont, .pShow_bottom2 a.fav .iconfont,.p_yhq {
            color: #e60012;
        }
        /* 按钮色与个人头部色 */
        .my_top2,.pShow_bottom2 a.buy,.s_type li.on,.BO_foot a.go,.pShow_tag span.Bline{/*.p_yhq .tag_text span*/
            background: #e60012;
        }
    </style>
    <script src="{{elixir('assets/js/m.js')}}"></script>

    <script type='text/javascript'> //growingio script
        var _vds = _vds || [];
        window._vds = _vds;
        (function(){
            _vds.push(['setAccountId', 'a523895b9a2f6518']);
            (function() {
                var vds = document.createElement('script');
                vds.type='text/javascript';
                vds.async = true;
                vds.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'dn-growing.qbox.me/vds.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(vds, s);
            })();
        })();
    </script>

    

<body class="drawer drawer-right">

@include('M.topMenu')

</body>

</html>