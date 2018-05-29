<?php
/**
 * Created by zhangyan
 * Date: 2018/5/11
 * Time: 10:06
 * action:点播APP记录
 */

namespace app\ad\controller;
use think\Controller;
use app\ad\model\Applog;
use app\ad\model\Appinfo;
use think\db;
class Applogs extends Controller
{
    public function add(){//添加记录
        $date =date_create();
        $request = $this->request;
        $playlog = new Applog;
        $appid = $request->param("appid");
        $resource = $request->param("resource");
        $vodurl = $request->param("vodurl");
        $duration = $request->param("duration");
        $end = $request->param("end");
        $sn = $request->param("sn");
        $ip = $request->ip();
        if(($appid&&$resource&&$vodurl&&$sn&&$duration||$end)){
            if($end==null) $end=0;
            $data=[
                'appid'=>$appid,
                'resource'=>$resource,
                'vodurl'=>$vodurl,
                'duration'=>$duration,
                'end'=>$end,
                'sn'=>$sn,
                'ip'=>$ip,
                'accesstime'=>date_format($date,"Y-m-d H:i:s"),
                'accessdate'=>date_format($date,"Y-m-d")
            ];
            $playlog->save($data);
            if($playlog->id){
                return json_encode(["msg"=>"success","code"=>1]);
            }
        }else{
            return json_encode(["msg"=>"信息不完整","code"=>0],JSON_UNESCAPED_UNICODE);
        }
    }
    public function ss(){
        //$date=date_create("2018-05-12 16:58:16");
        $date =date_create();
        echo date_format($date,"Y-m-d H:i:s");
    }
    public function logs(){ //获取播放记录列表
        $request = $this->request;
        $sn = $request->param("sn");
        $size = $request->param("size");
        $applog = new Applog();
        $data = $applog->where('sn', "$sn")
            ->order('accesstime', 'desc')
            ->paginate($size);
           // ->select();
        $datalen=count($data);
        $response = array();
        $appinfo =new Appinfo();
        for($i=0;$i<$datalen;$i++){
            if($data[$i]->duration==null){
                $duration ="0";
            }else{
                $duration = $data[$i]->duration;
            }
            if($data[$i]->sn==null){
                $sn ="0";
            }else{
                $sn = $data[$i]->sn;
            }
            $app_id = $data[$i]->appid;
            $data1 = $appinfo->where('id',"$app_id")->find();
            $temArr=[
                "appinfo"=>["package"=>$data1->package,"class"=>$data1->class,"key"=>$data1->keyvalue],
                "resource" => [
                    "id" => $data[$i]->id,
                    "resource" => $data[$i]->resource,
                    "vodurl" => $data[$i]->vodurl,
                    "duration" => $duration,
                    "sn" => $sn
                ],
            ];
            array_push($response,$temArr);
        }
        return json_encode($response,JSON_UNESCAPED_UNICODE);
    }
    public function getinfo(){ //获取单个资源信息，去唤醒APP播放器
        $request = $this->request;
        $log_id = $request->param("id");
        $applog = new Applog();
        $data = $applog->where('id', "$log_id")
            ->find();
        $app_id = ($data->appid);
        $appinfo =new Appinfo();
        $data1 = $appinfo->where('id',"$app_id")->find();
        $response=[
            "appinfo"=>["package"=>$data1->package,"class"=>$data1->class,"key"=>$data1->keyvalue],
            "resource"=>["name"=>$data["resource"],"url"=>$data["vodurl"],"duration"=>$data["duration"]]
        ];
        return json_encode($response,JSON_UNESCAPED_UNICODE);
    }
    public function report(){
        $yesterday = date("Y-m-d", time()-86400);
   //     return $yesterday;
        $applog = new Applog();
        $appinfo =new Appinfo();
        $db = db('applog');
        $totalsn= $db->distinct(true)->field('sn')->select();
        $sn_num= $db->distinct(true)->field('sn')->where('accessdate',$yesterday)->select();
      //  return $db->getLastSql();  输出最后一条语句
        $t_duration = $db->sum("duration");
        $duration = $db->field("sum(duration) as duration")->where('accessdate',$yesterday)->select();
        $hotlist =  $db->field("resource,sum(duration) as duration,count(sn) as snn ")
            ->group("resource")
            ->where('accessdate',$yesterday)
            ->select();
        $t_hotlist =  $db->field("resource,sum(duration) as duration,count(sn) as snn ")
            ->group("resource")
            ->select();
        $userlist =  $db->field("sn,sum(duration) as duration,count(resource) as resources ")
            ->group("sn")
            ->order('resources desc')
            ->where('accessdate',$yesterday)
            ->limit(10)
            ->select();
        $t_userlist =  $db->field("sn,sum(duration) as duration,count(resource) as resources ")
            ->group("sn")
            ->order('resources desc')
            ->limit(10)
            ->select();
      //  dump($t_userlist);return;
      // return $db->getLastSql();
        $this->assign([
            "sn_num"=>count($sn_num),
            "duration"=>$duration[0],
            "hotlist"=>$hotlist,//昨日热播榜
            "t_hotlist"=>$t_hotlist,//总热播榜
            "t_duration"=>$t_duration,
            "total_sn"=>count($totalsn),
            "t_userlist"=>$t_userlist,
            "userlist"=>$userlist
        ]);
        return $this->fetch();
    }
}