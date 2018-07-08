<?php
/**
 * @Author: Sensune  <sensume@163.com> 
 * @Date: 2018-06-08 10:45:59 
 * @Last Modified by: Sensune
 * @Last Modified time: 2018-06-08 14:06:10
 */

namespace app\admin\controller;
use think\Request;
use think\Controller;
use think\Db;

class Index extends Base
{   
    
    public function index()
    {
        return $this->fetch();
    }

    
    
    /**
     * banner列表
     */
    public function banner()
    {
        $data = Db::table('banner')->select();
        $this->assign('data',$data);
        return $this->fetch();
    }

    /**
     * banner添加
     */
    public function banner_add()
    {
        if (Request::instance()->isPost())
        {
            $file = request()->file('cover');
    		if(isset($file)){  
                $info = $file->move(ROOT_PATH . 'public/uploads');  
          
                if($info){  
                        // 成功上传后 获取上传信息  
                    $a=$info->getSaveName();  
                    $imgp= str_replace("\\","/",$a);  
                    $imgpath='uploads/'.$imgp;  
                    $_POST['cover']= $imgpath;

                    Db::table('banner')->insert($_POST);
                    $this->success('添加成功','admin/Index/banner');
                }else{
                    echo $file->getError(); 
                }
            }else{
            	die('请选择一张图片');
            }
        }
        return $this->fetch();
    }

    /**
     * banner修改
     */
    public function banner_edit()
    {
        if (Request::instance()->isPost())
        {
            
            $file = request()->file('cover');
            if(isset($file)){  
                $info = $file->move(ROOT_PATH . 'public/uploads');  
          
                if($info){  
                        // 成功上传后 获取上传信息  
                    $a=$info->getSaveName();  
                    $imgp= str_replace("\\","/",$a);  
                    $imgpath='uploads/'.$imgp;  
                    $_POST['cover']= $imgpath;
                    $re = Db::table('banner')->where('id',input('param.id'))->update($_POST);
                    if ($re)
                    {
                        $this->success('修改成功','admin/Index/banner');
                    }else{
                        $this->error('修改失败');
                    }
                }else{
                    echo $file->getError(); 
                }
            }else{

                $re = Db::table('banner')->where('id',input('param.id'))->update($_POST);
                if ($re)
                    {
                        $this->success('修改成功','admin/Index/banner');
                    }else{
                        $this->error('修改失败');
                    }
            }
        }
        $id = input('param.id');
        $detail = Db::table('banner')->find($id);
        $this->assign('detail',$detail);
        return $this->fetch();
    }
    
    /**
     * banner删除
     */
    public function banner_del($id)
    {
    	if ($id) {
            $re = Db::table('banner')->delete($id);
            if ($re) {
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }

    }

    /**
     * 栏目图片
     */
    public function column()
    {
        $data = Db::table('column')->select();
        $this->assign('data',$data);
        return $this->fetch();
    }

    /**
     * 栏目图片修改
     */
    public function column_edit()
    {
        if (Request::instance()->isPost())
        {
            
            $file = request()->file('cover');
            if(isset($file)){  
                $info = $file->move(ROOT_PATH . 'public/uploads');  
          
                if($info){  
                        // 成功上传后 获取上传信息  
                    $a=$info->getSaveName();  
                    $imgp= str_replace("\\","/",$a);  
                    $imgpath='uploads/'.$imgp;  
                    $_POST['cover']= $imgpath;
                    $re = Db::table('column')->where('id',input('param.id'))->update($_POST);
                    if ($re)
                    {
                        $this->success('修改成功','admin/Index/column');
                    }else{
                        $this->error('修改失败');
                    }
                }else{
                    echo $file->getError(); 
                }
            }else{

                $re = Db::table('column')->where('id',input('param.id'))->update($_POST);
                if ($re)
                    {
                        $this->success('修改成功','admin/Index/column');
                    }else{
                        $this->error('修改失败');
                    }
            }
        }
        $id = input('param.id');
        $detail = Db::table('column')->find($id);
        $this->assign('detail',$detail);
        return $this->fetch();
    }

    /**
     * 关于我们分类图
     */
    public function summary()
    {
        $data = Db::table('summary')->select();
        $this->assign('data',$data);
        return $this->fetch();
    }


    /**
     * 关于我们图片修改
     */
    public function summary_edit()
    {
        if (Request::instance()->isPost())
        {
            
            $file = request()->file('cover');
            if(isset($file)){  
                $info = $file->move(ROOT_PATH . 'public/uploads');  
          
                if($info){  
                        // 成功上传后 获取上传信息  
                    $a=$info->getSaveName();  
                    $imgp= str_replace("\\","/",$a);  
                    $imgpath='uploads/'.$imgp;  
                    $_POST['cover']= $imgpath;
                    $re = Db::table('summary')->where('id',input('param.id'))->update($_POST);
                    if ($re)
                    {
                        $this->success('修改成功','admin/Index/summary');
                    }else{
                        $this->error('修改失败');
                    }
                }else{
                    echo $file->getError(); 
                }
            }else{

                $re = Db::table('summary')->where('id',input('param.id'))->update($_POST);
                if ($re)
                    {
                        $this->success('修改成功','admin/Index/summary');
                    }else{
                        $this->error('修改失败');
                    }
            }
        }
        $id = input('param.id');
        $detail = Db::table('summary')->find($id);
        $this->assign('detail',$detail);
        return $this->fetch();
    }

    

    
}
