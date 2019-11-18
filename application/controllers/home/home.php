<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->model('goods_model');//加载模型
        $this->load->helper('function');//加载公共函数库
        $this->load->helper('page');//加载公共函数库
    }

    public function index() {
        //控制文件名必须和当前控制器名称一致
        //使用模型的方法来操作数据库
          //分页
		$base_url = site_url("home/home/index");//当前页的地址，从index.php之后开始写
		$count = $this->common_model->get_count('goods');
		$limit = 5;
		$current = $this->uri->segment(4,1);
		$con = ($current-1)*$limit;
        $nav = $this->common_model->get_all('nav');
        $logo = $this->common_model->get_one('config',"con_title = 'LOGO'");
        $phone = $this->common_model->get_one('config',"con_title = '热线电话'");
        $icp = $this->common_model->get_one('config',"con_title = '备案号'");
        $cat = $this->common_model->get_all('cat_goods','parent_id = 1','cat_name,cat_id');
        $banner = $this->common_model->get_all('banner','banner_id IN (1,3)');
        $link = $this->common_model->get_one('banner',"banner_id = 4");
        $product1 = $this->goods_model->get_goods($limit,$con);
        //调用分页函数
		$show = page($base_url,$count,$limit);
        $page = $this->common_model->get_all('page','page_id IN (1,2,3,4)');
        //$num = array(1,2);
        //$banner = $this->common_model->get_all('banner',,'cat_name,cat_id');

        $title = '首页';
        $data = array(
            'cat' => $cat,
            'nav' => $nav,
            'logo' => $logo,
            'phone' => $phone,
            'icp' => $icp,
            'title' => $title,
            'link' => $link,
            'product1' => $product1,
            'page' => $page,
            'banner' => $banner,
            'show' => $show
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/index',$data);
        $this->load->view('home/bottom',$data);
    }

    public function cart() {
        $nav = $this->common_model->get_all('nav');
        $logo = $this->common_model->get_one('config',"con_title = 'LOGO'");
        $phone = $this->common_model->get_one('config',"con_title = '热线电话'");
        $icp = $this->common_model->get_one('config',"con_title = '备案号'");
        $link = $this->common_model->get_one('banner',"banner_id = 4");
        $product = $this->common_model->get_all('goods','goo_id IN (1,3)');
        $title = '购物车';

        $data = array(
            'nav' => $nav,
            'logo' => $logo,
            'phone' => $phone,
            'icp' => $icp,
            'title' => $title,
            'link' => $link,
            'product' => $product

        );
        $this->load->view('home/header', $data);
        $this->load->view('home/cart',$data);
        $this->load->view('home/bottom',$data);
    }

    public function shop_brand() {
          //分页
		$base_url = site_url("home/home/shop_brand");//当前页的地址，从index.php之后开始写
		$count = $this->common_model->get_count('goods');
		$limit = 2;
		$current = $this->uri->segment(4,1);
		$con = ($current-1)*$limit;
        $nav = $this->common_model->get_all('nav');
        $logo = $this->common_model->get_one('config',"con_title = 'LOGO'");
        $phone = $this->common_model->get_one('config',"con_title = '热线电话'");
        $icp = $this->common_model->get_one('config',"con_title = '备案号'");
        $cat = $this->common_model->get_all('cat_goods',NULL,'cat_name,cat_id');
        $link = $this->common_model->get_one('banner',"banner_id = 4");
        $product = $this->goods_model->get_goods($limit,$con);
         //调用分页函数
		$show = page($base_url,$count,$limit);
        $page = $this->common_model->get_one('page',"page_id = 9");

        $title = '商店名牌';

        $data = array(
            'nav' => $nav,
            'logo' => $logo,
            'phone' => $phone,
            'icp' => $icp,
            'title' => $title,
            'link' => $link,
            'cat' => $cat,
            'product' => $product,
            'page' => $page,
            'show' => $show,
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/shop_brand',$data);
        $this->load->view('home/bottom',$data);
    }

    public function contact() {
        $nav = $this->common_model->get_all('nav');
        $logo = $this->common_model->get_one('config',"con_title = 'LOGO'");
        $phone = $this->common_model->get_one('config',"con_title = '热线电话'");
        $icp = $this->common_model->get_one('config',"con_title = '备案号'");
        $link = $this->common_model->get_one('banner',"banner_id = 4");
        $banner = $this->common_model->get_one('banner',"banner_id = 5");
        $page = $this->common_model->get_one('page',"page_id = 5");
        $banner2 = $this->common_model->get_all('banner',"banner_id IN(6,7,8)");
        $title = '联系';
        $data = array(
            'nav' => $nav,
            'logo' => $logo,
            'phone' => $phone,
            'icp' => $icp,
            'title' => $title,
            'link' => $link,
            'banner' => $banner,
            'page' => $page,
            'banner2' => $banner2
        );
        $this->load->view('home/header', $data);
        $this->load->view('home/contact',$data);
        $this->load->view('home/bottom',$data);
    }

}