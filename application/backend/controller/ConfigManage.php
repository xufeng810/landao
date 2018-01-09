<?php
namespace app\backend\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\backend\model\Config;
class ConfigManage  extends Common
{      
    //配置首页
    public function index(){
        if(Request::instance()->isPost()===true){
            $model=new Config;
            $data=$this->dataAction();
            foreach ($data as $k => $v) {
                $list[]=['id'=>$k,'value'=>$v];
            }
            $model->isUpdate()->saveAll($list);
            $ress=tpCache(1);
        }else{
            $ress=tpCache();
        }
        $this->assign('data',$ress);
        $this->assign('breadcrumb',['0'=>'基本设置']);
        return  $this->fetch();
    }
    //清除缓存
    public function refresh(){
        $ress=tpCache(1);

        $this->success('刷新成功！');
    }

  
    

}
