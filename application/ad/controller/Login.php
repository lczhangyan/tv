<?php
/**
 * Created by zhangyan
 * Date: 2018/5/9
 * Time: 15:44
 * action:
 */

namespace app\ad\controller;
use app\ad\model\User;
use think\Controller;

class Login extends Controller
{
    public function index(){
        return $this->fetch("login");
    }
    public function sexit(){
        session("name",null);
        $this->redirect('login/index');
    }
    public function login(){
        $request = $this->request;
        $name = $request->param("name");
        $psw = $request->param("password");
        $psw = md5($name.'-'.$psw);
        $msg=array();
        $user =new User;
        $curPsw = $user->where("name","$name")->find();
        if($curPsw==null){
            $msg["status"] = 0;
            $msg["msg"] = "用户名不存在";
        }else{
            $curPsw=$curPsw->password;
            if($curPsw==$psw){
                session('name',"$name");
                $msg["status"] = 1;
            }else{
                $msg["status"] = 0;
                $msg["msg"] = "密码不正确";
            }
        }
        echo json_encode($msg,JSON_UNESCAPED_UNICODE);
    }
    public function aa(){
        //action("common/log",controller());
        echo $this->request->controller().$this->request->action();
    }
}