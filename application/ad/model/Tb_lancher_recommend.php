<?php
/**
 * Created by zhangyan
 * Date: 2018/5/18
 * Time: 19:58
 * action:
 */

namespace app\ad\model;


use think\Model;

class Tb_lancher_recommend extends Model
{
    protected $autoWriteTimestamp = 'datetime'; //
    /*找到原因了，是model设置与数据库中字段不同的问题，数据中日期设置为datetime了，config中protected $autoWriteTimestamp = 'int';造成的，在model中添加 protected $autoWriteTimestamp = 'datetime';这样就不会报错了。*/

}