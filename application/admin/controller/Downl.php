<?php
/**
 * @Author: Sensune  <sensume@163.com> 
 * @Date: 2018-06-08 10:46:40 
 * @Last Modified by: Sensune
 * @Last Modified time: 2018-06-12 14:39:20
 */
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use think\Request;

class Downl extends Base
{
    /**
     * 文件列表
     */
    public function index()
    {
        $data = Db::table('downl')->select();
        $this->assign('data',$data);
        return $this->fetch();
    }


    /**
     * 文件添加
     */
    public function downl_add()
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
                    Db::table('downl')->insert($_POST);
                    $this->success('添加成功','admin/downl/index');
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
     * 文件修改
     */
    public function downl_edit()
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
                    $re = Db::table('downl')->where('id',input('param.id'))->update($_POST);
                    if ($re)
                    {
                        $this->success('修改成功','admin/downl/index');
                    }else{
                        $this->error('修改失败');
                    }
                }else{
                    echo $file->getError(); 
                }
            }else{

                $re = Db::table('downl')->where('id',input('param.id'))->update($_POST);
                if ($re)
                    {
                        $this->success('修改成功','admin/downl/index');
                    }else{
                        $this->error('修改失败');
                    }
            }
        }
        $id = input('param.id');
        $detail = Db::table('downl')->find($id);
        $this->assign('detail',$detail);
        return $this->fetch();
    }
    
    /**
     * 文件删除
     */
    public function downl_del($id)
    {
    	if ($id) {
            $re = Db::table('downl')->delete($id);
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
