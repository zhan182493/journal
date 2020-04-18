<?php
namespace app\index\controller;
use app\index\controller\Common;
use app\index\model\User;

class Login extends Common
{
	public function signin(){
		if(request()->isPost()){
			//对数据过滤
			$pwd= addslashes(trim(stripslashes(input('pwd'))));
			$pwd="zxcv".$pwd;
			// dump(MD5($pwd));
			$uname= addslashes(trim(stripslashes(input('uname'))));
			$res=db('user')->where('uname',$uname)->find();
			// dump($res['pwd']);die;
			if($res){
				if(MD5($pwd)==$res['pwd']){
					
					if($res['acateid']!=0){
						
						cookie('zjid',$res['id'],3600);
						return $this->success('登录成功！正在跳转...','Reviewers/index');
					}else{
						
						cookie('aid',$res['id'],3600);
						return $this->success('登录成功！正在跳转...','Author/index');
					}
					
				}else{
					return $this->error('密码错误！');
				}
			}else{
				return $this->error('用户名或密码错误！');
			}
		}
		return view();
	}

	public function logout(){
		cookie('zjid',null);
		cookie('aid',null);
			return $this->success('已注销...','index/index');
	}

	public function findpwd(){
		if(request()->isPost()){
			if(input('question')==''){
				return $this->error("请先获取问题！");
			}
			$res=db('user')->where('tel',input('msg'))->whereOr('uname',input('msg'))->find();
			if($res['answer']==input('answer')){
				$this->assign('uid',$res['id']);
				return view("editpwd");
			}else{
				return $this->error("答案错误！");
			}
		}
		return view();
	}

	public function huoqu(){
		if(input('msg')){
			$res=db('user')->where('tel',input('msg'))->whereOr('uname',input('msg'))->find();
			if($res){
				if($res['question']==''){
					return json(['code'=>1,'msg'=>'无']);
				}
				return json(['code'=>1,'msg'=>$res['question']]);
			}else{
				return json(['code'=>2,'msg'=>'手机号或用户名不存在']);
			}
		}else{
			return $this->error("请输入用户名或手机号获取问题");
		}
	}

	public function editpwd(){
		// dump(input('post.'));die;
		$data=input('post.');
		$find=db('user')->where('id',$data['id'])->find();
		$pwd="zxcv".$data['pwd'];
		$data['pwd']=MD5($pwd);
		if($data['pwd']==$find['pwd']){
			return $this->error("修改失败！（可能原因：新旧密码一致）");
		}
		$user=new User;
		if($user->update($data)){
			return $this->success("修改成功！","Login/signin");
		}else{
			return $this->error("修改失败！");
		}
	}
}