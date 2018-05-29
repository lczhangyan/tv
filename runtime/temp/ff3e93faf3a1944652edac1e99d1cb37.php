<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"E:\AppServ\www\tv\public/../application/ad\view\index\dvbsynh.html";i:1527584740;}*/ ?>
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
        span{
            margin-bottom: 50px;
        }
        button{
            margin: 10px;
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
        }
    </style>
    <script type="text/javascript" src="/static/ad/js/jquery.js"></script>
    <script>
        function submit() {
            $.ajax({
                url: 'http://tv.mscp.dtv/cloudui/index/ads/get_index_ads.php',
                data: null,
                async: false,
                dataType: "json",
                success: function (data) {
                },
                error: function (e) {
                }
            });
            $.ajax({
                url: 'http://p.mscp.dtv/cloudui/index/ads/get_index_ads.php',
                data: null,
                async: false,
                dataType: "json",
                success: function (data) {
                },
                error: function (e) {
                }
            })
            location.href = "/ad/index/dvbsynh";
        }
    </script>
</head>
<body>
<span>上次同步时间：<?php echo $time; ?></span><br/>
<button onclick="submit()">立即同步</button>
</body>
</html>