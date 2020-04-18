<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\News as NewsModel;

class News extends Common
{
	public function lst(){
		$newslst=db('news')->order('id asc')->select();
		$this->assign('newslst',$newslst);

		return view();
	}

	public function search(){
		if(input('search')){
			$newslst=db('news')->where('title','like','%'.input('search').'%')->order('id asc')->select();
		$this->assign('newslst',$newslst);
		$this->assign('search',input('search'));
		return view();
		}else{
			$newslst=db('news')->order('id asc')->select();
		$this->assign('newslst',$newslst);
		$this->assign('search',input('search'));
		return view();
		}
	}

	public function add(){
		if(request()->isPost()){

			$data=input('post.');

			// dump($data);die;
			$model=new newsModel;
			if($model->save($data)){
				return $this->success('添加成功！','lst');
			}else{
				return $this->error('添加失败！');
			}
		}
		return view();
	}

	public function edit(){
		$news=db('news')->where('id',input('id'))->find();
		if(request()->isPost()){
			$model=new newsModel;
			if($model->update(input('post.'))!==false){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
		}
		$this->assign('news',$news);
		return view();
	}

	public function chakan(){
		$res=db('news')->where('id',input('id'))->find();
		if($res){
			return json(['code'=>1,'data'=>nl2br($res['content'])]);
		}else{
			return json(['code'=>2,'msg'=>'错误!']);
		}
	}

	public function del(){
		if(db('news')->delete(input('id'))){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		} 
	}
}