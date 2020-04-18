<?php
namespace app\index\controller;
use app\index\controller\Common;

class Article extends Common
{
	public function article(){
		$article=db('user')->alias('u')->join('article a','a.aid=u.id','LEFT')->where('a.id',input('id'))->find();
		// dump($article);die;
		$acate=db('acate')->where("id",$article['acateid'])->find();
		$draft=db('draft')->where('id',$article['draftid'])->find();
		$journal=db('journal')->where('id',$article['jid'])->find();
		$refrences=explode(',', $article['refrences']);
		// dump($refrences);die;
			$article['acatename']=$acate['acatename'];
			$article['thumb']=$draft['thumb'];
			$article['draft_time']=$draft['create_time'];
			$article['refrences']=$refrences;
			$article['issn']=$journal['issn'];
			$article['cn']=$journal['cn'];
		// dump($article);die;
			$this->assign('art',$article);
		return view();
	}
}