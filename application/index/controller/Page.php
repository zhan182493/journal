<?php
namespace app\index\controller;
use app\index\controller\Common;
// header ( "Content-Type:text/html; charset=utf-8" );

class Page extends Common
{
	public function desc(){
		$this->assign('title','学报简介');
		return view();
	}

	public function helps(){
		$this->assign('title','投稿指南');
		return view();
	}

	public function call(){
		$this->assign('title','联系我们');
		return view();
	}

	public function article(){
		// dump(input('id'));dump(input('title'));die;
		if(input('title')=='学报公告'){
			$article=db('notice')->where('id',input('id'))->find();
		}else{
			$article=db('news')->where('id',input('id'))->find();
		}
		
		$this->assign('article',$article);
		// dump($article);die;
		$this->assign('title',input('title'));
		return view();
	}
}