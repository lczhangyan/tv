<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"E:\AppServ\www\tv\public/../application/ad\view\album\add.html";i:1526552276;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>添加专题</title>
</head>
<link href="/layui/css/layui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/layui/layui.js"></script>
<body>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>新增专题</legend>
</fieldset>
<form class="layui-form">
    <div class="layui-form-item">
        <label class="layui-form-label">专题名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="如：怀旧电影" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">专题标识</label>
        <div class="layui-input-block">
            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="如：dianying" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script>
    //Demo
    layui.use(['form','jquery'], function(){
        var form = layui.form;
        var $ = layui.$
        //监听提交
        form.on('submit()', function(data){
            $.ajax({
                url : '/ad/Album/add_add',
                type: 'POST',
                data: data.field,
                dataType: "json",
                async : false,
                success : function(data) {
                    layer.msg(data.msg);
                },
                error : function(e) {
                    console.log(e);
                }
            });
            return false;
        });
    });
</script>
</body>
</html>