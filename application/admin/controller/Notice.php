<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Notice as NoticeModel;

class Notice extends Common
{
	public function lst(){
		$noticelst=db('notice')->order('id asc')->select();
		$this->assign('noticelst',$noticelst);

		return view();
	}

	public function search(){
		if(input('search')){
			$noticelst=db('notice')->where('title','like','%'.input('search').'%')->order('id asc')->select();
		$this->assign('noticelst',$noticelst);
		$this->assign('search',input('search'));
		return view();
		}else{
			$noticelst=db('notice')->order('id asc')->select();
		$this->assign('noticelst',$noticelst);
		$this->assign('search',input('search'));
		return view();
		}
	}

	public function add(){
		if(request()->isPost()){

			$data=input('post.');

			// dump($data);die;
			$model=new NoticeModel;
			if($model->save($data)){
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
			$model=new NoticeModel;
			if($model->update(input('post.'))!==false){
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
			return json(['code'=>1,'data'=>nl2br($res['content'])]);
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