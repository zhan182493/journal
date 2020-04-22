<?php
namespace app\index\controller;
use app\index\controller\Common;
use app\index\model\User;

class Reviewers extends Common{

	public function fun($v){
		if(db('user')->where('id',$v['uid'])->find()){
			$author=db('user')->where('id',$v['uid'])->find();
			$v['author']=$author['name'];
			$v['tel']=$author['tel'];
			$v['email']=$author['email'];
			$v['edu']=$author['edu'];
			$v['profession']=$author['profession'];
			$v['position']=$author['position'];
			$v['direction']=$author['direction'];
		}else{
			$v['author']='无';
			$v['tel']='无';
			$v['email']='无';
			$v['edu']='无';
			$v['profession']='无';
			$v['position']='无';
			$v['direction']='无';
		}
		return $v;
	}


	public function index(){
		if(!cookie('zjid')){
			return view('Login/signin');
		}
		$zjid=cookie('zjid');
		$res=db('acate')->alias('a')->join('user u','a.id=u.acateid')->where('u.id',$zjid)->field('u.*,a.acatename')->find();
		// dump($res);die;
		$this->assign('user',$res);
		//已通过
		$pass=db('draft')->where('zjid',$zjid)->where('is_pass',1)->where('acateid',$res['acateid'])->order('create_time desc')->paginate(2,false,['var_page' => 'p1'])->each(function($v){return $this->fun($v);});

		$num_pass=count(db('draft')->where('zjid',$zjid)->where('is_pass',1)->where('acateid',$res['acateid'])->order('create_time desc')->select());
		// dump($pass);die;
		$this->assign('pass',$pass);
		$this->assign('num_pass',$num_pass);

		//待审核
		$nshenhe=db('acate')->alias('a')->join('draft d','a.id=d.acateid')->where('d.zjid',$zjid)->where('d.is_check',0)->where('d.acateid',$res['acateid'])->order('d.create_time desc')->paginate(2,false,['var_page' => 'p2'])->each(function($v){return $this->fun($v);});
		$num_nshenhe=count(db('acate')->alias('a')->join('draft d','a.id=d.acateid')->where('d.zjid',$zjid)->where('d.is_check',0)->where('d.acateid',$res['acateid'])->order('d.create_time desc')->select());
		// dump($nshenhe);die;
		$this->assign('nshenhe',$nshenhe);
		$this->assign('num_nshenhe',$num_nshenhe);
		
		//未通过
		$npass=db('user')->alias('u')->join('draft d','u.id=d.zjid')->where('d.zjid',$zjid)->where('d.is_check',1)->where('d.is_pass',0)->where('d.acateid',$res['acateid'])->order('d.create_time desc')->paginate(2,false,['var_page' => 'p3'])->each(function($v){return $this->fun($v);});
		// dump($npass);die;
		$num_npass=count(db('user')->alias('u')->join('draft d','u.id=d.zjid')->where('d.zjid',$zjid)->where('d.is_check',1)->where('d.is_pass',0)->where('d.acateid',$res['acateid'])->order('d.create_time desc')->select());
		$this->assign('npass',$npass);
		$this->assign('num_npass',$num_npass);
		$num_all=$num_pass+$num_nshenhe+$num_npass;
		$this->assign('num_all',$num_all);

		return view();
	}

	public function review(){
		$data=input('post.');
		if(!isset($data['is_pass'])){
			$data['is_pass']=0;
		}
		$data['is_check']=1;
		if(db('draft')->update($data)){
			return $this->success("提交成功！");
		}else{
			return $this->error("提交失败！");
		}
	}

	public function edit(){
		if(request()->isPost()){
			$data=input('post.');
			$data['pwd']=MD5("zxcv".$data['pwd']);
			$find=db('user')->where('id',$data['id'])->find();
			$user=new User;
			if($user->update($data)){
				if($data['pwd']==$find['pwd']){
					return $this->success('修改成功','index');
				}else{
					cookie('uid',null);
					return $this->success('修改成功,请重新登录','Login/signin');
				}
			}else{
				return $this->error('修改失败');
			}
		}
	}
}