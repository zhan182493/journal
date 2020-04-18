<?php
namespace app\index\controller;
use think\Controller;

class Common extends Controller
{
	function _initialize(){
		$this->linklst();
		$this->noticelst();
	}
	
	/*首页导航栏页面*/
	/*列表页*/
	public function news(){
		$news=db('news')->select();
		$this->assign('artlst',$news);
		$this->assign('title','学报动态');
		return view('artlist');
	}

	public function notice(){
		$notice=db('notice')->select();
		$this->assign('artlst',$notice);
		$this->assign('title','学报公告');
		return view('artlist');
	}
	
	
	/*列表页end*/
	
	public function linklst(){
		$linklst=db('link')->select();
    	$this->assign('linklst',$linklst);
	}

	public function noticelst(){
		$notice=db('notice')->select();
		$this->assign('notice',$notice);

	}

}