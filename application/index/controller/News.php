<?php
namespace app\index\controller;

use app\index\controller\Base;
use think\Controller;
use think\Db;
use think\Lang;

class News extends base
{
    public function index()
    {
        //zh-cn
        (lang::range() == 'en-us')?($list = Db::name('news')->where(array('classify'=>'公司新闻','type'=>'en'))->paginate(9)):null;
        (lang::range() == 'zh-cn')?($list = Db::name('news')->where(array('classify'=>'公司新闻','type'=>'zh'))->paginate(9)):null;
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function trade()
    {
        //行业新闻
        (lang::range() == 'en-us')?($list = Db::name('news')->where(array('classify'=>'行业新闻','type'=>'en'))->paginate(9)):null;
        (lang::range() == 'zh-cn')?($list = Db::name('news')->where(array('classify'=>'行业新闻','type'=>'zh'))->paginate(9)):null;
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function lore()
    {
        //电子知识
        (lang::range() == 'en-us')?($list = Db::name('news')->where(array('classify'=>'电子知识','type'=>'en'))->paginate(9)):null;
        (lang::range() == 'zh-cn')?($list = Db::name('news')->where(array('classify'=>'电子知识','type'=>'zh'))->paginate(9)):null;
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function detail($id)
    {
        $detail = Db::name('news')->where('id',$id)->find();
        $this->assign('detail',$detail);
        return $this->fetch();
    }



    public function index_m()
    {
        //zh-cn
        (lang::range() == 'en-us')?($list = Db::name('news')->where(array('classify'=>'公司新闻','type'=>'en'))->paginate(9)):null;
        (lang::range() == 'zh-cn')?($list = Db::name('news')->where(array('classify'=>'公司新闻','type'=>'zh'))->paginate(9)):null;
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function trade_m()
    {
        //行业新闻
        (lang::range() == 'en-us')?($list = Db::name('news')->where(array('classify'=>'行业新闻','type'=>'en'))->paginate(9)):null;
        (lang::range() == 'zh-cn')?($list = Db::name('news')->where(array('classify'=>'行业新闻','type'=>'zh'))->paginate(9)):null;
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function lore_m()
    {
        //电子知识
        (lang::range() == 'en-us')?($list = Db::name('news')->where(array('classify'=>'电子知识','type'=>'en'))->paginate(9)):null;
        (lang::range() == 'zh-cn')?($list = Db::name('news')->where(array('classify'=>'电子知识','type'=>'zh'))->paginate(9)):null;
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function detail_m($id)
    {
        $detail = Db::name('news')->where('id',$id)->find();
        $this->assign('detail',$detail);
        return $this->fetch();
    }

}
