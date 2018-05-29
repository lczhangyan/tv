<?php
/**
 * Created by zhangyan
 * Date: 2018/5/11
 * Time: 19:41
 * action:
 */

namespace app\ad\controller;
use app\ad\model\Log;
use think\Controller;

class Common extends Controller
{
    public function log($action){
        $log = new Log;
        $data = [
            'action'=>$action,
            'name'=>session("name"),
            'ip'=>$this->request->ip()
        ];
        $log->save($data);
    }
    public function upload()
    {
        $file = $this->request->file('file');
        $dir = $this->request->param("dir");
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/'.$dir);
        if($info){
            $src =$dir."/".$info->getSaveName();
            $data = [
              "code"=>0,
                "msg"=>"上传成功",
                "data"=>[
                    "src"=>$src
                ]
            ];
            return json_encode($data,JSON_UNESCAPED_UNICODE);
        }
    }
}