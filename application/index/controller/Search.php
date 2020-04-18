<?php
namespace app\index\controller;
use app\index\controller\Common;
use think\Db;

class Search extends Common
{
	public function search(){
		$arts=db('article')->field('juan')->distinct(true)->select();
		$years=db('article')->field('use_time')->distinct(true)->select();
		// dump($years);die;
		$juanlst=[];
		$i=0;
		foreach ($arts as $k => $v) {
			$juanlst[$i]['juan']=$v['juan'];
			$years=db('article')->where('juan',$v['juan'])->field('use_time')->distinct(true)->select();
			
			foreach ($years as $key2 => $val2) {
				$year=date('Y',$val2['use_time']);
			}
			$juanlst[$i]['year']=$year;
			$i++;
		}
		// dump($juanlst);die;
		$acatelst=db('acate')->select();
		if(request()->isPost()){
			$data=input('post.');
			$atitle=$data['atitle'];
			$author=$data['author'];
			if($author!=''){
				$user=db('user')->where("name","like","%".$author."%")->select();
				// dump(Db::getLastSql());
				// dump($user);die;
				if($user){
					$aids=[];
					foreach ($user as $v) {
						$aids[]=$v['id'];
					}
					$aid=implode(',',$aids);
				}
			}else{
				$aid='';
			}
			if($data['acateid']!=0){
				$acateid=$data['acateid'];
			}else{
				$acateid="";
			}
			if($data['juan']!=0){
				$juan=$data['juan'];
			}else{
				$juan="";
			}
			if($data['qishu']!=0){
				$qishu=$data['qishu'];
			}else{
				$qishu="";
			}
			if($aid!=''){
				$sql="select * from article where (atitle like '%".$atitle."%' or '%".$atitle."%'='') and  (aid in (".$aid.") or '".$aid."'='') and  (acateid='".$acateid."' or '".$acateid."'='') and (juan='".$juan."' or '".$juan."'='') and (qishu='".$qishu."' or '".$qishu."'='') order by use_time asc";
			}else{
				$sql="select * from article where (atitle like '%".$atitle."%' or '%".$atitle."%'='') and  (acateid='".$acateid."' or '".$acateid."'='') and (juan='".$juan."' or '".$juan."'='') and (qishu='".$qishu."' or '".$qishu."'='') order by use_time asc";
			}
			
			// $sql="select * from article where atitle like '%人工%'";
			// dump($sql);die;
			$artres = Db::query($sql);
			// dump(Db::getLastSql());
			$artlst=[];
			foreach ($artres as $v) {
				$user=db('user')->where('id',$v['aid'])->find();
				$v['name']=$user['name'];
				$draft=db('draft')->where('id',$v['draftid'])->find();
				$v['thumb']=$draft['thumb'];
				$v['fthumb']=$draft['fthumb'];
				$acate=db('acate')->where('id',$v['acateid'])->find();
				$v['acatename']=$acate['acatename'];
				$artlst[]=$v;
			}
			// dump(Db::getLastSql());
			// dump($artlst);die;
			$this->assign('acatelst',$acatelst);
			$this->assign('juanlst',$juanlst);
			$this->assign('artlst',$artlst);
			return view();
		}
		$this->assign('acatelst',$acatelst);
		$this->assign('juanlst',$juanlst);
		$this->assign('artlst','');
		return view();
	}

	public function getqishu(){
		$arts=db('article')->where('juan',input('juan'))->field('qishu')->distinct(true)->select();
		$qishu=[];
		if($arts){
			foreach ($arts as $key => $v) {
				$qishu[]=$v['qishu'];
			}
			return json(['code'=>1,'msg'=>$qishu]);
		}else{
			$qishu='';
			return json(['code'=>2,'msg'=>$qishu]);
		}
	}
}