<?php
/**
 * @Author: Sensune  <sensume@163.com> 
 * @Date: 2018-06-08 10:46:40 
 * @Last Modified by: Sensune
 * @Last Modified time: 2018-06-11 15:23:15
 */

namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use think\Request;

class Infoma extends Base
{
    /**
     * 网站信息列表
     */
    public function index()
    {
        if (Request::instance()->isPost()) 
        {
            $re = Db::name('infoma')->where('id','1')->update($_POST);
            if ($re) {
                $this->success("修改成功");
            }else{
                $this->success("修改失败");
            }
        }
        $data = Db::table('infoma')->find();
        $this->assign('detail',$data);
        return $this->fetch();
    }




}
