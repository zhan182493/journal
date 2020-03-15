<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class User extends Common
{
	public function lst(){
		// dump(input('id'));
		$rolelst=db('auth_group')->select();
		$this->assign('rolelst',$rolelst);
		if(request()->isPost()){
			// dump(input('rid'));die;
			
			$roleid=input('rid');
			$user=db('user')->alias('u')->join('auth_group_access ra','ra.uid=u.id')->join('auth_group r','r.id=ra.group_id')->where('group_id',$roleid)->select();
			if(!$user){
				$this->assign('role',input('role'));
				$this->assign('user','');
				return view();
			}
			$acate=db('user')->alias('u')->join('acate a','u.acateid=a.id')
			->field(['a.acatename','u.acateid'])
			->select();
			for ($i=0; $i < count($user); $i++) {
				for($j=0;$j<count($acate); $j++){
					if($acate[$j]['acateid']==$user[$i]['acateid']){
						$user[$i]['acatename']=$acate[$j]['acatename'];
					}
				}
			}
			// dump($user);die;
			$this->assign('role',input('role'));
			$this->assign('user',$user);
			return view();
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
		$this->assign('role','全部');
		$this->assign('user',$user);
		$this->assign('acate',$acate);
		
		return view();
	}

	public function add(){

		$role=input('role');
		// dump($role);die;
		$acate=db('acate')->select();
		if(request()->isPost()){
			// dump($_POST);die;
			$data=$_POST;
			$id=db('auth_group')->where('role',$data['role'])->field('id')->find();
			$rid=$id['id'];
			unset($data['role']);
			// dump($rid);die;
			if(!$data['pwd']==$data['rpwd']){
				return $this->error('两次密码不一致！');
			}
			unset($data['rpwd']);
			if(!$role=='专家'){
				$data['acateid']=0;
			}
			// dump($data);die;
			$uid=db('user')->insertGetid($data);
			// dump($uid);die;
			if($uid){
				if(db('auth_group_access')->insert(['uid'=>$uid,'group_id'=>$rid])){
					// dump(111);die;
					return $this->success('添加成功！','lst');
				}else{
					return $this->error('添加失败');
				}
			}else{
				return $this->error('添加失败');
			}
		}
		$this->assign('role',$role);
		$this->assign('acate',$acate);
		return view();
	}

	public function edit(){
		$rid=input('rid');

		$uid=input('uid');

		$acate=db('acate')->select();
		$user=db('user')->find($uid);
		$zhuanjia=db('acate')->alias('a')->join('user u','u.acateid=a.id')->where('u.id',$uid)->find();
		// dump($user);die;
		if(request()->isPost()){
			$data=$_POST;
			if($data['pwd']==''){
				$data['pwd']=$user['pwd'];
			}else{
				if(!$data['pwd']==$data['rpwd']){
					return $this->error('两次密码不一致！');
				}
			}
			
			unset($data['rpwd']);
			unset($data['rid']);
			unset($data['uid']);
			// dump($data);die;
			if(db('user')->where('id',input('uid'))->update($data)!==false){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败');
			}
			return;
		}
		// dump($user);die;
		$this->assign('user',$user);
		$this->assign('zhuanjia',$zhuanjia);
		$this->assign('rid',$rid);
		$this->assign('acate',$acate);
		return view();
	}

	public function del(){
		// dump(input('id'));die;
		if(db('auth_group_access')->delete(input('uid'))){
			if(db('user')->delete(input('uid'))){
				return json(['code'=>1,'msg'=>'删除成功!']);
			}else{
				return json(['code'=>2,'msg'=>'删除失败!']);
			} 
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		}
	}

	public function search(){

		$user=db('auth_group_access')
		->alias('ra')
		->join('user u','ra.uid=u.id')
		
		->join('auth_group r','r.id=ra.group_id')
		->where('name',input('name'))
		// ->where('group_id','3')
		->select();

		//两表查询user--acate得到专家审核类型
		$acate=db('user')->alias('u')->join('acate a','u.acateid=a.id')
		->where('name',input('name'))
		->field(['a.acatename','u.acateid'])
		->select();
		// dump($user);die;
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
		$rolelst=db('auth_group')->select();
		$this->assign('rolelst',$rolelst);
		$this->assign('name',input('name'));
		return view();
	}
}