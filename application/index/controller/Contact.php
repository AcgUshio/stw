<?php
namespace app\index\controller;

use app\index\controller\Base;
use think\Controller;
use think\Db;

class Contact extends base
{
    public function index()
    {
        return $this->fetch();
    }


    public function index_m()
    {
        return $this->fetch();
    }
    


}
