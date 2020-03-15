<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\AuthRule;

class Role extends Common
{
	public function lst(){
		$role=db('auth_group')->select();
		// dump($role);die;
		$this->assign('role',$role);
		return view();
	}

	public function add(){
		$rule=new AuthRule;
		$ruletree=$rule->ruleTree();
		// dump($ruletree);die;8
		$this->assign('ruletree',$ruletree);
		if(request()->isPost()){
			$data=input('post.');
			
			$data['rules']=implode(',',$data['rules']);
			// dump($data);die;
			if(!isset($data['status'])){
				$data['status']=0;
			}else{
				$data['status']=1;
			}
			// dump($data);die;
			if(db('auth_group')->insert($data)){
				return $this->success('添加成功！','lst');
			}else{
				return $this->error('添加失败！');
			}
		}
		
		return view();
	}

	public function edit(){
		$rule=new AuthRule;
		$ruletree=$rule->ruleTree();
		$this->assign('ruletree',$ruletree);
		if(request()->isPost()){
			$data=input('post.');
			$data['rules']=implode(',',$data['rules']);
			// dump($data);die;
			if(!isset($data['status'])){
				$data['status']=0;
			}else{
				$data['status']=1;
			}
			// dump($data);die;
			if(db('auth_group')->update($data)!==false){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
			return;
		}
		$role=db('auth_group')->where('id',input('rid'))->find();
		$this->assign('role',$role);
		return view();
	}

	public function edstatus(){
		$data=input("post.");
		if(db('auth_group')->update($data)){
			return json(['code'=>1,'msg'=>'修改成功!']);
		}else{
			return json(['code'=>2,'msg'=>'修改失败！']);
		} 
	}

	public function del(){
		if(!db('auth_group_access')->where('group_id',input('rid'))->find()){
			if(db('auth_group')->delete(input('rid'))){
				return json(['code'=>1,'msg'=>'删除成功!']);
			}else{
				return json(['code'=>2,'msg'=>'删除失败!']);
			} 
		}else{
			return json(['code'=>2,'msg'=>'该角色下存在用户，不能删除!']);
		}
	}
}