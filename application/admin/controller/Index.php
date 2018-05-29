<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/24
 * Time: 14:28
 */
namespace app\admin\controller;
use think\Session;
class Index
{
 public function index(){
   // return "22";
   //  dump(config());
     return Session::get('name');
 }
    public function index1(){
        return "212";
    }
}