<?php
namespace app\index\controller;
use think\Controller;

class Common extends Controller
{
	/*首页导航栏页面*/
	/*列表页*/
	public function news(){
		$this->assign('title','学报动态');
		return view('artlist');
	}

	public function notice(){
		$this->assign('title','学报公告');
		return view('artlist');
	}

	public function helps(){
		$this->assign('title','投稿指南');
		return view('artlist');
	}
	
	public function history(){
		$this->assign('title','过刊浏览');
		return view('joulist');
	}

	public function artlist2(){//当期文章目录
		return view('artlist2');
	}

	public function datelist(){//当年期数目录
		return view('datelist');
	}
	/*列表页end*/
	/*单页*/
	public function desc(){
		$this->assign('title','学报简介');
		return view('page');
	}

	public function call(){
		$this->assign('title','联系我们');
		return view('page');
	}
	/*单页end*/

}