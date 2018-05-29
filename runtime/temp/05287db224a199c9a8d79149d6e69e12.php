<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\AppServ\www\tv\public/../application/ad\view\album\m_add.html";i:1526639804;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>添加专题内容</title>
</head>
<link href="/layui/css/layui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/layui/layui.js"></script>
<body>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>新增资源</legend>
</fieldset>
<form class="layui-form">
    <div class="layui-form-item">
        <label class="layui-form-label">资源名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="如：怀旧电影" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">资源链接</label>
        <div class="layui-input-block">
            <input type="text" name="url" lay-verify="required" autocomplete="off" placeholder="" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">资源海报</label>
        <div class="layui-input-block">
            <button type="button" class="layui-btn" id="test1">上传图片</button><span id="kankan" style="margin-left: 8px;"></span>
            <input style="display: none" type="text" name="pic" lay-verify="required" id="pic" autocomplete="off" placeholder="" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">来源APP</label>
        <div class="layui-input-block">
            <select name="app" lay-verify="required">
                <option value=""></option>
                <?php if(is_array($amsg) || $amsg instanceof \think\Collection || $amsg instanceof \think\Paginator): $k = 0; $__LIST__ = $amsg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                <option value="<?php echo $vo['id']; ?>"><?php echo $vo['appname']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属专题</label>
        <div class="layui-input-block">
            <select name="dissertation" lay-verify="required">
                <option value=""></option>
                <?php if(is_array($dmsg) || $dmsg instanceof \think\Collection || $dmsg instanceof \think\Paginator): $k = 0; $__LIST__ = $dmsg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
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
    layui.use(['form','jquery','upload'], function(){
        var form = layui.form;
        var $ = layui.$
        //监听提交
        form.on('submit()', function(data){
            $.ajax({
                url : '/ad/Album/m_add_add',
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
            ,url: '/ad/common/upload' //上传接口
            ,data:{
                "dir":"app"
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
            }
            ,error: function(){
                //请求异常回调
            }
        });
    });
</script>
</body>
</html>