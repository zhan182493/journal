<?php
namespace app\admin\model;
use app\admin\model\Common;

class AuthRule extends Common
{
	public function ruleTree(){
		$ruleres=$this->select();
		return $this->sort($ruleres);
	}

	public function sort($data,$pid=0,$level=0){
		static $arr=[];
		foreach ($data as $k => $v) {
			if($v['pid']==$pid){
				$v['level']=$level;
				$v['dataid']=$this->getparentid($v['id']);
				$arr[]=$v;
				$this->sort($data,$v['id'],$level+1);
			}
		}
		return $arr;
	}

	public function getChildrenid($id){
		static $sonid=[];
		$data=$this->select();
		foreach ($data as $k => $v) {
			if($v['pid']==$id){
				$sonid[]=$v['id'];
				$this->getChildrenid($v['id']);
			}
		}
		return $sonid;
	}

	public function getparentid($authRuleId){
		$AuthRuleRes=$this->select();
		return $this->_getparentid($AuthRuleRes,$authRuleId,True);
	}

	public function _getparentid($AuthRuleRes,$authRuleId,$clear=False){
		static $arr=array();
		if($clear){
			$arr=array();
		}
		foreach ($AuthRuleRes as $k => $v) {
			if($v['id']==$authRuleId){
				$arr[]=$v['id'];
				$this->_getparentid($AuthRuleRes,$v['pid']);
			}
		}
		
		asort($arr);
		// dump($arr);die;
		
		return implode('-',$arr);
	}
}