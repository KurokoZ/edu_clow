<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

	/**
	 * 初始化
	 */
	public function __construct(){
		
		parent::__construct();
		
		$name = $_SESSION['user_id'];
		if($name !== 'lkr_admin'){
			$this->redirect("Login/index");
		}else{
			$action_url = U(CONTROLLER_NAME."/".ACTION_NAME);
			$this->assign("action_url",$action_url);
		}
		
// 		$access_token = M("")->field("access_token,endtime")->find();
// 		if(time() >= $access_token['endtime']){
// 			$this->access_token();
// 		}else{
// 			$_SESSION['access_token'] = $access_token['access_token'];
// 		}
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