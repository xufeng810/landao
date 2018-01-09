<?php
namespace app\backend\model;
use think\Model;
use think\Db;
use think\Config;
class Article extends Model
{   
	protected $type = array(
        'ctime' => 'timestamp:Y-m-d H:i',
        'start_time' => 'timestamp:Y-m-d H:i',
        'end_time' => 'timestamp:Y-m-d H:i',
        'on_time' => 'timestamp:Y-m-d H:i:s',
    );
    protected $insert = array(
       'ctime',

    );
    protected $update = array(
       'login_time',

    );
    protected function setctimeAttr()
    {
        return time();
    }
    protected function setstartTimeAttr($value)
    {   
        if(empty($value)){
            return time();
        }else{
            return strtotime($value);
        }
        
    }
    protected function setendTimeAttr($value)
    {
        if(empty($value)){
            return time()+31104000;
        }else{
            return strtotime($value)+86400;
        }
    }
    protected function setauthorAttr($value)
    {
        if(empty($value)){
            return '小杜';
        }else{
            return $value;
        }
    }
   
    //文章分类关联表
   public function hasCateone()
    {
        return $this->hasOne('ArticleCat','id','arcate_id')->field('title,id');
    }

    //查询数据
    static public function stDate($where){
        $ress=Article::where($where)->order('id DESC')->paginate(Config::get('paginate.list_rows'),false, ['query' => request()->param()]);
        return $ress;
    }
   
}
 

