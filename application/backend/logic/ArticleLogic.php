<?php
namespace app\backend\logic;
use think\Db;
use think\Request;
class ArticleLogic 
{   
	static public  function selectParam(){
        $where='';
        $param=input('param.');
        //文章标题
        if(isset($param['title']) && !empty($param['title'])){
            $where['title']=array('like',"%$param[title]%");
        }
        //作者
        if(isset($param['author']) && !empty($param['author'])){
            $where['author']=array('like',"%$param[author]%");
        }
        //文章分类
        if(isset($param['arcate_id']) && !empty($param['arcate_id'])){
            $where['arcate_id']=$param['arcate_id'];
        }else{
            $param['arcate_id']='';
        }
        //文章状态
        if(isset($param['status']) && !empty($param['status'])){
            $where['status']=$param['status'];
        }else{
            $param['status']='';
        }

        return ['where'=>$where,'param'=>$param];
    }
   
}
 

