<?php
namespace Admin\Controller;
class CubeController extends CommonController {
	//首页
    public function index(){
		$this->display();
    }
    
    //弹层
    public function elastic(){
    	$this->display();
    }
    
    //提示
    public function tip(){
    	$this->display();
    }
    
    //表单
    public function form(){
    	$this->display();
    }
    
    //瀑布流
    public function waterfall(){
    	$this->display();
    }
    
    //展示
    public function projects(){
    	$this->display();
    }
}