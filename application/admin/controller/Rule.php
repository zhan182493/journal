<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\AuthRule;

class Rule extends Common
{
	protected $beforeActionList = [
        'delson'  =>  ['only'=>'del'],
    ];



	public function lst(){
		$rule=new AuthRule;
		$ruletree=$rule->ruleTree();
		$this->assign('rule',$ruletree);
		return view();
	}

	public function add(){
		$rule=new AuthRule;
		$ruletree=$rule->ruleTree();
		$this->assign('rule',$ruletree);
		if(request()->isPost()){
			$data=input('post.');
			if(!isset($data['status'])){
				$data['status']=0;
			}else{
				$data['status']=1;
			}
			// dump($data);die;
			if(db('auth_rule')->insert($data)){
				return $this->success('添加成功！','lst');
			}else{
				return $this->error('添加失败！');
			}
		}
		
		return view();
	}

	public function edit(){
		$rul=new AuthRule;
		$ruletree=$rul->ruleTree();
		$this->assign('ruletree',$ruletree);
		if(request()->isPost()){
			$data=input('post.');
			// dump($data);die;
			if(!isset($data['status'])){
				$data['status']=0;
			}else{
				$data['status']=1;
			}
			// dump($data);die;
			if(db('auth_rule')->update($data)!==false){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
			return;
		}
		$rule=db('auth_rule')->where('id',input('rid'))->find();
		// dump($rule);die;
		$this->assign('rule',$rule);
		return view();
	}

	public function edstatus(){
		$data=input("post.");
		if(db('auth_rule')->update($data)){
			return json(['code'=>1,'msg'=>'修改成功!']);
		}else{
			return json(['code'=>2,'msg'=>'修改失败！']);
		} 
	}

	public function del(){
		// dump($this->delson());die;
		if($this->delson()==1){
			if(db('auth_rule')->delete(input('rid'))){
				return json(['code'=>1,'msg'=>'删除成功!']);
			}else{
				return json(['code'=>2,'msg'=>'删除失败!']);
			} 
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		}

			
	}

	public function delson(){
		// dump(input('rid'));die;
		$rule=new AuthRule;
		$sonid=$rule->getChildrenid(input('rid'));
		// dump($sonid);die;
		if($sonid!=''){
			foreach ($sonid as $k => $v) {
				AuthRule::destroy($v);	
			}
			return 1;
		}else{
			return 1;
		}
	}

}