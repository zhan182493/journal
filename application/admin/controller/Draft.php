<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Draft extends Common
{
	public function fun($v){
		if($v['uid']!==''){
			$author=db('user')->where('id',$v['uid'])->find();
			if($author){
				$v['author']=$author['name'];
				$v['sex']=$author['sex'];
				$v['age']=$author['age'];
				$v['idnum']=$author['idnum'];
				$v['email']=$author['email'];
				$v['tel']=$author['tel'];
				$v['nowaddress']=$author['nowaddress'];
				$v['edu']=$author['edu'];
				$v['profession']=$author['profession'];
				$v['company']=$author['company'];
				$v['position']=$author['position'];
				$v['direction']=$author['direction'];
			}else{
				$v['author']='王老五';
				$v['sex']='男';
				$v['age']='26';
				$v['idnum']='422826199305204538';
				$v['email']='wlw@mail.com';
				$v['tel']='15502754597';
				$v['nowaddress']='重庆渝北大竹林';
				$v['edu']='重庆大学本科';
				$v['profession']='计算机科学与技术';
				$v['company']='猪八戒网络';
				$v['position']='网站策划师';
				$v['direction']='网站开发';
			}
		}
		if($v['is_check']==1){
				$zj=db('user')->where('id',$v['zjid'])->find();
				// dump($zj);die;
				$v['z_name']=$zj['name'];
				$v['z_email']=$zj['email'];
				$v['z_tel']=$zj['tel'];
		}
		
		if($v['acateid']!==0){
            $acate=db('acate')->where('id',$v['acateid'])->find();
            $v['acatename']=$acate['acatename'];
		}else{
			 $v['acatename']='默认类型';
		}
		return $v;
	}

	public function lst(){
		$draftlst=db('draft')->paginate(5)->each(function($v){return $this->fun($v);});
		// dump($draftlst);die;
		$this->assign('draftlst',$draftlst);
		return view();
	}

	public function del(){
		if(db('draft')->delete(input('id'))){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		} 
	}
	

	public function search(){
		if(input('search')){
			$user=db('user')->where('name','like','%'.input('search').'%')->select();
			if($user){
				$aids=[];
				foreach ($user as $k => $v) {
					array_push($aids,$v['id']);
				}
				$draftlst=db('draft')->where('title','like','%'.input('search').'%')->whereOr('id','in',$aids)->paginate(5)->each(function($v){return $this->fun($v);});
			}else{
				$draftlst=db('draft')->where('title','like','%'.input('search').'%')->paginate(5)->each(function($v){return $this->fun($v);});
			}
			
		// dump($draftlst);die;
		$this->assign('draftlst',$draftlst);
		$this->assign('search',input('search'));
		return view();
			
		}else{
			$draftlst=db('draft')->paginate(5)->each(function($v){return $this->fun($v);});
			// dump($draftlst);die;
			$this->assign('draftlst',$draftlst);
			$this->assign('search','');
			return view();
		}
	}

}