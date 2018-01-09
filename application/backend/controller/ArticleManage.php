<?php
namespace app\backend\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\backend\model\Article;
use app\backend\model\ArticleCat;
use app\backend\logic\ArticleLogic;
class ArticleManage  extends Common
{      


    //文章列表界面
    public function articleList(){
       
        $select=ArticleLogic::selectParam();
        $dataress=Article::stDate($select['where']);
        $art_status=config('art_status');
        $data=[
            'data'=>$dataress,
            'param'=>$select['param'],
            'art_status'=>$art_status,
        ];
        $model=new ArticleCat;
        $this->assign('catlist',generateTree($model->cateList()));
        $this->assign('data',$data);
        $this->assign('breadcrumb',['0'=>'文章列表']);
        return  $this->fetch();
    }

    //添加文章界面
    public function articleAdd(){
    	if(Request::instance()->isPost()===true){
    		$data=$this->dataAction();
    		$auress=$this->ausess();
    		$data['auid']=$auress['auid'];
    		if($data['status']==2){
    			$data['on_time']=time();
    		}
    		$model=new Article;
    		if(empty($data['id'])){
                if($model->allowField(true)->validate(true)->save($data)) {
                    $this->redirect('articleManage/articleList');
               }else{
                   $this->error('添加失败！原因为：'.$pmodel->getError());
               }
            }else{
                if($model->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){
                    $this->redirect('articleManage/articleList');
                }else{
                   $this->error('修改失败！原因为：'.$pmodel->getError());
                }
            }
    	}
        $model=new ArticleCat;
        $this->assign('catlist',generateTree($model->cateList()));
        $this->add('article',['arcate_id'=>'','status'=>1,'end_time'=>'','start_time'=>'']);
        $this->assign('breadcrumb',['0'=>'添加文章']);
        return  $this->fetch();
    }
    //删除
    public function artDelete(){
        if(var_export(Request::instance()->isAjax(), true)){
            $ress=$this->delete('article');
            return $ress;
        } 
    }
    //修改状态
    public function change(){
        if(var_export(Request::instance()->isAjax(), true)){
            $data=$this->dataAction();
            $status=$data['status']?0:1;
            $ress=Article::where('id', $data['id'])->update([$data['field']=>$status]);
            if($ress){
                return ['status'=>1,'msg'=>'修改成功！','field_status'=>$status,'id'=>$data['id'],'field'=>$data['field']];
            }else{
                return ['status'=>2,'msg'=>'修改失败！'];
            }
        }
    }
   
}
