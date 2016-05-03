<?php
/**
 * Created by PhpStorm.
 * User: fc
 * Date: 2015/12/18
 * Time: 10:00
 */

namespace Admin\Controller;
class ModeController extends CommonController
{	

	/**
	 * 首页
	 *
	 * @author fengchao
	 */
    public function index(){

        $this->display();
    }
    
    /**
     * 上传图片
     * @author fengchao
     */
    public function uploadImg(){
    
    	$type = trim(I("get.dir"));
    	
    	//文件大小
    	$file_size = $_FILES['imgFile']['size']/1024;
    	if($file_size > 300 && $type=="image"){
    		echo json_encode(array('error' => 1, 'message' => "上传图片超过300kb"));
    		exit;
    	}else{
	        $upload = new \Think\Upload();// 实例化上传类
    		$rs = $upload->upload();
    		$name = "/admin/Public/Uploads/";
			echo json_encode(array('error' => 0, 'url' => $name.$rs['imgFile']['savepath'].$rs['imgFile']['savename']));
    		exit;
    	}
    }

}