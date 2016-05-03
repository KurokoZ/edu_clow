<?php
/*************************************************
  File name:      // LoginController
  Author:  丰超     Version: 1.0     Date: 2015-12-9 // 作者、版本及完成日期
  Description:    // 关于登录 登出
*************************************************/
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	//登录
    public function index(){
		$this->display();
    }

	//登出
    public function login(){
    	$name = I("post.name");
		$password = md5(I("post.password"));
        $user = M("Admin_users")->where("`username`='{$name}'")->field("id,password,authority")->find();
		if($user["id"] > 0){
			if($user['password'] == $password){
				$_SESSION['user_name'] = $user['username'];
                $_SESSION['authority'] = $user['authority'];
				$msg['type'] = 'true';
				$msg['url'] = U("Index/index");
			}else{
				$msg['type'] = 'password';
				$msg['info'] = '请输入正常的密码';
			}
		}else{
			$msg['type'] = 'name';
			$msg['info'] = '请输入正常的帐号';
		}
		$this->ajaxReturn($msg);
    }

    //登出
    public function logout(){
    	$_SESSION = '';
    	$this->redirect("Login/index");
    }
}