<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\AppServ\www\tv\public/../application/ad\view\launcher\edit.html";i:1527525443;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>修改信息</title>
</head>
<link href="/layui/css/layui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/layui/layui.js"></script>
<body style="padding: 5px;">
<form class="layui-form" style="width: 95%;">
    <div class="layui-form-item">
        <label class="layui-form-label">包名</label>
        <div class="layui-input-block">
            <input type="text" name="package_name" lay-verify="required" value="<?php echo $result['package_name']; ?>" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">类名</label>
        <div class="layui-input-block">
            <input type="text" name="class_name" lay-verify="required" value="<?php echo $result['class_name']; ?>" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">键名</label>
        <div class="layui-input-block">
            <input type="text" name="apk_key" lay-verify="required" value="<?php echo $result['apk_key']; ?>" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">键值</label>
        <div class="layui-input-block">
            <input type="text" name="apk_key" lay-verify="required" value="<?php echo $result['apk_value']; ?>" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">资源海报</label>
        <div class="layui-input-block">
            <button type="button" class="layui-btn" id="test1">上传海报</button><span id="kankan" style="margin-left: 8px;"></span>
            <input style="display: none" type="text" name="image_url"  id="pic" autocomplete="off" placeholder="" class="layui-input">
        </div>
    </div>

    <div class="layui-row layui-col-space15" id="durImg" style="text-align: center;">
        <img src="<?php echo $result['image_url']; ?>" style="width: 30%;margin: 0 auto">
    </div>
    <div class="layui-form-item" style="text-align: center;">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">提交</button>
        </div>
    </div>
</form>
<script>
    layui.use(['form','jquery','upload'], function(){
        var form = layui.form;
        var $ = layui.$
        //监听提交
        form.on('submit(demo1)', function(data){
            $.ajax({
                url : '/ad/Launcher/updata?id=<?php echo $result['id']; ?>',
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
        var upload = layui.upload;

        //执行实例
        var uploadInst = upload.render({
            elem: '#test1' //绑定元素
            ,accept:'image'
            ,url: '/ad/common/upload' //上传接口
            ,data:{
                "dir":"launcher"
            }
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#kankan').html(file.name); //图片链接（base64）
                });
            }
            ,done: function(res){
                //上传完毕回调
                $("#pic").val(res.data.src);
                $('#durImg').html("");
            }
            ,error: function(){
                //请求异常回调
            }
        });
    });
</script>
</body>
</html>