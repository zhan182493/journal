<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Login extends Common
{
	public function login(){
		return view();
	}

	public function logout(){
		return view('login');
	}

	public function logcheck(){
		return view('index/index');
	}
}