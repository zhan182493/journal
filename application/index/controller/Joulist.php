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
			
			$juanlst[$i]['qishu']=$qishu;
			$qishu='';
			$years=db('article')->where('juan',$v['juan'])->field('use_time')->distinct(true)->select();
			
			foreach ($years as $key2 => $val2) {
				$year=date('Y',$val2['use_time']);
			}
			$juanlst[$i]['year']=$year;
			$i++;
			
		}
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
		$artlst=db('article')->where('juan',$juan)->where('qishu',$qishu)->select();
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