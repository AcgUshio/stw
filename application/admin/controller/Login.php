<?php

namespace app\admin\controller;

use think\Controller;  
use think\Db;  

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function login()
    {
        $name = input('post.name');
        $pwd = input('post.pwd');
        
        if ($name == '' || $pwd == '')
        {
            $this->error('密码不能为空');
        }

        $re = Db::name('admin')->where(array('name'=>$name,'pwd'=>md5($pwd)))->find();
        
        if($re)
        {
            session('admin_id',$re['id']);
            $this->redirect('admin/Index/index');
        }else{
            $this->error('用户名或密码错误');
        }
    }
}
