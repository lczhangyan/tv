<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\AppServ\www\tv\public/../application/ad\view\index\index.html";i:1527527047;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>内容管理</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            list-style: none;
            border: 0px;
            box-sizing:border-box;
        }
        .header{
            background-color: #23262E;
            position: relative;
            z-index: 1000;
            height: 60px;
        }
        .logo{
            position: absolute;
            left: 120px;
            top: 0;
            width: 200px;
            height: 100%;
            line-height: 60px;
            text-align: center;
            color: #009688;
            font-size: 16px;
        }
        .right{
            height: 60px;
            float: right;
        }
        .right li{
            position: relative;
            display: inline-block;
            vertical-align: middle;
            line-height: 60px;
        }
        .right li a{
            display: block;
            padding: 0 20px;
            color: #fff;
        }
        .side-left{
            position: fixed;
            top: 60px;
            bottom: 0;
            z-index: 999;
            width: 200px;
            overflow-x: hidden;
            background-color: #393D49;
        }
        iframe{
            width: 100%;
            height:100%;
            padding: 10px;
        }
        a{text-decoration:none;outline:none;blr:expression(this.onFocus=this.blur());}
        .clear{clear:both;}
        .ce{
            display: block;
            width: 200px;
            background: #393D49;
            position: fixed;
            z-index: 5;
            top: 60px;
            left: 0px;
        }
        .ce li{
        }
        .more{margin-left: 70px;}
        .ce li a{padding: 10px 10px 10px 40px;color:white;display:block;cursor:pointer;background:url(/static/ad/images/tu.png) no-repeat 10px center;}
        .ce li a:hover{background-color:#4E5465;}
        .ce li .dqian{background:none}
        .er{
            background-color: #282B33;
            display: none;
        }
        .er li{width:100%;border:0px solid rgb(140,140,140);}
        .er li a{display:block;padding:10px 10px 10px 40px;color:white;background:none;}
        .er li a:hover,.er li .sen_x{background:#009688;}
        .ui-body{
            bottom: 0px;
            position: fixed;
            overflow: hidden;
            top: 60px;
            left: 200px;
            right: 0px;
        }
    </style>
    <script type="text/javascript" src="/static/ad/js/jquery.js"></script>
    <script type="text/javascript" src="/static/ad/js/template-native.js"></script>
   <!-- <script>
        function userinfo() {
            $.ajax({
                url : "php/user_info.php",
                type : 'get',
                async : false,
                success : function(data) {
                    var data=data.replace(/\s/g,'');
                    data = eval("("+data+")");
                    $("#usermsg").html("欢迎，"+data.pname);
                    var html = template('template', data);
                    document.getElementById('side').innerHTML = html;
                },
                error : function(e){
                    console.log(e);
                }
            });
        }
        $(function () {userinfo();})
    </script>-->
</head>
<body>
<div class="header">
    <img src="/static/ad/images/logo.png">
    <div class="logo">内容管理</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <!--<ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="">控制台</a></li>
      <li class="layui-nav-item"><a href="">商品管理</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>-->
    <ul class="right">
        <li class="layui-nav-item">
            <a href="javascript:;" id="usermsg">欢迎，<?php echo $name; ?></a>
            <!--<dl class="layui-nav-child">
              <dd><a href="">基本资料</a></dd>
              <dd><a href="">安全设置</a></dd>
            </dl>-->
        </li>
       <li class="layui-nav-item"><a href="/ad/login/sexit">注销</a></li>
    </ul>
</div>
<div class="side-left" id="side">
    <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="ce">
            <li> <a class="xz">推荐管理<img class="more" src="/static/ad/images/more.png"/></a>
                <ul class="er" style="display: block">
                    <li><a  href="/ad/index/ad_add" target="i-iframe" class="sen_x">DVB推荐</a></li>
                    <li><a  href="/ad/index/dvbsynh" target="i-iframe">同步设置</a>
                    <li><a  href="http://172.16.10.21:8880/cntv/" target="_blank">CNTV</a></li>
                </ul>
            </li>
            <li>
                <a>&nbsp;新媒体&nbsp;&nbsp;<img class="more" src="/static/ad/images/more.png"/></a>
                <ul class="er">
<!--                    <li><a  href="/ad/applogs/report" target="i-iframe">数据报表</a></li>
                    <li><a  target="i-iframe">APP数据</a></li>
                    <li><a  href="/ad/album/add" target="i-iframe">专题新增</a></li>
                    <li><a  href="/ad/album/alist" target="i-iframe">专题管理</a></li>
                    <li><a  href="/ad/album/m_add" target="i-iframe">新增资源</a></li>
                    <li><a  href="/ad/album/mlist" target="i-iframe">内容列表</a></li>-->
                    <li><a  href="/ad/launcher/getLauncherlist" target="i-iframe">新TV推荐</a></li>
                </ul>
            </li>
            <li>
                <a>系统管理<img class="more" src="/static/ad/images/more.png"/></a>
                <ul class="er">
                    <li><a  target="i-iframe">用户管理</a></li>
                    <li><a   target="i-iframe">用户新增</a></li>
                    <li><a   target="i-iframe">个人信息</a></li>
                    <li><a   target="i-iframe">修改密码</a></li>
                </ul>
            </li>
            <div class="clear"></div>
        </ul>
</div>

<div class="ui-body" style="overflow: hidden">
    <!-- 内容主体区域 -->
    <iframe frameborder="0" name="i-iframe" src="/ad/index/ad_add" class="x-iframe"></iframe>
</div>

<div class="layui-footer">
    <!-- 底部固定区域 -->
    <!--? layui.com - 底部固定区域-->
</div>
</div>
</div>

<script>
    $(function(){
        $(".ce > li > a").click(function(){
            $(this).addClass("xz").parents().siblings().find("a").removeClass("xz");
            $(this).parents().siblings().find(".er").hide(300);
            $(this).siblings(".er").toggle(300);
            $(this).parents().siblings().find(".er > li > .thr").hide().parents().siblings().find(".thr_nr").hide();

        })
        $(".er > li > a").click(function(){
            $(this).addClass("sen_x").parents().siblings().find("a").removeClass("sen_x");
            $(this).parents().siblings().find(".thr").hide(300);
            $(this).siblings(".thr").toggle(300);
        })
    })


</script>
</body>
</html>