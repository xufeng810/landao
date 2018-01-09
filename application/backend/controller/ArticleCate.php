<?php
namespace app\backend\controller;
use think\Controller;
use think\Db;
use think\Config;
use think\Request;
use app\backend\model\ArticleCat;
class ArticleCate  extends Common
{
   public function cateList(){
        $data=Db::name('article_cat')->order('ord')->select();
        $this->assign('data',generateTree($data));
        return  $this->fetch();
   }

   //添加和编辑
    public function cateAdd(){
        if(var_export(Request::instance()->isAjax(), true)==='true'){
            $ress=$this->addAction();
            return $ress;
        }
       
        $this->add('article_cat',['status'=>1]);
        return  $this->fetch();
    }

    //删除
    public function cateDelete(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $where['pid']=input('post.id');
          $id=Db::name('article_cat')->where($where)->find();
          if($id){
            return ['msg'=>'删除失败，请先删除下级分类','status'=>2];
          }
          $arid=Db::name('article')->where('arcate_id',$where['pid'])->find();
          if($arid){
            return ['msg'=>'删除失败，分类下有文章！','status'=>2];
          }
          $ress=$this->delete('article_cat');
          return $ress;
       }
    }

    //数据提交数据库处理
    protected function addAction(){
        $data=$this->dataAction();
        $pmodel=new ArticleCat;
        if(empty($data['id'])){
            if ($pmodel->allowField(true)->validate(true)->save($data)) {
                return ['status'=>1,'msg'=>'信息提交成功'];
           }else{
               return ['status'=>2,'msg'=>$pmodel->getError()];
           }
        }else{
            unset($data['pid']);
            if($pmodel->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){
                return ['status'=>1,'msg'=>'信息修改成功'];
            }else{
               return ['status'=>2,'msg'=>$pmodel->getError()];
            }
        }
    }

   
}
