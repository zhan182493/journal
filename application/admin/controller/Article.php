<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Article as ArtModel;


class Article extends Common
{
	public function fun($v){
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
		$this->getjuan();
		
		$article=db('article')->alias('a')->join('acate ac','ac.id=a.acateid')->join('journal j','j.id=a.jid')->field('a.*,j.title,ac.acatename')->order('a.id asc')->paginate(8)->each(function($v){return $this->fun($v);});
		// dump($article);die;
		$this->assign('article',$article);
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
		$this->getjuan();
		$all=db('article')->alias('a')->join('acate ac','ac.id=a.acateid')->field('a.*,ac.acatename')->order('a.id asc')->paginate(8)->each(function($v){return $this->fun($v);});
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
				->where('a.atitle','like','%'.input('search').'%')
				->whereOr('a.aid','in',$aids)
				->field('a.*,ac.acatename')
				->order('a.id asc')
				->paginate(8)
				->each(function($v){return $this->fun($v);});
			}else{
				$article=db('article')
				->alias('a')
				->join('acate ac','ac.id=a.acateid')
				->where('a.atitle','like','%'.input('search').'%')
				->field('a.*,ac.acatename')
				->order('a.id asc')
				->paginate(8)
				->each(function($v){return $this->fun($v);});
			}
			// dump($article);die;
			$this->assign('article',$article);
			$this->assign('juan',0);
			$this->assign('qishu',0);
			$this->assign('search',input('search'));
			return view();
		}else{
			$article=$all;
			// dump($article);die;
			$this->assign('article',$article);
			$this->assign('juan',0);
			$this->assign('qishu',0);
			return view();
		}
	}

	public function search1(){
		
		$this->getjuan();
		if(!input('juan')==0){
			if(input('qishu')){
				$article=db('article')
				->alias('a')
				->join('acate ac','ac.id=a.acateid')
				->where('a.juan',input('juan'))
				->where('a.qishu',input('qishu'))
				->field('a.*,ac.acatename')
				->order('a.id asc')
				->paginate(8)
				->each(function($v){return $this->fun($v);});
				$this->assign('article',$article);
				$this->assign('juan',input('juan'));
				$this->assign('qishu',input('qishu'));
				return view('search');
			}else{
				$article=db('article')
				->alias('a')
				->join('acate ac','ac.id=a.acateid')
				->where('a.juan ',input('juan'))
				->field('a.*,ac.acatename')
				->order('a.id asc')
				->paginate(8)
				->each(function($v){return $this->fun($v);});
				$this->assign('article',$article);
				$this->assign('juan',input('juan'));
				$this->assign('qishu',input('qishu'));
				return view('search');
			}
		}else{
			return $this->error('请选择年份！');
		}
	}

	public function getjuan(){
		$arts=db('article')->field('juan')->distinct(true)->select();
		$years=db('article')->field('use_time')->distinct(true)->select();
		// dump($years);die;
		$juanlst=[];
		$i=0;
		foreach ($arts as $k => $v) {
			$juanlst[$i]['juan']=$v['juan'];
			$years=db('article')->where('juan',$v['juan'])->field('use_time')->distinct(true)->select();
			
			foreach ($years as $key2 => $val2) {
				$year=date('Y',$val2['use_time']);
			}
			$juanlst[$i]['year']=$year;
			$i++;
		}
		// dump($juanlst);die;
		return $this->assign('juanlst',$juanlst);
	}

	public function getqishu(){
		$arts=db('article')->where('juan',input('juan'))->field('qishu')->distinct(true)->select();
		$qishu=[];
		if($arts){
			foreach ($arts as $key => $v) {
				$qishu[]=$v['qishu'];
			}
			return json(['code'=>1,'msg'=>$qishu]);
		}else{
			$qishu='';
			return json(['code'=>2,'msg'=>$qishu]);
		}
	}

}