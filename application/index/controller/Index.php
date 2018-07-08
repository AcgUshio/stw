<?php
namespace app\index\controller;

use app\index\controller\Base;
use think\Controller;
use think\Db;


class Index extends base
{
    public function index()
    {
        $banner = Db::name('banner')->select();
        $news = Db::name('news')->select();
        $product = Db::name('product')->select();
        $this->assign('banner',$banner);
        $this->assign('news',$news);
        $this->assign('product',$product);
        return $this->fetch();
    }

    public function index_mo()
    {
        $banner = Db::name('banner')->select();
        $news = Db::name('news')->select();
        $product = Db::name('product')->select();
        $this->assign('banner',$banner);
        $this->assign('news',$news);
        $this->assign('product',$product);
        return $this->fetch();
    }

    public function chanlang()
    {
        $lang = input('lang');

        switch($lang)
        {
            case 'en':
                cookie('think_var','en-us');
                break;
            case 'zh':
                cookie('think_var','zh-cn');
                break;
            default:
                break;
        }

        echo json_encode(array('status'=>1));
    }
}
