<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Article extends Common
{
	public function lst(){
		// $article=db('acate')->alias('ac')->join('article a','ac.id=a.acateid')->join('journal j','j.id=a.jid')->order('a.id asc')->paginate(8);
		$article=db('article')->alias('a')->join('acate ac','ac.id=a.acateid')->join('journal j','j.id=a.jid')->field('a.*,j.title,ac.acatename')->order('a.id asc')->paginate(8);
		// dump($article);die;
		$this->assign('article',$article);
		return view();
	}

	public function add(){
		// dump(input('qishu'));die;
		if(input('qishu')){
			$this->assign('qishu',input('qishu'));
			$this->assign('jname',input('jname'));
		}
		$acate=db('acate')->select();
		$journal=db('journal')->select();
		if(request()->isPost()){
			$data=input('post.');
			// dump($data);die;
			$res=db('article')->insert($data);
			if($res){
				return $this->success('添加成功！','lst');
			}else{
				return $this->error('添加失败！');
			}
		}
		
		// dump($journal);die;
		$this->assign('acate',$acate);
		$this->assign('journal',$journal);
		return view();
	}

	public function edit(){
		$journal=db('journal')->select();
		$acate=db('acate')->select();
		$article=db('article')->where('id',input('id'))->find();
		// dump($article);die;
		if(request()->isPost()){
			$data=input('post.');
			// dump($data);die;
			$res=db('article')->update($data);
			if($res){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
		}

		$this->assign('acate',$acate);
		$this->assign('article',$article);
		$this->assign('journal',$journal);
		return view();
	}

	public function del(){
		if(db('article')->delete(input('id'))){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		} 
	}
}