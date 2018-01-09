<?php
namespace app\backend\model;
use think\Model;
class AuthRule extends Model
{   
    // 类型转换
    protected $type = array(
        'created_t' => 'timestamp:Y-m-d',
    );
    protected $insert = array(
       'created_t',
    );

    protected function setcreatedTAttr()
    {
        return time();
    }
  
   

}
 
