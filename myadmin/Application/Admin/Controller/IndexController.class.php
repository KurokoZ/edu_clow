<?php
namespace Admin\Controller;
class IndexController extends CommonController {
	
    public function index(){
    	$url = urlencode("http://www.clow.net.cn/myadmin/Admin");
    	$urls = "https://qy.weixin.qq.com/cgi-bin/loginpage?corp_id=wxc1c0ec71bd894634&redirect_uri={$url}&state=luoke";		
    	$this->redirect($urls);
//     	$this->display();
    }
    

}