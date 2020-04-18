<?php
namespace app\index\controller;
use app\index\controller\Common;

class Index extends Common
{
    public function index()
    {
    	//动态
    	$news=db('news')->select();
    	$this->assign('news',$news);
    	//最新期文章列表
    	$this->newArtlst();
        return view();
    }

    public function newArtlst(){
    	$arts=db('article')->order('create_time desc')->find();
    	$year=date('Y',time());
    	$date=date('Y-m-d',$arts['use_time']);
    	$juan=$arts['juan'];
    	$qishu=$arts['qishu'];
    	// $artlst=db('article')->where('juan',$juan)->where('qishu',$qishu)->select();
    	$artres=db('user')->alias('u')->join('article a','a.aid=u.id')->where('a.juan',$juan)->where('a.qishu',$qishu)->select();

        $artlst=[];
            foreach ($artres as $v) {
                $draft=db('draft')->where('id',$v['draftid'])->find();
                $v['thumb']=$draft['thumb'];
                $v['fthumb']=$draft['fthumb'];
                $artlst[]=$v;
            }
    	$this->assign('artlst',$artlst);
    	$this->assign('year',$year);
    	$this->assign('date',$date);
    	$this->assign('juan',$juan);
    	$this->assign('qishu',$qishu);
    }

    
}
