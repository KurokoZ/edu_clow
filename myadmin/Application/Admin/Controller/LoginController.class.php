<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	//登录
    public function index(){
    	$code = $_GET['code'];
    	if($code !== ''){
    		$this->access_token();
    		$code = $_GET['code'];
    		$access_token = $_SESSION['access_token'];
    		$url = "https://qyapi.weixin.qq.com/cgi-bin/user/getuserinfo?access_token={$access_token}&code={$code}";
    		// 初始化一个 cURL 对象
    		$curl = curl_init();
    		
    		// 设置你需要抓取的URL
    		curl_setopt($curl, CURLOPT_URL, $url);
    		
    		// 设置header
    		curl_setopt($curl, CURLOPT_HEADER, 0);
    		
    		// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
    		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    		
    		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
    		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    		
    		// 运行cURL，请求网页
    		$data = curl_exec($curl);
    		
    		// 关闭URL请求
    		curl_close($curl);
    		
    		$DeviceId = $this->object_array(json_decode($data));
    		dump($DeviceId);
    	}
		$this->display();
    }

	//登录
    public function login(){
    	$url = urlencode("http://www.clow.net.cn/myadmin/Admin/Login/index");
    	$urls = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc1c0ec71bd894634&redirect_uri={$url}&response_type=code&scope=SCOPE&state=STATE#wechat_redirect";
    	$msg['type'] = 'true';
    	$msg['url'] = $urls;
    	$this->ajaxReturn($msg);
    	
    	$name = I("post.name");
		$password = I("post.password");
		if($name == 'admin'){
			if($password == '123456'){
				$_SESSION['user_id'] = 'lkr_admin';
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
    
    //获取access_token
    public function access_token(){
    	$corpid = "wxc1c0ec71bd894634";
    	$corpsecret = "Qdty4MPJKcYh9s9hSB6A_TS6N3toidRcEF4vtjm7c6POGpB5hoymusEglFW8NWBW";
    	$url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid={$corpid}&corpsecret={$corpsecret}";
    	// 初始化一个 cURL 对象
    	$curl = curl_init();
    
    	// 设置你需要抓取的URL
    	curl_setopt($curl, CURLOPT_URL, $url);
    
    	// 设置header
    	curl_setopt($curl, CURLOPT_HEADER, 0);
    
    	// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
    	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    
    	// 运行cURL，请求网页
    	$data = curl_exec($curl);
    
    	// 关闭URL请求
    	curl_close($curl);
    
    	$access_token = $this->object_array(json_decode($data));
    	$_SESSION['access_token'] = $access_token['access_token'];
    }
    
    //数组转换
    public function object_array($array){
    	if(is_object($array)){
    		$array = (array)$array;
    	}
    	if(is_array($array)){
    		foreach($array as $key=>$value){
    			$array[$key] = $this->object_array($value);
    		}
    	}
    	return $array;
    }
}