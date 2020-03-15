<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Link extends Common
{
	public function lst(){
		$linklst=db('link')->select();
		$this->assign('linklst',$linklst);
		return view();
	}

	public function add(){
		if(request()->isPost()){
			if(db('link')->insert(input('post.'))){
				return $this->success('添加成功！','lst');
			}else{
				return $this->error('添加失败！');
			}
		}
		return view();
	}

	public function edit(){
		$link=db('link')->where('id',input('id'))->find();
		if(request()->isPost()){
			if(db('link')->update(input('post.'))!==false){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
		}
		$this->assign('link',$link);
		return view();
	}

	public function del(){
		if(db('link')->delete(input('id'))){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		} 
	}
}