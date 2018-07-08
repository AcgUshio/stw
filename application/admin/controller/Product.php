<?php
/**
 * @Author: Sensune  <sensume@163.com> 
 * @Date: 2018-06-08 10:46:40 
 * @Last Modified by: Sensune
 * @Last Modified time: 2018-06-19 10:11:48
 */

namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use think\Request;

class Product extends Base
{
    /**
     * 产品列表
     */
    public function index()
    {
        $data = Db::table('product')->select();
        $this->assign('data',$data);
        //var_dump($data);die;
        return $this->fetch();
    }


    
    /**
     * 产品添加
     */
    public function product_add()
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
                    $re = Db::table('product')->insert($_POST);
                    if ($re) {
                        $this->success('添加成功','admin/product/index');
                    }else{
                        $this->error('添加失败');
                    }
                    
                }else{
                    echo $file->getError(); 
                }
            }else{
            	$re2 = Db::table('product')->insert($_POST);
                if ($re2)
                {
                    $this->success('添加成功','admin/product/index');
                }else{
                    $this->error("添加成功");
                }
            }
        }
        return $this->fetch();
    }

    /**
     * 产品修改
     */
    public function product_edit()
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
                    $re = Db::table('product')->where('id',input('param.id'))->update($_POST);
                    if ($re)
                    {
                        $this->success('修改成功','admin/product/index');
                    }else{
                        $this->error('修改失败');
                    }
                }else{
                    echo $file->getError(); 
                }
            }else{

                $re = Db::table('product')->where('id',input('param.id'))->update($_POST);
                if ($re)
                    {
                        $this->success('修改成功','admin/product/index');
                    }else{
                        $this->error('修改失败');
                    }
            }
        }
        $id = input('param.id');
        $detail = Db::table('product')->find($id);
        $this->assign('detail',$detail);
        return $this->fetch();
    }
    
    /**
     * 产品删除
     */
    public function product_del($id)
    {
    	if ($id) {
            $re = Db::table('product')->delete($id);
            if ($re) {
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }

    }


}
