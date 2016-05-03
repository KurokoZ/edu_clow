<?php
/*************************************************
  File name:      // AwardController
  Author:  丰超     Version: 1.0     Date: 2015-12-9 // 作者、版本及完成日期
  Description:    // 关于大转盘抽奖
*************************************************/
namespace Admin\Controller;
use Think\Controller;
class OmronAwardController extends CommonController {
        
    public function _initialize(){
        parent::_initialize();
    }
    
    /** 
        首页
    **/
    public function index(){
        $award = M("Omronvote_award");
        $user = $award->field("id,orgname,username,telphone,img,num_1,num_2,awardstatus,awardname")->select();
        $this->assign("users",$user);
        $this->display();
    }
}