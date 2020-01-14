<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class User extends Common
{
	public function lst(){
		// dump(input('roleid'));
		$role=db('auth_group')->select();
		$this->assign('role',$role);
		if(request()->isPost()){
			dump(input('roleid'));die;
			$roleid=input('roleid');
			$user=db('user')->alias('u')->join('auth_group_access ra','ra.uid=u.id')->join('auth_group r','r.id=ra.group_id')->where('group_id',$roleid)->select();
			$this->assign('user',$user);
			return json(['code' => 1 , 'msg' => 'ok！']);
		}
		
		//三表查询user--auth_group_access--auth_group得到用户角色
		$user=db('user')->alias('u')->join('auth_group_access ra','ra.uid=u.id')->join('auth_group r','r.id=ra.group_id')->where('group_id','1')->select();
		//两表查询user--acate得到专家审核类型
		$acatename=db('user')->alias('u')->join('acate a','u.acateid=a.id')->field('a.acatename')->select();
		//循环合并数组
		for ($i=0; $i < count($user); $i++) { 
			$user[$i]['acatename']=$acatename[$i]['acatename'];
		}
		// dump($role);
		// dump($user);die;
		
		$this->assign('user',$user);
		
		return view();
	}

	public function add(){
		$role=input('id');
		if(request()->isPost()){
			// dump($_POST);die;
			$data=$_POST;
			unset($data['rpwd']);
			if(!$role==3){
				unset($data['acateid']);
			}
			// dump($data);die;
			if(db('user')->insert($data)){
				return $this->success('添加成功！','lst');
			}else{
				return $this->error('添加失败');
			}
			return;
		}
		$this->assign('id',$role);
		return view();
	}

	public function edit(){
		$user=db('user')->find(input('id'));
		if(request()->isPost()){
			$data=$_POST;
			unset($data['rpwd']);
			if($data['pwd']==''){
				$data['pwd']=$user['pwd'];
			}
			// dump($data);die;
			if(db('user')->update($data)){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败');
			}
			return;
		}
		// dump($user);
		$this->assign('user',$user);
		return view();
	}

	public function del(){
		// dump(input('id'));
		if(db('user')->delete(input('id'))){
			return $this->success('删除成功！','lst');
		}else{
			return $this->error('删除失败');
		}
	}
}