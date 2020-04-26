<?php
namespace app\index\controller;
use app\index\controller\Common;

class Article extends Common
{
	public function article(){
		$article=db('user')->alias('u')->join('article a','a.aid=u.id','LEFT')->where('a.id',input('id'))->find();
		$click=$article['click']+1;
		db('article')->where('id',input('id'))->update(['click'=>$click]);
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

	public function add_download(){
		$article=db('article')->where('id',input('aid'))->find();
		$download=$article['download']+1;
		if(db('article')->where('id',input('aid'))->update(['download'=>$download])){
			return json(['code'=>1,'num'=>$download]);
		}else{
			return json(['code'=>2,'num'=>'失败']);
		}
	}
}