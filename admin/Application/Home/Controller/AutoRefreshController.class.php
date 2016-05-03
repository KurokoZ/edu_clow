<?php
namespace Home\Controller;
class AutoRefreshController extends CommonController {
	
	//首页 
	public function index(){
		$list = M("Auto_refresh")->order("addtime desc")->select();
		$this->assign("list",$list);
		$this->display();
	}	
}