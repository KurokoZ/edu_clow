<?php
/*************************************************
 File name:      // AwardController
Author:  丰超     Version: 1.0     Date: 2015-12-15 // 作者、版本及完成日期
Description:    // 前台公共
*************************************************/
namespace Home\Controller;
use Think\Controller;
class OmronCommonController extends Controller {

	/**
	 * 初始化
	 */
	public function __construct(){
		
		parent::__construct();
		
		//测试 
// 		$_SESSION['corpid'] = "wxc1c0ec71bd894634";
// 		$_SESSION['corpsecret'] = "Qdty4MPJKcYh9s9hSB6A_TS6N3toidRcEF4vtjm7c6POGpB5hoymusEglFW8NWBW";
// 		$access_token = M("Omronvote")->where("`id`=13")->field("access_token,endtime")->find();
		//欧姆龙
 		$_SESSION['corpid'] = "wx9bfe0a0a810b90f8";
		$_SESSION['corpsecret'] = "qmI5aKxjypVFkF0J59bU_loQfzfpcnn9yUackT7ACz4u8kb-y5pERRSamEiaKObs";
 		$access_token = M("Omronvote")->where("`id`=12")->field("access_token,endtime")->find();
		//洛克
//		$_SESSION['corpid'] = "wx0927d01bdd9da2c5";
//		$_SESSION['corpsecret'] = "BVi2i-w0WmpLCCQL52GaNai1nEj8vOjpwloMvb0o7cRSnsk1K7SkfDLf7iiLg9Cs";
//		$access_token = M("Omronvote")->where("`id`=14")->field("access_token,endtime")->find();		

		if(time() >= $access_token['endtime']){
			$this->access_token();
		}else{
			$_SESSION['access_token'] = $access_token['access_token'];
		}
	}
	
	public function code($code){
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
			return $DeviceId;
		}else{
			return false;
		}
	}
	
	//获取access_token
	public function access_token(){

		$url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid={$_SESSION['corpid']}&corpsecret={$_SESSION['corpsecret']}";
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
		$access_token['endtime'] = time() + 7200;
		$omron = M("Omronvote");
		
// 		$find = $omron->where("`id`=13")->field("id")->find();
// 		$find = $omron->where("`id`=12")->field("id")->find();
		$find = $omron->where("`id`=14")->field("id")->find();
		
		if($find['id'] > 0){
// 			$omron->where("`id`=13")->save($access_token);
// 			$omron->where("`id`=12")->save($access_token);
			$omron->where("`id`=14")->save($access_token);
		}else{
			$omron->add($access_token);
		}
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