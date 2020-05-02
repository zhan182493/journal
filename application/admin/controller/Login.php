<?php
namespace app\admin\controller;
use think\Controller;

class Login extends Controller
{
	public function login(){
		return view();
	}

	public function logout(){
		cookie('uid',null);
		cookie('rid',null);
		return $this->success('已注销,请重新登录','login');
	}

	public function logcheck(){
		$data=input('post.');
    	//$text = strip_tags($text);
    	$pwd= addslashes(trim(stripslashes($data['pwd'])));
    	$pwd="zxcv".$pwd;
		$user=db('user')->where('uname',$data['uname'])->find();
		// dump($user);die;
		if($user){
			if(MD5($pwd)!=$user['pwd']){
				return $this->error('用户名或密码错误！');
			}else{
				$role_access=db('auth_group_access')->where('uid',$user['id'])->find();
				$rid=$role_access['group_id'];
				$role=db('auth_group')->where('id',$rid)->find();
				if($role['role']=='作者'||$role['role']=='专家'){
					return $this->error('没有权限','index/index/index');
				}
				// dump($user['id']);die;
				cookie('uid',$user['id'],3600);
				cookie('rid',$rid,3600);
				return $this->success('登录成功正在跳转...','index/index');
			}
		}else{
			return $this->error('用户名或密码错误！');
		}
		
	}
}