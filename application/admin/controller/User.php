<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class User extends Common
{
	public function lst(){
		// dump(input('id'));
		$role=db('auth_group')->select();
		$this->assign('role',$role);
		if(request()->isPost()){
			dump(input('id'));die;
			$roleid=input('roleid');
			$user=db('user')->alias('u')->join('auth_group_access ra','ra.uid=u.id')->join('auth_group r','r.id=ra.group_id')->where('group_id',$roleid)->select();
			$this->assign('user',$user);
			return json(['code' => 1 , 'msg' => 'ok！']);
		}
		
		//三表查询user--auth_group_access--auth_group得到用户角色
		// $user2=db('user')->alias('u')->join('auth_group_access ra','ra.uid=u.id')->join('auth_group r','r.id=ra.group_id')->where('group_id','3')->select();
		$user=db('auth_group_access')
		->alias('ra')
		->join('user u','ra.uid=u.id')
		->join('auth_group r','r.id=ra.group_id')
		// ->where('group_id','3')
		->select();
		//两表查询user--acate得到专家审核类型
		$acate=db('user')->alias('u')->join('acate a','u.acateid=a.id')
		->field(['a.acatename','u.acateid'])
		->select();
		// dump($acatename);die;
		//循环合并数组
		for ($i=0; $i < count($user); $i++) {
			for($j=0;$j<count($acate); $j++){
				if($acate[$j]['acateid']==$user[$i]['acateid']){
					$user[$i]['acatename']=$acate[$j]['acatename'];
				}
			}
		}
		// dump($role);
		// dump($user);die;
		
		$this->assign('user',$user);
		$this->assign('acate',$acate);
		
		return view();
	}

	public function add(){
		$role=input('id');

		$acate=db('acate')->select();
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
		$this->assign('acate',$acate);
		return view();
	}

	public function edit(){
		$role=input('rid');

		$uid=input('uid');

		$acate=db('acate')->select();
		$user=db('user')->find($uid);
		$zhuanjia=db('acate')->alias('a')->join('user u','u.acateid=a.id')->where('u.id',$uid)->find();
		// dump($user);die;
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
		// dump($user);die;
		$this->assign('user',$user);
		$this->assign('zhuanjia',$zhuanjia);
		$this->assign('role',$role);
		$this->assign('acate',$acate);
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