<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\AppServ\www\tv\public/../application/ad\view\index\ad_add.html";i:1527584720;}*/ ?>
<!DOCTYPE html>
<html>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        *{
            padding: 0;
            margin: 0px;
            box-sizing:border-box;
            font-family: "Microsoft Yahei", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        body{
            padding: 15px;
        }
        form{
            font-size: 15px;
            line-height: 32px;
        }
        button{
            display: block;
            clear: both;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            touch-action: manipulation;
            cursor: pointer;
            user-select: none;
            border: 1px solid transparent;
            border-radius: 4px;
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
            margin: 30px auto;
            width: 58px;
        }
        .part{
            height: 160px;
            width: 750px;
            padding: 0px 20px;
        }
        .part .title{
            border-bottom: #f59898 2px solid;
            text-align: center;
            margin-bottom: 10px;

        }
        .content{
            width: 515px;
            float: left;
        }
        .line span{
            text-align: right;
            display: inline-block;
            width: 71px;
        }
        .line input{
            padding: 0px 12px;
            width: 400px;
            border-radius: 4px;
            border: #adacac 1px solid;
            height: 26px;
            line-height: 26px;
        }
        .img{
            margin-top: 5px;
            width: 120px;
            float: left;
         }
        img{
            width: 100%;
        }
    </style>
</head>
<script type="text/javascript" src="/static/ad/js/jquery.js"></script>
<script type="text/javascript" src="/static/ad/js/jquery.form.js"></script>
<script>
    function formPost() {
        var hideForm = $('#form');
        var options = {
            dataType: "json",
            beforeSubmit: function (){
                //alert("1");
            },
            success: function (data) {
                alert(data.msg);
                location.href = "/ad/index/ad_add";
               // $("#msg").html(data.msg);
               // $("#msg").show();

            },
            error: function (data) {
            }
        };
        hideForm.ajaxSubmit(options);
    }
</script>
<body>
<div>共更新<?php echo $times; ?>次，上次更新于<?php echo $utime; ?></div>
<form action="/ad/index/save" id="form" method="post" enctype="multipart/form-data">
    <input name="times" type="hidden" value="<?php echo $times; ?>"/>
    <div class="part">
        <div class="title">第1副</div>
        <div class="content">
            <div class="line">
                <span>名称:</span>
                <input name="title0" type="text" value="<?php echo $title0; ?>"/>
            </div>
            <div class="line">
                <span>推荐图片:</span>
                <input name="pic0" type="file" accept="image/*"/>
            </div>
            <div class="line">
                <span>链接地址:</span>
                <input name="url0" type="text" value="<?php echo $url0; ?>"/>
            </div>
        </div>
        <div class="img"><img src="<?php echo $pic0; ?>"/></div>
    </div>
    <div class="part">
        <div class="title">第2副</div>
        <div class="content">
            <div class="line">
                <span>名称:</span>
                <input name="title1" type="text" value="<?php echo $title1; ?>"/>
            </div>
            <div class="line">
                <span>推荐图片:</span>
                <input name="pic1" type="file" accept="image/*"/>
            </div>
            <div class="line">
                <span>链接地址:</span>
                <input name="url1" type="text" value="<?php echo $url1; ?>"/>
            </div>
        </div>
        <div class="img"><img src="<?php echo $pic1; ?>"/></div>
    </div>
    <div class="part">
        <div class="title">第3副</div>
        <div class="content">
            <div class="line">
                <span>名称:</span>
                <input name="title2" type="text" value="<?php echo $title2; ?>"/>
            </div>
            <div class="line">
                <span>推荐图片:</span>
                <input name="pic2" type="file" accept="image/*"/>
            </div>
            <div class="line">
                <span>链接地址:</span>
                <input name="url2" type="text" value="<?php echo $url2; ?>"/>
            </div>
        </div>
        <div class="img"><img src="<?php echo $pic2; ?>"/></div>
    </div>
    <div class="part">
        <div class="title">第4副</div>
        <div class="content">
            <div class="line">
                <span>名称:</span>
                <input name="title3" type="text" value="<?php echo $title3; ?>"/>
            </div>
            <div class="line">
                <span>推荐图片:</span>
                <input name="pic3" type="file" accept="image/*"/>
            </div>
            <div class="line">
                <span>链接地址:</span>
                <input name="url3" type="text" value="<?php echo $url3; ?>"/>
            </div>
        </div>
        <div class="img"><img src="<?php echo $pic3; ?>"/></div>
    </div>
    <button type="button"  onclick="formPost();" style="display: block;margin: 30px auto;border-radius: 4px;width: 58px;height: 30px;">提交</button>
</form>
</body>
</html>