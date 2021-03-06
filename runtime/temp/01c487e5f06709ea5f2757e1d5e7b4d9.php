<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\AppServ\www\tv\public/../application/ad\view\login\login.html";i:1526292082;}*/ ?>
<!DOCTYPE html>
<html>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <style>
        *{
            box-sizing: border-box;
        }
        #loader {
            float: left;
            display: block;
            width: 200px;
            height: 200px;
            margin: 100px 0 0 300px;
            border-radius: 50%;
            border: 10px solid transparent;
            border-top-color: #9370DB;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
        #loader:before {
            content: "";
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            border-radius: 50%;
            border: 10px solid transparent;
            border-top-color: #BA55D3;
            -webkit-animation: spin 3s linear infinite;
            animation: spin 3s linear infinite;
        }
        #loader:after {
            content: "";
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border-radius: 50%;
            border: 10px solid transparent;
            border-top-color: #FF00FF;
            -webkit-animation: spin 1.5s linear infinite;
            animation: spin 1.5s linear infinite;
        }
        @-webkit-keyframes spin {
            0%   {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes spin {
            0%   {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        .login{
            padding: 5% 5%;
            width: 315px;
            text-align: center;
            height: 425px;
            border-radius: 8px;
            box-shadow: 0 0px 9px #b7aeae;
            border: 1px solid #bbb5b5;
            margin: 5% 12% auto auto;
        }
        .login input{
            display: block;
            height: 42px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login span{
            line-height: 50px;
            font-size: 18px;
        }
        .login button{
            margin: 0 auto;
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
        button:hover {
            color: #fff;
            background-color: #31b0d5;
            border-color: #269abc
        }
        #tishi{
            display: none;
            font-size: 14px;
            color: #a05454;
        }
    </style>
    <script type="text/javascript" src="/static/ad/js/jquery.js"></script>
    <script>
        function submit() {
            var name = $("#name").val();
            var password = $("#password").val();
            if(!name||!password){
                $("#tishi").html("请填写完整信息");
                button();
                return;
            }
            $.ajax({
                url : '/ad/login/login',
                type: 'POST',
                data: null,
                async : false,
                dataType:"json",
                data:{
                    name:name,
                    password:password
                },
                success : function(data){
                    if(data.status){
                        location.href = "/ad/index/index";
                    }else{
                        $("#tishi").html(data.msg)
                        button();
                    }
                },
                error : function(e) {
                    console.log(e);
                }
            });
        }
        function button() {
            $("#tishi").show();
            setTimeout(function (){
                $("#tishi").hide()
            },3000);
        }
    </script>
</head>
<body>
    <div id="loader"></div>
<div class="login">
    <span>用户名</span>
    <input type="text" id="name"/><br/>
    <span>密码</span>
    <input type="text" id="password"/><br/>
    <button onclick="submit()">登录</button>
    <span id="tishi"></span>
</div>
</body>
</html>