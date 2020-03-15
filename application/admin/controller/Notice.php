<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Notice extends Common
{
	public function lst(){
		$noticelst=db('notice')->order('id asc')->select();
		$this->assign('noticelst',$noticelst);

		return view();
	}

	public function add(){
		if(request()->isPost()){
			// dump(input('post.'));die;
			$data=input('post.');

			// dump($data);die;
			if(db('notice')->insert($data)){
				return $this->success('添加成功！','lst');
			}else{
				return $this->error('添加失败！');
			}
		}
		return view();
	}

	public function edit(){
		$notice=db('notice')->where('id',input('id'))->find();
		if(request()->isPost()){
			if(db('notice')->update(input('post.'))!==false){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
		}
		$this->assign('notice',$notice);
		return view();
	}

	public function chakan(){
		$res=db('notice')->where('id',input('id'))->find();
		if($res){
			return json(['code'=>1,'data'=>$res['content']]);
		}else{
			return json(['code'=>2,'msg'=>'错误!']);
		}
	}

	public function del(){
		if(db('notice')->delete(input('id'))){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		} 
	}
}