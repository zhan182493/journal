<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Index extends Common
{
	public function index(){
		$journal=db('journal')->alias('j')->join('user u','u.id=j.uid')->find();
		//动态总数
		$num_news=count(db('news')->select());
		//链接总数
		$num_link=count(db('link')->select());
		//公告总数
		$num_notice=count(db('notice')->select());
		//文章总数
		$num_article=count(db('article')->select());
		//稿件总数
		$num_draft=count(db('draft')->select());
		//待审核稿件总数
		$num_check=count(db('draft')->where('is_check',0)->select());
		//已通过稿件总数
		$num_pass=count(db('draft')->where('is_pass',1)->select());
		//待支付稿件总数
		$num_pay=count(db('draft')->where('is_pay',0)->select());
		//已发布稿件总数
		$num_use=count(db('draft')->where('is_use',1)->select());
		$this->assign('journal',$journal);
		$this->assign('num_news',$num_news);
		$this->assign('num_link',$num_link);
		$this->assign('num_notice',$num_notice);
		$this->assign('num_article',$num_article);
		$this->assign('num_draft',$num_draft);
		$this->assign('num_check',$num_check);
		$this->assign('num_pass',$num_pass);
		$this->assign('num_pay',$num_pay);
		$this->assign('num_use',$num_use);
		return view();
	}


	function clear_all() {
		$path = RUNTIME_PATH;
		//如果是目录则继续
		if (!is_dir($path)) {
			return json(['code'=>2,'msg'=>'清除缓存失败！']);
		}
		//扫描一个文件夹内的所有文件夹和文件并返回数组
		$p = scandir($path);
		$arr = ['cache', 'log', 'temp'];
		foreach ($p as $val) {
			//排除目录
			if (!in_array($val, $arr)) {
				continue;
			}
			if (!is_dir($path . $val)) {
				continue;
			}
			//如果是目录则递归子目录，继续操作
			//子目录中操作删除文件夹和文件
			$this->deldir($path . $val . '/');
			//目录清空后删除空文件夹
			@rmdir($path . $val . '/');
		}
		return json(['code'=>1,'msg'=>'清除缓存成功！']);
	}
	
	function deldir($dir) {
		//先删除目录下的文件：
		$dh = opendir($dir);
		while ($file = readdir($dh)) {
			if ($file != "." && $file != "..") {
				$fullpath = $dir . "/" . $file;
				if (!is_dir($fullpath)) {
					@unlink($fullpath);
				} else {
					$this->deldir($fullpath);
				}
			}
		}
		closedir($dh);
		//删除当前文件夹：
		if (rmdir($dir)) {
			return true;
		} else {
			return false;
		}
	}

}