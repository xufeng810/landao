<?php
namespace app\backend\model;
use think\Model;
use think\Db;
use think\Session;
use think\Request;
class ArticleCat extends Model
{   
	// 类型转换
    protected $type = array(
        'ctime' => 'timestamp:Y-m-d',
    );
    protected $insert = array(
       'ctime',
    );

    protected function setctimeAttr()
    {
        return time();
    }
    public function cateList(){
        $ress=ArticleCat::where('status',1)->field('id,pid,title,ord')->order('ord')->select();
        if($ress) {
            $list = collection($ress)->toArray();
        }
        return $list;
    }
    
   
}
 

