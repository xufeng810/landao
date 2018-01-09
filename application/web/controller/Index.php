<?php
namespace app\web\controller;
use think\Controller;
use think\Request;
class Index extends Controller
{   

    public function index()
    {	
    	
        return $this->fetch();
    }
 
}
