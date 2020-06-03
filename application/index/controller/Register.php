<?php
namespace app\index\controller;
use app\index\controller\Common;
use app\index\model\User;

class Register extends Common
{
	public function signup(){

		if(request()->isPost()){
			$data=input('post.');
			// dump($data);die;
			$validate=validate("Register"); //使用验证
           //scene("save")->check($data)内置方法
           if(!$validate->check($data)){
              return $this->error($validate->getError());//内置错误返回
           }
			// dump('通过');die;
			if(db('user')->where('uname',$data['uname'])->find()){
				return $this->error('该用户名已注册！');
			}elseif(db('user')->where('name',$data['name'])->find()){
				return $this->error($data['name'].'已注册过账号！');
			}elseif(db('user')->where('tel',$data['tel'])->find()){
				return $this->error('该手机号已注册！');
			}
			
			$pwd="zxcv".$data['password'];
			$data['pwd']=MD5($pwd);
			unset($data['password']);

			// dump($data['pwd']);die;
			$user=new User;
			if($user->save($data)){
				$auth=[];
				$auth['uid']=$user->id;
				$role=db('auth_group')->where('role','作者')->find();
				$auth['group_id']=$role['id'];
				db('auth_group_access')->insert($auth);
				return $this->success('注册成功！','Login/signin');
			}else{
				return $this->error('添加失败！');
			}
		}
		
		return view();
	}

	
}