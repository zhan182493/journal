<?php
namespace app\index\controller;
use app\index\controller\Common;

class Joulist extends Common
{
	public function history(){
		if(input('juan')){
			$arts=array(['juan'=>input('juan')]);
		}else{
			$arts=db('article')->field('juan')->distinct(true)->select();
		}
		
		$years=db('article')->field('use_time')->distinct(true)->select();
		// dump($years);die;
		$juanlst=[];
		$qishu=[];
		$i=0;
		foreach ($arts as $k => $v) {
			$juanlst[$i]['juan']=$v['juan'];
			$arts2=db('article')->where('juan',$v['juan'])->field('qishu')->distinct(true)->select();
			foreach ($arts2 as $key => $val) {
				$qishu[]=$val['qishu'];
			}
			sort($qishu);
			$juanlst[$i]['qishu']=$qishu;
			$qishu='';
			$years=db('article')->where('juan',$v['juan'])->field('use_time')->distinct(true)->select();
			
			foreach ($years as $key2 => $val2) {
				$year=date('Y',$val2['use_time']);
			}
			$juanlst[$i]['year']=$year;
			$i++;
			
		}
		// $juanlst=sort($juanlst);
		// dump($juanlst);die;
		$this->assign('title','过刊浏览');
		$this->assign('juanlst',$juanlst);
		return view('joulist');
	}

	public function artlist2(){//当期文章目录
		$juan=input('juan');
		$qishu=input('qishu');
		if(input('year')){
			$year=input('year');
		}else{
			$one=db('article')->where('juan',$juan)->find();
			$year=date('Y',$one['use_time']);
		}
		$artres=db('user')->alias('u')->join('article a','a.aid=u.id')->where('a.juan',$juan)->where('a.qishu',$qishu)->where('a.is_use',1)->select();
        if(!$artres){
            $qishu--;
            $artres=db('user')->alias('u')->join('article a','a.aid=u.id')->where('a.juan',$juan)->where('a.qishu',$qishu)->where('a.is_use',1)->select();
        }

        $artlst=[];
        foreach ($artres as $v) {
            $draft=db('draft')->where('id',$v['draftid'])->find();
            $v['thumb']=$draft['thumb'];
            $v['fthumb']=$draft['fthumb'];
            $artlst[]=$v;
        }
		$this->assign('artlst',$artlst);
		$this->assign('year',$year);
		$this->assign('juan',$juan);
		$this->assign('qishu',$qishu);
		return view();
	}

	public function datelist(){//当年期数目录
		return view();
	}
	
}