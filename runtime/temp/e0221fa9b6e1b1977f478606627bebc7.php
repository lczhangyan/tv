<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\AppServ\www\tv\public/../application/ad\view\album\alist.html";i:1526611569;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>添加专题</title>
</head>
<link href="/layui/css/layui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/layui/layui.js"></script>
<body>
<table id="demo" lay-filter="test"></table>
<script>
    layui.use('table', function(){
        var table = layui.table;
        var $ = layui.$;
        var ajaxRequest=function (url,data) {
            var response;
            $.ajax({
                url : url,
                type: 'POST',
                data: data,
                dataType: "json",
                async : false,
                success : function(data) {
                    response = data;
                },
                error : function(e) {
                    console.log(e);
                }
            });
            return response;
        };
        //第一个实例
            table.render({
                elem: '#demo'
                ,height: 315
                ,url: '/ad/album/alist_m' //数据接口
                ,page: true //开启分页
                ,cols: [[ //表头
                    /*{field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}*/
                    {field: 'name', title: '标识', width:120}
                    ,{field: 'title', title: '名称', width:200, sort: true}
                    ,{field: 'ctime', title: '添加时间', width:280,sort: true}
                    ,{fixed: 'right', title:'操作',width:250, align:'center', toolbar: '#barDemo'}
                    ]]
                });
            //监听工具条
            table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
                var data = obj.data; //获得当前行数据
                var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
                var tr = obj.tr; //获得当前行 tr 的DOM对象

                if(layEvent === 'detail'){ //查看
                    //do somehing
                    layer.msg("1");
                } else if(layEvent === 'del'){ //删除
                    layer.confirm('真的删除行么', function(index){
                        var response = ajaxRequest("/ad/album/del",data);
                        layer.msg(response.msg);
                        obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                        layer.close(index);
                        //向服务端发送删除指令
                    });
                } else if(layEvent === 'edit'){ //编辑
                    //do something

                    //同步更新缓存对应的值
                    obj.update({
                        username: '123'
                        ,title: 'xxx'
                    });
                }
            });
    });
</script>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>

    <!-- 这里同样支持 laytpl 语法，如： -->
    {{#  if(d.auth > 2){ }}
    <a class="layui-btn layui-btn-xs" lay-event="check">审核</a>
    {{#  } }}
</script>
</body>
</html>