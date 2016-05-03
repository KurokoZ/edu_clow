<?php
/*************************************************
  File name:      // VoteController
  Author:  丰超     Version: 1.0     Date: 2016-3-16 // 作者、版本及完成日期
  Description:    // 图文直播
*************************************************/
namespace Admin\Controller;
class AutoRefreshController extends CommonController {
        
    public function _initialize(){
        parent::_initialize();
    }
    
    /** 
        首页
    **/
    public function index(){
        $list = M("Auto_refresh")->select();
        $this->assign("list",$list);
        $this->display();
    }
    
    /** 
        添加信息
    **/
    public function add(){
        if(IS_POST){
            $data['addtime'] = time();
            $data['title'] = I('post.title');
            $data['content'] = I('post.content');
            $add = M("Auto_refresh")->add($data);
            if($add){
                $msg['type'] = 'true';
                $msg['info'] = '添加成功';
            }else{
                $msg['type'] = 'false';
                $msg['info'] = '添加失败';
            }
            $this->ajaxReturn($msg);
        }else{
            $type = "添加消息";
            $this->assign("type",$type);
            $this->display();
        }
    }
    
        
    /** 
        添加信息
    **/
    public function edit(){
        $id = I('get.id');
        if(IS_POST){
            $data['addtime'] = time();
            $data['title'] = I('post.title');
            $data['content'] = I('post.content');
            $add = M("Auto_refresh")->where("`id`={$id}")->save($data);
            if($add){
                $msg['type'] = 'true';
                $msg['info'] = '编辑成功';
            }else{
                $msg['type'] = 'false';
                $msg['info'] = '编辑失败';
            }
            $this->ajaxReturn($msg);
        }else{
            $list = M("Auto_refresh")->where("`id`={$id}")->find();
            $this->assign("list",$list);
            
            $type = "编辑消息";
            $this->assign("type",$type);
            $this->display("add");
        }
    }
}