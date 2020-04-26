<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class User extends Common
{
	public function lst(){
		// dump(input('id'));
		$rolelst=db('auth_group')->select();
		$this->assign('rolelst',$rolelst);
		if(request()->isPost()){
			// dump(input('rid'));die;
			$roleid=input('rid');
			$user=db('auth_group_access')->alias('ra')->join('user u','ra.uid=u.id')->join('auth_group r','r.id=ra.group_id')->where('group_id',$roleid)->paginate(10)->each(function($v){
				if($v['acateid']){
					$acate=db('acate')->where('id',$v['acateid'])->find();
					if($acate){
						$v['acatename']=$acate['acatename'];
					}else{
						$v['acatename']='';
					}
				}
				return $v;
			});
			// dump($user);die;
			if(!$user){
				dump($user);die;
				$this->assign('role',input('role'));
				$this->assign('user','');
				return view();
			}

			$this->assign('role',input('role'));
			$this->assign('user',$user);
			return view();
		}

		$user=db('user')->paginate(10)->each(function($v){
			$role_access=db('auth_group_access')->where('uid',$v['id'])->find();
			$v['rid']=$role_access['group_id'];
			$role=db('auth_group')->where('id',$v['rid'])->find();
			$v['role']=$role['role'];
			if($v['acateid']){
				$acate=db('acate')->where('id',$v['acateid'])->find();
				if($acate){
					$v['acatename']=$acate['acatename'];
				}else{
					$v['acatename']='';
				}
			}
			return $v;
		});
		// dump($user);die;
		$this->assign('role','全部');
		$this->assign('user',$user);
		
		return view();
	}

	public function add(){
		$role=input('role');
		// dump($role);die;
		$acate=db('acate')->select();
		if(request()->isPost()){
			// dump($_POST);die;
			$data=$_POST;
			if(db('user')->where('uname',$data['uname'])->find()){
				return $this->error('用户名已存在！');
			}
			$id=db('auth_group')->where('role',$data['role'])->field('id')->find();
			$rid=$id['id'];
			unset($data['role']);
			// dump($rid);die;
			if(!$data['pwd']==$data['rpwd']){
				return $this->error('两次密码不一致！');
			}
			unset($data['rpwd']);
			if(!$role=='专家'){
				$data['acateid']=0;
			}
			$pwd="zxcv".$data['pwd'];
			$data['pwd']=MD5($pwd);
			// dump($data);die;
			$uid=db('user')->insertGetid($data);
			// dump($uid);die;
			if($uid){
				if(db('auth_group_access')->insert(['uid'=>$uid,'group_id'=>$rid])){
					// dump(111);die;
					return $this->success('添加成功！','lst');
				}else{
					return $this->error('添加失败');
				}
			}else{
				return $this->error('添加失败');
			}
		}
		$this->assign('role',$role);
		$this->assign('acate',$acate);
		return view();
	}

	public function edit(){
		// dump(input('uid'));die;
		$uid=input('uid');
		$res=db('auth_group_access')->where('uid',$uid)->find();
		$rid=$res['group_id'];
		$acate=db('acate')->select();
		$user=db('user')->find($uid);
		$zhuanjia=db('acate')->alias('a')->join('user u','u.acateid=a.id')->where('u.id',$uid)->find();
		// dump($user);die;
		if(request()->isPost()){
			$data=$_POST;
			if($data['pwd']==''){
				$data['pwd']=$user['pwd'];
			}else{
				// dump(strlen($data['pwd']));die;
				if(strlen($data['pwd'])<6){
					return $this->error('密码至少六位！');
				}
				// dump($data['rpwd']);
				if($data['pwd']!=$data['rpwd']){
					return $this->error('两次密码不一致！');
				}
			}
			unset($data['rpwd']);
			unset($data['rid']);
			unset($data['uid']);
			$pwd="zxcv".$data['pwd'];
			$data['pwd']=MD5($pwd);
			$res=db('user')->where('id',input('uid'))->update($data);
			if($res!==false){
				if(input('uid')==cookie('uid')&&$data['pwd']!=$user['pwd']){
					return $this->success('密码修改成功','login/logout');
				}
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败');
			}
			return;
		}
		// dump($role);die;
		$this->assign('user',$user);
		$this->assign('zhuanjia',$zhuanjia);
		$this->assign('rid',$rid);
		$this->assign('acate',$acate);
		return view();
	}

	public function del(){
		// dump(input('id'));die;
		//删除稿件
		$draft=db('draft')->where('uid',input('uid'))->delete();
		//删除文章
		$article=db('article')->where('aid',input('uid'))->delete();
		//删除角色对应关系
		$role_access=db('auth_group_access')->delete(input('uid'));
		//删除用户
		$user=db('user')->delete(input('uid'));
		if($draft!==false&&$article!==false&&$role_access!==false&&$user!==false){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		}
	}

	public function search(){
		//输入为中文
		if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',input('search'))) {
        	$user=db('auth_group_access')
			->alias('ra')
			->join('user u','ra.uid=u.id')
			
			->join('auth_group r','r.id=ra.group_id')
			->where('name','like','%'.input('search').'%')
			// ->where('group_id','3')
			->select();
	    } 
	    //输入为数字
	    elseif(preg_match('/^\d+$/i',input('search'))) {
	        $user=db('auth_group_access')
			->alias('ra')
			->join('user u','ra.uid=u.id')
			->join('auth_group r','r.id=ra.group_id')
			->where('tel','like','%'.input('search').'%')
			->select();
	    }else{
	    	$user=db('auth_group_access')
			->alias('ra')
			->join('user u','ra.uid=u.id')
			->join('auth_group r','r.id=ra.group_id')
			->where('uname','like','%'.input('search').'%')
			->select();
	    }
		

		//两表查询user--acate得到专家审核类型
		$acate=db('user')->alias('u')->join('acate a','u.acateid=a.id')
		->field(['a.acatename','u.acateid'])
		->select();
		// dump($user);die;
		//循环合并数组
		for ($i=0; $i < count($user); $i++) {
			for($j=0;$j<count($acate); $j++){
				if($acate[$j]['acateid']==$user[$i]['acateid']){
					$user[$i]['acatename']=$acate[$j]['acatename'];
				}
			}
		}
		// dump($role);
		// dump($user);die;
		$this->assign('user',$user);
		$this->assign('acate',$acate);
		$rolelst=db('auth_group')->select();
		$this->assign('rolelst',$rolelst);
		$this->assign('search',input('search'));
		return view();
	}
}