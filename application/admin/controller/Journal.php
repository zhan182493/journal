<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Journal extends Common
{
	public function lst(){
		$res=db('journal')->select();
		foreach ($res as $k => $v) {
			$qishu=db('article')->alias('a')->join('journal j','j.id=a.jid')->where('a.jid',$v['id'])->field('a.qishu')->Distinct(true)->select();
			foreach ($qishu as $key => $val) {
				$v['qishu'][]=$val['qishu'];
			}
			$journal[]=$v;
		}
		
		// dump($journal);die;
		$this->assign('qishu',$qishu);
		$this->assign('journal',$journal);
		return view();
	}

	public function qishulst(){
		// dump(input('jid'));die;
			$qishulst=db('article')->where('jid',input('jid'))->where('qishu',input('qishu'))->select();

		$this->assign('qishu',input('qishu'));
		$this->assign('qishulst',$qishulst);
		$this->assign('jname',input('jname'));
		return view();
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

			if(db('journal')->insert($data)){
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
			if(db('journal')->update($data)){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
		}
		return view();
	}

	public function del(){
		if(db('journal')->delete(input('id'))){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		} 
	}

}