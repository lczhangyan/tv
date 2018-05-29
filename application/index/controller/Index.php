<?php
namespace app\index\controller;
//use app\admin\controller\User as user;
use think\Config;
use think\Request;
use think\Controller;
use app\index\model\Test;

class Index extends Controller
{
    public function index(Request $req)
    {
        $aa = Test::column("id_","name_");//查询条件
        dump($aa);
    }
}