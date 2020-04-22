<?php
namespace app\admin\controller;
use think\Controller;

class Common extends Controller
{
	public function _initialize(){
 		// dump(cookie('uid'));die;
		if(!cookie('uid')||!cookie('rid')){
			return $this->error('请先登录！','Login/login');
		}
		//权限判断
		$controller=request()->controller();
		$action=request()->action();
		$actions=['fun','search','search1','getjuan','getqishu','clear_all','deldir','artlst','chakan','delson','index'];
		if(!in_array($action,$actions)){
			$rule=$controller."/".$action;
			$ruleid=db('auth_rule')->where('cname',$rule)->find();
			// dump($ruleid);die;
			$role=db('auth_group')->where('id',cookie('rid'))->find();
			$ruleids=explode(",",$role['rules']);
			// dump($ruleid['id']);
			// dump($role['rules']);die;
			if(!in_array($ruleid['id'],$ruleids)){
				return $this->error('没有权限！');
			}
		}
		
		$res=db('user')->where('id',cookie('uid'))->find();
		$name=$res['name'];
		$this->assign('name',$name);
	}
	
}