<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Acate extends Common
{
	public function lst(){
		$acatelst=db('acate')->select();
		$this->assign('acatelst',$acatelst);

		return view();
	}

	public function add(){
		if(request()->isPost()){
			if(db('acate')->insert(input('post.'))){
				return $this->success('添加成功！','lst');
			}else{
				return $this->error('添加失败！');
			}
		}
		return view();
	}

	public function edit(){
		$acate=db('acate')->where('id',input('id'))->find();
		if(request()->isPost()){
			if(db('acate')->update(input('post.'))!==false){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
		}
		$this->assign('acate',$acate);
		return view();
	}

	public function del(){
		if(db('acate')->delete(input('id'))){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		} 
	}
}