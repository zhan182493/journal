<?php
namespace app\index\controller;
use app\index\controller\Common;
use app\index\model\Draft;
use app\index\model\User;
// use think\DB;

class Author extends Common{

	public function index(){
		if(!cookie('aid')){
			return view('Login/signin');
		}
		$uid=cookie('aid');
		$res=db('user')->where('id',$uid)->find();
		$this->assign('user',$res);
		//投稿类型选择
		$acate=db('acate')->select();
		$this->assign('acate',$acate);
		//已通过
		$pass=db('draft')->where('is_pass',1)->where('uid',$uid)->order('create_time desc')->select();
		$num_pass=count($pass);
		$this->assign('pass',$pass);
		$this->assign('num_pass',$num_pass);
		//待审核
		$nshenhe=db('acate')->alias('a')->join('draft d','a.id=d.acateid')->where('d.uid',$uid)->where('d.is_check',0)->order('d.create_time desc')->select();
		$num_nshenhe=count($nshenhe);
		$this->assign('nshenhe',$nshenhe);
		$this->assign('num_nshenhe',$num_nshenhe);
		//未通过
		$npass=db('user')->alias('u')->join('draft d','u.id=d.zjid')->where('d.is_check',1)->where('d.is_pass',0)->where('d.uid',$uid)->order('d.create_time desc')->select();
		// dump($npass);die;
		$num_npass=count($npass);
		$this->assign('npass',$npass);
		$this->assign('num_npass',$num_npass);
		$num_all=$num_pass+$num_nshenhe+$num_npass;
		$this->assign('num_all',$num_all);

		return view();
	}

	public function add(){
		if(request()->isPost()){
			$data=input('post.');
			// dump(input('post.'));die;
			if($_FILES['thumb']['tmp_name']){
				//稿件
                //获取表单上传文件
                $file=request()->file('thumb');
                $filename=input('title').'-'.input('author');
                //移动到框架应用根目录/public/uploads/fengmian目录下
                $info = $file->validate(['ext'=>'doc,pdf,wps'])->move(ROOT_PATH . 'public' . DS . '/uploads/draft',iconv("UTF-8","gb2312",$filename));
				if(!$info){
					return $this->error('稿件类型错误，请选择doc、pdf、wps类型文件！');
				}
                $data['thumb']='/uploads/draft/'.iconv("gb2312","UTF-8",$info->getSaveName());

                //附件
                if($_FILES['fthumb']['tmp_name']){
                	$file2=request()->file('fthumb');
                $filename2=input('title').'-'.input('author').'(附件)';
                $info2 = $file2->validate(['ext'=>'doc,pdf,wps'])->move(ROOT_PATH . 'public' . DS . '/uploads/draft',iconv("UTF-8","gb2312",$filename2));
                if(!$info2){
					return $this->error('附件类型错误，请选择doc、pdf、wps类型文件！');
				}
                $data['fthumb']='/uploads/draft/'.iconv("gb2312","UTF-8",$info2->getSaveName());
                }
                

			}
			// dump($data); die;
			
			unset($data['author']);
			if(db('draft')->where('title',$data['title'])->where('uid',input('uid'))->find()){
				return $this->error('该稿件已存在！若想重投，请先删除已投稿件！');
			}
			$data['zjid']=$this->getzjid($data['acateid']);
			$draft=new Draft;
			if($draft->save($data)){
				return $this->success('投稿成功！');
			}else{
				return $this->error('投稿失败！');
			}
		}
	}

	public function getzjid($acateid){
		$user=db('user')->where('acateid',$acateid)->select();
		$arr=[];
		// dump($user);die;
		if($user){
			foreach ($user as $v) {
				$zid=$v['id'];
				$num=db('draft')->where('zjid',$v['id'])->count();
				if($num){
					$arr[$zid]=$num;
				}else{
					$arr[$zid]=0;
				}
			}
		}
		// dump($arr);
		$a=100000000;
		foreach ($arr as $k => $v) {
			if($v<=$a){
				$zjid=$k;
				$a=$v;
			}
		}
		// dump($zjid);die;
		return $zjid;
	}

	public function del(){
		if(db('draft')->delete(input('id'))){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		} 
	}

	public function edit(){
		if(request()->isPost()){
			$data=input('post.');
			$data['pwd']=MD5("zxcv".$data['pwd']);
			$find=db('user')->where('id',$data['id'])->find();
			if($data['men']){
				$data['sex']=1;
				unset($data['men']);
			}else{
				$data['sex']=2;
				unset($data['women']);
			}
			$user=new User;
			if($user->update($data)){
				if($data['pwd']==$find['pwd']){
					return $this->success('修改成功','index');
				}else{
					cookie('aid',null);
					return $this->success('修改成功,请重新登录','Login/signin');
				}
			}else{
				return $this->error('修改失败');
			}

		}
	}
}