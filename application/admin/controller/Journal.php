<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Journal as JouModel;

class Journal extends Common
{
	public function lst(){
		$res=db('journal')->select();
		if(!$res){
			$this->assign('journal',0);
		return view();
		}
		foreach ($res as $k => $v) {
			$juan=db('article')->alias('a')->join('journal j','j.id=a.jid')->where('a.jid',$v['id'])->field('a.juan')->Distinct(true)->order('a.juan asc')->select();//关键词 DISTINCT 用于返回唯一不同的值
			// dump($juan);die;
			if($juan){
				foreach ($juan as $key => $val) {
					$v['juan'][]=$val['juan'];
				}
				$journal[]=$v;
			}else{
				$v['juan'][]='';
				$journal[]=$v;
			}
			
		}
		
		// dump($journal);die;
		// $this->assign('qishu',$qishu);
		$this->assign('journal',$journal);
		return view();
	}

	public function juanlst(){
		if(input('jid')){
			// dump(input('juan'));die;
			$jid=input('jid');
			$juan=input('juan');
			$jname=input('jname');
			$artlst=db('article')->where('jid',$jid)->where('juan',$juan)->where('qishu',1)->select();
			$qishures=db('article')->where('jid',$jid)->where('juan',$juan)->field('qishu')->Distinct(true)->order('qishu asc')->select();
			$qishulst=[];
			foreach ($qishures as $k => $v) {
				$qishulst[]=$v;
				// dump($qishulst);die;
			}
			$fabu=db('article')->where('jid',$jid)->where('juan',$juan)->where('qishu',1)->field('is_use')->find();
			$juanlst=db('article')->alias('a')->join('journal j','j.id=a.jid')->field('a.juan')->Distinct(true)->order('a.juan asc')->select();//关键词 DISTINCT 用于返回唯一不同的值
			$this->assign('fabu',$fabu['is_use']);
			$this->assign('juan',$juan);
			$this->assign('artlst',$artlst);
			$this->assign('qishulst',$qishulst);
			$this->assign('juanlst',$juanlst);
			$this->assign('jname',$jname);
			$this->assign('jid',$jid);
			$this->assign('qishu',1);
			return view();
		}
		$juanlst=db('article')->alias('a')->join('journal j','j.id=a.jid')->field('a.juan')->Distinct(true)->order('a.juan asc')->select();//关键词 DISTINCT 用于返回唯一不同的值
		// dump($juanlst);die;
		$juan=1;
		$jres=db('journal')->find();
		$jname=$jres['title'];
		$jid=$jres['id'];
		$artlst=db('article')->where('jid',$jid)->where('juan',$juan)->where('qishu',1)->select();
		// dump($artlst);die;
		$qishures=db('article')->where('jid',$jid)->where('juan',$juan)->field('qishu')->Distinct(true)->order('qishu asc')->select();
		$qishulst=[];
		foreach ($qishures as $k => $v) {
			$qishulst[]=$v;
			// dump($qishulst);die;
		}
		$fabu=db('article')->where('jid',$jid)->where('juan',$juan)->where('qishu',1)->field('is_use')->find();
		// dump($juanlst);die;
		$this->assign('fabu',$fabu['is_use']);
		$this->assign('juan',$juan);
		$this->assign('artlst',$artlst);
		$this->assign('qishulst',$qishulst);
		$this->assign('juanlst',$juanlst);
		$this->assign('jname',$jname);
		$this->assign('jid',$jid);
		$this->assign('qishu',1);
		return view();
	}

	public function artlst(){
		if(request()->isPost()){
			// dump(input('post.'));die;
			$jid=input('jid');
			$juan=input('juan');
			$jname=input('jname');
			$qishu=input('qishu');
			// dump($qishu);die;
			$artlst=db('article')->where('jid',$jid)->where('juan',$juan)->where('qishu',$qishu)->select();
			$qishures=db('article')->where('jid',$jid)->where('juan',$juan)->field('qishu')->Distinct(true)->order('qishu asc')->select();
			$qishulst=[];
			foreach ($qishures as $k => $v) {
				$qishulst[]=$v;
				// dump($qishulst);die;
			}
			$fabu=db('article')->where('jid',$jid)->where('juan',$juan)->where('qishu',$qishu)->field('is_use')->find();
			$juanlst=db('article')->alias('a')->join('journal j','j.id=a.jid')->field('a.juan')->Distinct(true)->order('a.juan asc')->select();//关键词 DISTINCT 用于返回唯一不同的值
			$this->assign('fabu',$fabu['is_use']);
			$this->assign('juan',$juan);
			$this->assign('artlst',$artlst);
			$this->assign('qishulst',$qishulst);
			$this->assign('juanlst',$juanlst);
			$this->assign('jname',$jname);
			$this->assign('jid',$jid);
			$this->assign('qishu',input('qishu'));
			return view('juanlst');
		}
	}

	public function qishufabu(){
		$ids = trim($_POST['ids']);
		$ids=json_decode($ids);
		$ids = implode(",", $ids);
		$time=time();
		$article=db('article')->where('id','in',$ids)->select();
		$draftid='0';
		foreach ($article as $v) {
			$draftid=$draftid.",".$v['draftid'];
		}
		// return json(['code'=>1,'msg'=>$ids]);
		if(db('article')->where('id','in',$ids)->update(['is_use'=>1,'use_time'=>$time])){
			if(db('draft')->where('id','in',$draftid)->update(['is_use'=>1,'use_time'=>$time])){
				return json(['code'=>1,'msg'=>'发布成功！']);
			}else{
				return json(['code'=>2,'msg'=>'发布失败！']);
			}
		}else{
			return json(['code'=>2,'msg'=>'发布失败！']);
		}
	}	

	public function quxiaofabu(){
		$ids = trim($_POST['ids']);
		$ids=json_decode($ids);
		$ids = implode(",", $ids);
		$article=db('article')->where('id','in',$ids)->select();
		$draftid='0';
		foreach ($article as $v) {
			$draftid=$draftid.",".$v['draftid'];
		}
		// return json(['code'=>1,'msg'=>$ids]);
		if(db('article')->where('id','in',$ids)->update(['is_use'=>0,'use_time'=>0])){
			if(db('draft')->where('id','in',$draftid)->update(['is_use'=>0,'use_time'=>0])){
				return json(['code'=>1,'msg'=>'已取消！']);
			}else{
				return json(['code'=>2,'msg'=>'取消失败！']);
			}
		}else{
			return json(['code'=>2,'msg'=>'取消失败！']);
		}
	}


	public function add(){
		$zhubian=db('auth_group_access')
		->alias('ac')
		->join('auth_group r','ac.group_id=r.id')
		->join('user u','ac.uid=u.id')
		->where('role','主编')
		->select();
		// dump($zhubian);die;
		$this->assign('zhubian',$zhubian);
		if(request()->isPost()){
			$data=input('post.');
			//图片上传
			if($_FILES['pic']['tmp_name']){
                //获取表单上传文件
                $file=request()->file('pic');
                //移动到框架应用根目录/public/uploads/fengmian目录下
               $info = $file->move(ROOT_PATH . 'public' . DS . '/uploads/fengmian');
                // dump($info); die;
                $data['pic']='/uploads/fengmian/'.$info->getSaveName();
                // dump($data); die;
            }
            $journal=new JouModel;
			if($journal->save($data)){
				return $this->success('创建成功！','lst');
			}else{
				return $this->error('创建失败！');
			}
		}
		return view();
	}

	public function edit(){
		$journal=db('journal')->where('id',input('id'))->find();
		$this->assign('journal',$journal);
		if(request()->isPost()){
			$data=input('post.');

			if($_FILES['pic']['tmp_name']){
                //删除原来的图
                $path=ROOT_PATH.'public'.$journal['pic'];
                // dump($path); die;
                @unlink($path);
                // dump(@unlink($path)); die;
                // echo SITE_URL.'/public/'.$article['pic'];
                // die;
                //获取表单上传文件
                 $file=request()->file('pic');
                //移动到框架应用根目录/public/uploads/目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . '/uploads/fengmian');
                // dump($info);die;
                // dump($info); die;
                $data['pic']='/uploads/fengmian/'.$info->getSaveName();
                // dump($data); die;
            }
            $journal=new JouModel;
			if($journal->update($data)){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
		}
		return view();
	}

	// public function del(){
	// 	if(db('journal')->delete(input('id'))){
	// 		return json(['code'=>1,'msg'=>'删除成功!']);
	// 	}else{
	// 		return json(['code'=>2,'msg'=>'删除失败!']);
	// 	} 
	// }

}