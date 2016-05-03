<?php
/*************************************************
  File name:      // IndexController
  Author:  丰超     Version: 1.0     Date: 2015-12-9 // 作者、版本及完成日期
  Description:    // 关于后台首页
*************************************************/
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    /**
     * 初始化
     * MODULE_NAME   大的文件名 ： Admin
     * CONTROLLER_NAME   控制器名
     * ACTION_NAME    方法名
     */
    public function _initialize(){
        if($_SESSION['user_name'] == '' &&  $_SESSION['authority'] <= 0){
            $_SESSION = '';
            $this->redirect("Login/index");
        }
        $action_url = "/TPmode/index.php/Admin/".CONTROLLER_NAME."/".ACTION_NAME.".html";
        $this->assign("action_url",$action_url);
    }
}