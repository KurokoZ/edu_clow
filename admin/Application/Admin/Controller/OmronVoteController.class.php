<?php
/*************************************************
  File name:      // VoteController
  Author:  丰超     Version: 1.0     Date: 2015-12-9 // 作者、版本及完成日期
  Description:    // 关于投票
*************************************************/
namespace Admin\Controller;
class OmronVoteController extends CommonController {
        
    public function _initialize(){
        parent::_initialize();
    }
    
    /** 
        首页
    **/
    public function index(){
        //参赛者信息
//         $users = M("Omronvote_users");
        $vote = M("Omronvote_vote");
//         $user = $users->field("id,name,img")->select();
		for($i=0;$i<41;$i++){
			$user[$i]['id'] = $i + 1;
			$user[$i]['img'] = "/admin/Public/img/omronvote/".$user[$i]['id'].'.jpg';
			$user[$i]["num"] = $vote->where("`fid`={$user[$i]['id']}")->field("id")->count();
		}
//         foreach($user as $k=>$v){
//             $user[$k]["num"] = $vote->where("`fid`={$v['id']}")->field("id")->count();
//         }
        $this->assign("users",$user);
        
        $this->display();
    }
}