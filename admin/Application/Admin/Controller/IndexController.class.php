<?php
/*************************************************
  File name:      // IndexController
  Author:  丰超     Version: 1.0     Date: 2015-12-9 // 作者、版本及完成日期
  Description:    // 关于后台首页
*************************************************/
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    
    public function _initialize(){
        parent::_initialize();
    }
    
    /** 
        首页
    **/
    public function index(){
        $this->display();
    }
}