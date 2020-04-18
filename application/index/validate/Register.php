<?php
namespace app\index\validate;
use think\Validate;

class Register extends Validate
{
    protected $rule = [
        'uname'  =>  'require|min:4|max:16|alphaDash',
        'name'  =>  'chs|min:2|max:10',
        'password'  =>  'require|min:6',
        'age'  =>   'number|max:3',
        'tel'  =>   ['regex'=>'^1[3456789]\d{9}$'],
        'email' =>  'email',
        'idnum'  =>  ['regex'=>'(^\d{18}$)|(^\d{17}(\d|X|x)$)'],
        'address'  =>  '^[a-zA-Z0-9\x80-\xff]+$',
        'nowaddress'  =>  '^[a-zA-Z0-9\x80-\xff]+$',
        'edu'  =>  '^[a-zA-Z0-9\x80-\xff]+$',
        'profession'  =>  '^[a-zA-Z0-9\x80-\xff]+$',
        'company'  =>  '^[a-zA-Z0-9\x80-\xff]+$',
        'position'  =>  '^[a-zA-Z0-9\x80-\xff]+$',
        'direction'  =>  '^[a-zA-Z0-9\x80-\xff]+$',
        'question'  =>  '^[\x80-\xff_a-zA-Z0-9]+$',
        'answer'  =>  '^[\x80-\xff_a-zA-Z0-9]+$',
        
    ];

    
}
