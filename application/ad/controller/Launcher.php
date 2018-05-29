<?php
/**
 * Created by zhangyan
 * Date: 2018/5/18
 * Time: 19:56
 * action:
 */

namespace app\ad\controller;
use app\ad\model\Tb_lancher_recommend;
use think\Controller;

class Launcher extends Controller
{
    public function getLauncherContents(){
       header("Content-type: application/json; charset=UTF-8");
        $id = $this->request->param("recommendId");
        $M = new Tb_lancher_recommend();
        $result = $M->where('r_type', "$id")->find();
        if($result){
            $data=[
                "status"=>"0",
                "errorMessage"=>"获取成功",
                "data"=>[
                    "recommendData"=>[
                        [
                            "programID"=>$result["program_id"],
                            "webUri"=>$result["web_uri"],
                            "appInfo"=>[
                                "packageName"=>$result["package_name"],
                                "apkUrl"=>$result["apk_url"],
                                "className"=>$result["class_name"],
                                "intentMsg"=>urlencode('{"'.$result["apk_key"].'":"'.$result["apk_value"].'"}'),
                            ],
                            "channelId"=>$result["channel_id"],
                            "imageUrl"=>$this->request->domain()."/uploads/".$result["image_url"],
                            "columnName"=>$result["column_name"],
                            "otherInfo"=>[""=>""],
                            "recommendType"=>$result["recommend_type"]
                        ]
                    ],
                    "recommendId"=>$result["r_type"]
                ]
            ];
        }else{
            $data=[
                "status"=>"0",
                "errorMessage"=>"获取成功",
                "data"=>[]
            ];
        }
        $callback =  $this->request->param("callback");
        if($callback){
            echo $callback."(".json_encode($data,320).")";
            exit();
        }
        echo json_encode($data,320);
        exit() ;
    }
    public function getLauncherlist(){
        return $this->fetch("list");
    }
    public function getList(){
        $M = new Tb_lancher_recommend();
       // return Tb_lancher_recommend::get(7)->recommend_type;
        $request = $this->request;
        $page = $request->param("page")-1;
        $limit = $request->param("limit");
        $page = $page*$limit;
        $num = $M->count();
        $list = $M->limit($page,$limit)->select();
        $key=[0=>"直播",1=>"点播栏目",3=>"网页",4=>"第三方应用"];
        for($i=0;$i<count($list);$i++){
            $list["$i"]->image_url = $this->request->domain()."/uploads/".$list[$i]->image_url;
            $list["$i"]->recommend_type1 = $key[$list["$i"]->recommend_type];
        }
      //  return count($list);
        $response =["code"=>0,"count"=>$num,"data"=>$list];
        return json_encode($response,320);
    }
    public function getLauncher(){
        $id = $this->request->param("id");
        $M = new Tb_lancher_recommend();
        $result = $M->where('id', "$id")->find();
        if($result){
            $result=  $result->toArray();
            $result['image_url']=$this->request->domain()."/uploads/".$result["image_url"];
            $this->assign("result",$result);
        }
        return $this->fetch("edit");
    }
    public function updata(){
        header("Content-type: application/json; charset=UTF-8");
        $request = $this->request;
        $id = $request->param('id');
        $M = new Tb_lancher_recommend();
        $data=[
          'package_name'=>  $request->param('package_name'),
            'class_name'=>  $request->param('class_name'),
            'apk_key'=>  $request->param('apk_key'),
            'apk_value'=>  $request->param('apk_value'),
        ];
        if($request->param('image_url')){
            $data['image_url'] = $request->param('image_url');
        }
        $M->where('id',$id)->update($data);
        echo json_encode(['code'=>0,'msg'=>"修改成功"],320);
        exit();
    }
}