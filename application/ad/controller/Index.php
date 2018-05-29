<?php
/**
 * User: zy
 * Date: 2018/4/25
 * Time: 16:01
 */
namespace app\ad\controller;
use app\ad\model\Msg;
use app\ad\model\Apilog;
use think\Controller;
class Index extends Controller
{
    protected  $beforeActionList = [
        'checksession' => ['except'=>'adservice,ip,dvbSynh']
    ];
    public function index(){
        $this->assign('name',session('name'));
        return $this->fetch();
    }
    public function ip(){
        dump($this->request->ip());////->header("host");
    }
    //login
    protected function checkSession(){
        if(!session('name')){
            $this->redirect('login/index');
        }
    }

    public function ad_add(){  //跳到添加推荐内容页面
        $msg = new Msg();
        $data = $msg->where('id', "1")
            ->find();
        $this->assign([
            'title0'=>$data['title0'],
            'pic0'=>$this->request->domain()."/uploads/".$data['pic0'],
            'url0'=>$data['url0'],
            'title1'=>$data['title1'],
            'pic1'=>$this->request->domain()."/uploads/".$data['pic1'],
            'url1'=>$data['url1'],
            'title2'=>$data['title2'],
            'pic2'=>$this->request->domain()."/uploads/".$data['pic2'],
            'url2'=>$data['url2'],
            'title3'=>$data['title3'],
            'pic3'=>$this->request->domain()."/uploads/".$data['pic3'],
            'url3'=>$data['url3'],
            'utime'=>$data['utime'],
            'times'=>$data['times'],
        ]);
        return $this->fetch();
    }
    public function save(){
        $data= array();
        $data["times"] = $this->request->param("times")+1;
        $date = date_create();
        $data["utime"] = date_format($date,"Y-m-d H:i:s");
        for($i=0;$i<4;$i++){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $file = $this->request->file('pic'.$i);
          //  dump($file);
           // return;
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info) {
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    $pictmp = "pic".$i;
                    $data[$pictmp] = $info->getSaveName();
                }else{
                    echo $file->getError();
                   // return json_encode(["msg"=>"图片上传失败"],JSON_UNESCAPED_UNICODE);
                }
            }
            $urltmp = "url".$i;
            $data[$urltmp] = $this->request->param("$urltmp");
            $titleTmp = "title".$i;
            $data[$titleTmp] = $this->request->param("$titleTmp");
        }
        $msg = new Msg();
        $msg->save($data,['id' => 1]);
       // if($msg->id){
            $result['msg']="添加成功";
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
       // }
    }
    public  function adService(){
      //  Config::set("default_return_type","json");
        $msg = new Msg;
        $id= $msg->max('id');
        $data = $msg->where('id', "$id")
            ->find();
        $data1 = array();
        for($i=0;$i<4;$i++){
            if($data["pic".$i]!=""&&$data["url".$i]!=""){
                $tem = array(
                    /*"pic".$i=>$data["pic".$i],
                    "url".$i=>$data["url".$i],
                    "title".$i=>$data["title".$i]*/
                    "pic"=>$this->request->domain()."/uploads/".$data["pic".$i],
                    "url"=>$data["url".$i],
                    "title"=>$data["title".$i],
                    "creattime"=>$data["creattime"]
                    );
                array_push($data1,$tem);
            }
        }
        $str ="";
        for($i=0;$i<count($data1);$i++){
            $str= $str.'imgArr['."$i".']="'.$data1[$i]["pic"].'";linkArr['."$i".']="'.$data1[$i]['url'].'";';
        };
       // return "var menu=".json_encode($data,JSON_UNESCAPED_UNICODE);
      //  return json_encode($data1,JSON_UNESCAPED_UNICODE);
        try{
            $log = new Apilog;
            session_start();
            $log->save([
                "service"=>"adService",
                "flag"=>session_id(),
                "ip"=>$this->request->ip() //访问用户ip
            ]);
        }catch (Exception $e){

        }
        return $str;
    }
    public function dvbSyn(){ //95与云ui不同，未弃用
        $fp = file_get_contents("http://tv.mscp.dtv/cloudui/index/ads/get_index_ads.php");
        if($fp){
            return json_encode(["msg"=>"同步成功","status"=>1],JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(["msg"=>"同步失败","status"=>1],JSON_UNESCAPED_UNICODE);
        }
    }
    public function dvbSynh(){
        $log = new Apilog;
        $id= $log->max('id');
        $data = $log->where('id', "$id")
            ->find();
        $this->assign('time',$data["accesstime"]);
       return $this->fetch();
    }
}