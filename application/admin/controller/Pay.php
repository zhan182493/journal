<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Pay extends Common
{
	public function lst(){
		$draftlst=db('draft')->where('is_pass',1)->paginate(5)->each(function($v){
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
            });
		// dump($draftlst);die;
		$this->assign('draftlst',$draftlst);
		return view();
	}


	public function pay(){
		if(db('draft')->where('id',input('id'))->update(['is_pay'=>1])){
			return $this->success('支付成功！','Pay/lst');
		}else{
			return $this->error('支付失败！','Pay/lst');
		}
	}

	public function npay(){
		if(db('draft')->where('id',input('id'))->update(['is_pay'=>0])){
			return $this->success('取消成功！','Pay/lst');
		}else{
			return $this->error('取消失败！','Pay/lst');
		}
	}
	
}