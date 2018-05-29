<?php
/**
 * Created by zhangyan
 * Date: 2018/5/17
 * Time: 16:16
 * action: 专题管理
 */

namespace app\ad\controller;

use app\ad\model\Appinfo;
use app\ad\model\Dissertation;
use app\ad\model\Mediamsg;
use think\Controller;

class Album extends Controller
{
    public function add(){
       return $this->fetch();
    }
    public function add_add(){
        $r = $this->request;
        $m = new Dissertation();
        $name = $r->param("name");
        $title = $r->param("title");
        $m->save([
            'name'=>$name,
            'title'=>$title,
        ]);
        if($m->id){
            return json_encode(["msg"=>"添加成功","code"=>1],JSON_UNESCAPED_UNICODE);
        }
    }
    public function alist(){
        return $this->fetch();
    }
    public function alist_m(){ //专题内容接口
        $request = $this->request;
        $page = $request->param("page")-1;
        $limit = $request->param("limit");
        $page = $page*$limit;
        $M = new Mediamsg();
        $M1 =new Dissertation();
        $aa = $M1->field("id,name,title")->select();
        $aaL = count($aa);
        $aaArr=[];
       for($i=0;$i<$aaL;$i++){
           $b = $aa[$i]->id;
           $aaArr["$b"]=$aa[$i]->title;
       }
        $num = $M->count();
        $list = $M->limit($page,$limit)->select();
        for($i=0;$i<count($list);$i++){
            $c = $list["$i"]->dissertation_id;
            $list["$i"]->dissertation_title = $aaArr["$c"];
            $list["$i"]->image_url = $this->request->domain().$list[$i]->pic;
        }
        $response =["code"=>0,"count"=>$num,"data"=>$list];
        return json_encode($response,JSON_UNESCAPED_UNICODE);
    }
    public function del(){
        $request = $this->request;
        $id=$request->param("id");
        $m = new Dissertation();
        $m->where('id',$id)->delete();
        return json_encode(["msg"=>"删除成功"],JSON_UNESCAPED_UNICODE);
    }
    public function m_add(){
        $D = new Dissertation();
        $A = new Appinfo();
        $amsg = $A->where("type","0")->select();
        $dmsg = $D->all();
        $this->assign([
            "dmsg"=>$dmsg,
            "amsg"=>$amsg
        ]);
        return $this->fetch();
    }
    public function m_add_add(){
        $request = $this->request;
        $M = new Mediamsg();
        $data=[
            "title"=>$request->param("title"),
            "pic"=>$request->param("pic"),
            "link"=>$request->param("url"),
            "app"=>$request->param("app"),
            "dissertation"=>$request->param("dissertation"),
        ];
        $M->save($data);
        if($M->id){
            return json_encode(["msg"=>"添加成功","code"=>1],JSON_UNESCAPED_UNICODE);
        }
    }
    public function mlist(){
        return $this->fetch("m_list");
    }
}