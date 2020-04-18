<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Article as ArtModel;


class Article extends Common
{
	public function fun1($v){
		if($v['aid']){
			$author=db('user')->where('id',$v['aid'])->find();
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
		
		return $v;
	}

	public function lst(){

		$journal=db('journal')->select();
		$article=db('article')->alias('a')->join('acate ac','ac.id=a.acateid')->join('journal j','j.id=a.jid')->field('a.*,j.title,ac.acatename')->order('a.id asc')->paginate(8)->each(function($v){return $this->fun1($v);});
		// dump($article);die;
		$this->assign('article',$article);
		$this->assign('journal',$journal);
		
		return view();
	}

	public function add(){
		// dump(input('qishu'));die;
		if(input('qishu')){
			$this->assign('qishu',input('qishu'));
			$this->assign('jname',input('jname'));
			$this->assign('juan',input('juan'));
		}
		$acate=db('acate')->select();
		$journal=db('journal')->select();
		if(request()->isPost()){
			$data=input('post.');
			// dump($data);die;
			$draft=db('draft')->where('id',$data['draftid'])->find();
			$data['aid']=$draft['uid'];
			$data['acateid']=$draft['acateid'];
			//卷
			$joures=db('journal')->where('id',$data['jid'])->find();
			//创刊年
			$year=date('Y',$joures['create_time']);
			//当前年
			$year2=date('Y',time());
			$data['juan']=$year2-$year+1;
			// dump($data['juan']);die;
			$article=new ArtModel;
			$res=$article->save($data);
			if($res){
				return $this->success('添加成功！','lst');
			}else{
				return $this->error('添加失败！');
			}
		}
		
		// dump($journal);die;
		$draft=db('draft')->where('is_pay',1)->where('is_use',0)->select();
		$this->assign('draft',$draft);
		$this->assign('acate',$acate);
		$this->assign('journal',$journal);
		return view();
	}

	public function edit(){
		$journal=db('journal')->select();
		$acate=db('acate')->select();
		$article=db('article')->where('id',input('id'))->find();
		// dump($article);die;
		if(request()->isPost()){
			$data=input('post.');
			// dump($data);die;
			$article=new ArtModel;
			$res=$article->update($data);
			if($res){
				return $this->success('修改成功！','lst');
			}else{
				return $this->error('修改失败！');
			}
		}
		$draft=db('draft')->where('is_pay',1)->where('is_use',0)->select();
		$this->assign('draft',$draft);
		$this->assign('acate',$acate);
		$this->assign('article',$article);
		$this->assign('journal',$journal);
		return view();
	}

	public function del(){
		if(db('article')->delete(input('id'))){
			return json(['code'=>1,'msg'=>'删除成功!']);
		}else{
			return json(['code'=>2,'msg'=>'删除失败!']);
		} 
	}

	public function search(){
		$journal=db('journal')->select();
		$this->assign('journal',$journal);
		$all=db('article')->alias('a')->join('acate ac','ac.id=a.acateid')->join('journal j','j.id=a.jid')->field('a.*,j.title,ac.acatename')->order('a.id asc')->paginate(8)->each(function($v){return $this->fun1($v);});
		if(input('search')){
			$user=db('user')->where('name','like','%'.input('search').'%')->select();
			if($user){
				$aids=[];
				foreach ($user as $k => $v) {
					array_push($aids,$v['id']);
				}
				$article=db('article')
				->alias('a')
				->join('acate ac','ac.id=a.acateid')
				->join('journal j','j.id=a.jid')
				->where('atitle','like','%'.input('search').'%')
				->whereOr('aid','in',$aids)
				->field('a.*,j.title,ac.acatename')
				->order('a.id asc')
				->paginate(8)
				->each(function($v){return $this->fun1($v);});
			}else{
				$article=db('article')
				->alias('a')
				->join('acate ac','ac.id=a.acateid')
				->join('journal j','j.id=a.jid')
				->where('atitle','like','%'.input('search').'%')
				->field('a.*,j.title,ac.acatename')
				->order('a.id asc')
				->paginate(8)
				->each(function($v){return $this->fun1($v);});
			}
			// dump($article);die;
			$this->assign('article',$article);
			$this->assign('search',input('search'));
			return view();
		}else{
			$article=$all;
			// dump($article);die;
			$this->assign('article',$article);
			$this->assign('jid',0);
			$this->assign('qishu',0);
			return view();
		}
	}

	public function search1(){
		$journal=db('journal')->select();
		$this->assign('journal',$journal);

		if(!input('jid')==0){
			if(input('qishu')){
				$article=db('article')
				->alias('a')
				->join('acate ac','ac.id=a.acateid')
				->join('journal j','j.id=a.jid')
				->where('a.jid',input('jid'))
				->where('qishu',input('qishu'))
				->field('a.*,j.title,ac.acatename')
				->order('a.id asc')
				->paginate(8)
				->each(function($v){return $this->fun1($v);});
				$this->assign('article',$article);
				$this->assign('jid',input('jid'));
				$this->assign('qishu',input('qishu'));
				return view('search');
			}else{
				$article=db('article')
				->alias('a')
				->join('acate ac','ac.id=a.acateid')
				->join('journal j','j.id=a.jid')
				->where('a.jid','in',input('jid'))
				->field('a.*,j.title,ac.acatename')
				->order('a.id asc')
				->paginate(8)
				->each(function($v){return $this->fun1($v);});
				$this->assign('article',$article);
				$this->assign('jid',input('jid'));
				$this->assign('qishu',input('qishu'));
				return view('search');
			}
		}else{
			return $this->error('请选择期刊！');
		}
	}

}