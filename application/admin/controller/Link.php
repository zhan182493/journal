<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Link extends Common
{
	public function lst(){
		$linklst=db('link')->select();
		$this->assign('linklst',$linklst);
		return view();
	}

	public function add(){
		if(request()->isPost()){
			$data=input('post.');
			//图片上传
			if($_FILES['pic']['tmp_name']){
                //获取表单上传文件
                $file=request()->file('pic');
                //移动到框架应用根目录/public/uploads/fengmian目录下
               $info = $file->move(ROOT_PATH . 'public' . DS . '/uploads/linkpic');
                // dump($info); die;
                $data['pic']='/uploads/linkpic/'.$info->getSaveName();
                // dump($data); die;
            }
           
			if(db('link')->insert($data)){
				return $this->success('添加成功！','lst');
			}else{
				return $this->error('添加失败！');
			}
		}
		return view();
	}

	public function edit(){
		$link=db('link')->where('id',input('id'))->find();
		if(request()->isPost()){
			$data=input('post.');
			if($_FILES['pic']['tmp_name']){
                //删除原来的图
                $path=ROOT_PATH.'public'.$link['pic'];
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
			if(db('link')->update($data)!==false){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
		}
		$this->assign('link',$link);
		return view();
	}

	public function del(){
		if(db('link')->delete(input('id'))){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		} 
	}
}