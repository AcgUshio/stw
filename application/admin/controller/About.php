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

class About extends Base
{
    /**
     * 新闻列表
     */
    public function index()
    {
        $data = Db::table('about')->select();
        $this->assign('data',$data);
        return $this->fetch();
    }

    /**
     * 新闻添加
     */
    public function about_add()
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
                    $_POST['time']= date("Y-m-d H:i:s",time());
                    Db::table('about')->insert($_POST);
                    $this->success('添加成功','admin/about/index');
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
     * 新闻修改
     */
    public function about_edit()
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
                    $re = Db::table('about')->where('id',input('param.id'))->update($_POST);
                    if ($re)
                    {
                        $this->success('修改成功','admin/about/index');
                    }else{
                        $this->error('修改失败');
                    }
                }else{
                    echo $file->getError(); 
                }
            }else{

                $re = Db::table('about')->where('id',input('param.id'))->update($_POST);
                if ($re)
                    {
                        $this->success('修改成功','admin/about/index');
                    }else{
                        $this->error('修改失败');
                    }
            }
        }
        $id = input('param.id');
        $detail = Db::table('about')->find($id);
        $this->assign('detail',$detail);
        return $this->fetch();
    }
    
    /**
     * 新闻删除
     */
    public function about_del($id)
    {
    	if ($id) {
            $re = Db::table('about')->delete($id);
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
