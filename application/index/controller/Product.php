<?php
namespace app\index\controller;

use app\index\controller\Base;
use think\Controller;
use think\Db;
use think\Request;

class Product extends base
{
    public function index($page=1)
    {
        $p = input("p/d",'0');  
        $where = array();
        (!empty(input('param.classify')))?($where['classify'] = input('param.classify')):null;
        if (Request::instance()->isAjax())
        {
            
            //$_POST = unserialize($_POST);
            (!empty(input('param.classify')))?($where['classify'] = input('param.classify')):null;
            
            
                
            
            if(isset($_POST['iava']))(($_POST['iava'] != '全部') && ($_POST['iava'] !== ''))?($where['iava'] = $_POST['iava']):null;
            if(isset($_POST['ifa']))(($_POST['ifa'] != '全部') && ($_POST['ifa'] !== ''))?($where['ifa'] = $_POST['ifa']):null;
            if(isset($_POST['ifsma']))(($_POST['ifsma'] != '全部') &&($_POST['ifsma'] !== ''))?($where['ifsma'] = $_POST['ifsma']):null;
            if(isset($_POST['ira'])) (($_POST['ira'] != '全部') &&($_POST['ira'] !== ''))?($where['ira'] = $_POST['ira']):null;
            if(isset($_POST['size']))(($_POST['size'] != '全部') &&($_POST['size'] !== ''))?($where['size'] = $_POST['size']):null;
            if(isset($_POST['vfv']))(($_POST['vfv'] != '全部') &&($_POST['vfv'] !== ''))?($where['vfv'] = $_POST['vfv']):null;
            if(isset($_POST['vrrm']))(($_POST['vrrm'] != '全部') && ($_POST['vrrm'] !== ''))?($where['vrrm'] = $_POST['vrrm']):null;
            

            //$dates = Db::name('product')->where($where)->paginate(25);
            //$this->assign('datas', $dates);
            

        }
        $count = Db::query("select count(id) as id from product");
        $count = $count[0]['id'];
        //return json($where);
        //$data = Db::name('product')->where($where)->paginate(25);
        $data = Db::name('product')->where($where)->paginate(25,false,['page'=>$page,'path'=>"javascript:AjaxDetailsPage([PAGE]);"]);
        

       
        $fie_vrrm = Db::name('product')->Distinct(true)->where($where)->field('vrrm')->select();
        $fie_iava = Db::name('product')->Distinct(true)->where($where)->field('iava')->select();
        $fie_ifsma = Db::name('product')->Distinct(true)->where($where)->field('ifsma')->select();
        $fie_vfv = Db::name('product')->Distinct(true)->where($where)->field('vfv')->select();
        $fie_ifa = Db::name('product')->Distinct(true)->where($where)->field('ifa')->select();
        $fie_ira = Db::name('product')->Distinct(true)->where($where)->field('ira')->select();
        $fie_size = Db::name('product')->Distinct(true)->where($where)->field('size')->select();
        $fie_vrrm = array_column($fie_vrrm, 'vrrm');sort($fie_vrrm);
        $fie_iava = array_column($fie_iava, 'iava');sort($fie_iava);
        $fie_ifsma = array_column($fie_ifsma, 'ifsma');sort($fie_ifsma);
        $fie_vfv = array_column($fie_vfv, 'vfv');sort($fie_vfv);
        $fie_ifa = array_column($fie_ifa, 'ifa');sort($fie_ifa);
        $fie_ira = array_column($fie_ira, 'ira');sort($fie_ira);
        $fie_size = array_column($fie_size, 'size');sort($fie_size);
        $this->assign('list', $data);
        $this->assign('fie_vrrm', $fie_vrrm);
        $this->assign('fie_iava',$fie_iava);
        $this->assign('fie_ifsma',$fie_ifsma);
        $this->assign('fie_vfv',$fie_vfv);
        $this->assign('fie_ifa',$fie_ifa);
        $this->assign('fie_ira',$fie_ira);
        $this->assign('fie_size',$fie_size);
        $this->assign('classify',input('param.classify'));
        
        //var_dump(input('param.classify'));
         return $this->fetch();
    }


    public function index_m($page=1)
    {
        $p = input("p/d",'0');  
        $where = array();
        (!empty(input('param.classify')))?($where['classify'] = input('param.classify')):null;
        if (Request::instance()->isAjax())
        {

            (!empty(input('param.classify')))?($where['classify'] = input('param.classify')):null;
  
            if(isset($_POST['iava']))(($_POST['iava'] != '全部') && ($_POST['iava'] !== ''))?($where['iava'] = $_POST['iava']):null;
            if(isset($_POST['ifa']))(($_POST['ifa'] != '全部') && ($_POST['ifa'] !== ''))?($where['ifa'] = $_POST['ifa']):null;
            if(isset($_POST['ifsma']))(($_POST['ifsma'] != '全部') &&($_POST['ifsma'] !== ''))?($where['ifsma'] = $_POST['ifsma']):null;
            if(isset($_POST['ira'])) (($_POST['ira'] != '全部') &&($_POST['ira'] !== ''))?($where['ira'] = $_POST['ira']):null;
            if(isset($_POST['size']))(($_POST['size'] != '全部') &&($_POST['size'] !== ''))?($where['size'] = $_POST['size']):null;
            if(isset($_POST['vfv']))(($_POST['vfv'] != '全部') &&($_POST['vfv'] !== ''))?($where['vfv'] = $_POST['vfv']):null;
            if(isset($_POST['vrrm']))(($_POST['vrrm'] != '全部') && ($_POST['vrrm'] !== ''))?($where['vrrm'] = $_POST['vrrm']):null;
            

        }
        $count = Db::query("select count(id) as id from product");
        $count = $count[0]['id'];
        //return json($where);
        //$data = Db::name('product')->where($where)->paginate(25);
        $data = Db::name('product')->where($where)->paginate(25,false,['page'=>$page,'path'=>"javascript:AjaxDetailsPage([PAGE]);"]);
       
        $fie_vrrm = Db::name('product')->Distinct(true)->where($where)->field('vrrm')->select();
        $fie_iava = Db::name('product')->Distinct(true)->where($where)->field('iava')->select();
        $fie_ifsma = Db::name('product')->Distinct(true)->where($where)->field('ifsma')->select();
        $fie_vfv = Db::name('product')->Distinct(true)->where($where)->field('vfv')->select();
        $fie_ifa = Db::name('product')->Distinct(true)->where($where)->field('ifa')->select();
        $fie_ira = Db::name('product')->Distinct(true)->where($where)->field('ira')->select();
        $fie_size = Db::name('product')->Distinct(true)->where($where)->field('size')->select();
        

        $fie_vrrm = array_column($fie_vrrm, 'vrrm');sort($fie_vrrm);
        $fie_iava = array_column($fie_iava, 'iava');sort($fie_iava);
        $fie_ifsma = array_column($fie_ifsma, 'ifsma');sort($fie_ifsma);
        $fie_vfv = array_column($fie_vfv, 'vfv');sort($fie_vfv);
        $fie_ifa = array_column($fie_ifa, 'ifa');sort($fie_ifa);
        $fie_ira = array_column($fie_ira, 'ira');sort($fie_ira);
        $fie_size = array_column($fie_size, 'size');sort($fie_size);
        $this->assign('list', $data);
        $this->assign('fie_vrrm', $fie_vrrm);
        $this->assign('fie_iava',$fie_iava);
        $this->assign('fie_ifsma',$fie_ifsma);
        $this->assign('fie_vfv',$fie_vfv);
        $this->assign('fie_ifa',$fie_ifa);
        $this->assign('fie_ira',$fie_ira);
        $this->assign('fie_size',$fie_size);
        $this->assign('classify',input('param.classify'));
        
        
        //var_dump(input('param.classify'));
         return $this->fetch();
    }


}
