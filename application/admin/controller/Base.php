<?php  
namespace app\admin\controller;  
  
use think\Controller;  
use think\Request;
use think\Db;
  
class Base  extends Controller  
{
    public function _initialize()
    {
        $request = Request::instance();
		if (!session('admin_id')) {
			//return $this->redirect("admin/Index/login"); 
			return $this->redirect('admin/Login/index');
		}   
    }
}