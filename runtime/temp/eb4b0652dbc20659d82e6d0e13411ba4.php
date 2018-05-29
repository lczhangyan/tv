<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\AppServ\www\tv\public/../application/ad\view\index\index.html";i:1527584402;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="renderer" content="webkit" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>内容管理</title>
<link rel="stylesheet" href="/layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><img src="/static/ad/images/logo.png"></div>
        <!-- 头部区域（可配合layui已有的水平导航）
        <ul class="layui-nav layui-layout-left">
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
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;"><?php echo $name; ?></a>
               <!-- <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>-->
            </li>
            <li class="layui-nav-item"><a href="/ad/login/sexit">注销</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">推荐管理</a>
                    <dl class="layui-nav-child">
                        <dd><a  href="/ad/index/ad_add" target="i-iframe" class="sen_x">DVB推荐</a></dd>
                        <dd><a  href="/ad/index/dvbsynh" target="i-iframe">同步设置</a></dd>
                        <dd><a  href="http://172.16.10.21:8880/cntv/" target="_blank">CNTV</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">新媒体</a>
                    <dl class="layui-nav-child">
                        <dd><a  href="/ad/applogs/report" target="i-iframe">数据报表</a></dd>
                        <dd><a  target="i-iframe">APP数据</a></dd>
                        <dd><a  href="/ad/album/add" target="i-iframe">专题新增</a></dd>
                        <dd><a  href="/ad/album/alist" target="i-iframe">专题管理</a></dd>
                        <dd><a  href="/ad/album/m_add" target="i-iframe">新增资源</a></dd>
                        <dd><a  href="/ad/album/mlist" target="i-iframe">内容列表</a></dd>
                        <dd><a  href="/ad/launcher/getLauncherlist" target="i-iframe">新TV推荐</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">系统管理</a>
                    <dl class="layui-nav-child">
                        <dd><a  target="i-iframe">用户管理</a></dd>
                        <dd><a  target="i-iframe">APP数据</a></dd>
                        <dd><a  target="i-iframe">用户新增</a></dd>
                        <dd><a  target="i-iframe">个人信息</a></dd>
                        <dd><a  target="i-iframe">修改密码</a></dd>
                    </dl>
                </li>
<!--                <li class="layui-nav-item"><a href="">11</a></li>
                <li class="layui-nav-item"><a href="">11</a></li>-->
            </ul>
        </div>
    </div>
    <div class="layui-body" style="overflow: hidden;top: 60px;bottom: 0px;">
        <iframe frameborder="0" name="i-iframe"  src="/ad/index/ad_add" class="x-iframe" style="box-sizing: border-box;width: 100%;height: 100%;"></iframe>
    </div>
</div>
<script src="/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>