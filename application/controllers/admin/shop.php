 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->model('goods_model');//加载模型
        $this->load->model('cat_goods_model');//加载模型
        $this->load->helper('function');//加载公共函数库
        $this->load->helper('page');//加载公共函数库
        $this->load->helper('upload');//加载公共函数库
    }

    public function index()
    {
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/index');
    }

     public function cat_goods_list()
    {
        //分页
		$base_url = site_url("admin/shop/cat_goods_list");//当前页的地址，从index.php之后开始写
		$count = $this->common_model->get_count('cat_goods');
//		p($count);die;
		$limit = 5;
		$current = $this->uri->segment(4,1);
		$con = ($current-1)*$limit;
        $cat_goods = $this->cat_goods_model->get_cat_goods($limit,$con);
        //调用分页函数
		$page = page($base_url,$count,$limit);
		$data = array(
			'cat_goods' => $cat_goods,
			'page' => $page,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/cat_goods_list',$data);
    }

        public function cat_goods_add() {

        if($_POST) {
            $data = array(
              'cat_name' => $_POST['cat_name'],
              'parent_id' => $_POST['parent_id'],
              'cat_addtime' => time(),
              'cat_ord' => $_POST['cat_ord'],
            );
            $res = $this->common_model->add('cat_goods',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/shop/cat_goods_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
             'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/cat_goods_add',$data);
    }

    public function cat_goods_edit() {
        $cat_id = $this->uri->segment(4,1);
        $cat_goods = $this->common_model->get_one('cat_goods',"cat_id = $cat_id");
        if($_POST) {
            $data = array(
              'cat_name' => $_POST['cat_name'],
              'parent_id' => $_POST['parent_id'],
              'cat_addtime' => time(),
              'cat_ord' => $_POST['cat_ord'],
            );
            $cat_id = $_POST['cat_id'];
            $res = $this->common_model->edit('cat_goods',$data,"cat_id = $cat_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/shop/cat_goods_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'cat_goods' => $cat_goods,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/cat_goods_edit',$data);
    }

    public function cat_goods_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('cat_goods',"cat_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }

     public function goods_list()
    {
        //分页
		$base_url = site_url("admin/shop/goods_list");//当前页的地址，从index.php之后开始写
		$count = $this->common_model->get_count('goods');
//		p($count);die;
		$limit = 5;
		$current = $this->uri->segment(4,1);
		$con = ($current-1)*$limit;
        $goods = $this->goods_model->get_goods($limit,$con);
//        p($goods);die;
        //调用分页函数
		$page = page($base_url,$count,$limit);
		$data = array(
			'goods' => $goods,
			'page' => $page,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/goods_list',$data);
    }

        public function goods_add() {

        if($_POST) {
            $data = array(
              'goo_name' => $_POST['goo_name'],
              'goo_info' => $_POST['goo_info'],
              'goo_size' => $_POST['goo_size'],
              'goo_style' => $_POST['goo_style'],
              'goo_material' => $_POST['goo_price'],
              'goo_price' => $_POST['goo_price'],
              'goo_addtime' => $_POST['goo_addtime'],
              'goo_ord' => $_POST['goo_ord'],
              'is_show' => $_POST['is_show'],
              'cat_id' => $_POST['cat_id'],
            );
            $goo_img = upload('goo_img');
            $data['goo_img'] = $goo_img;
            $res = $this->common_model->add('goods',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/shop/goods_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/goods_add',$data);
    }

    public function goods_edit() {
        $goo_id = $this->uri->segment(4,1);
        $goods = $this->common_model->get_one('goods',"goo_id = $goo_id");
        if($_POST) {
            $data = array(
              'goo_name' => $_POST['goo_name'],
              'goo_info' => $_POST['goo_info'],
              'goo_size' => $_POST['goo_size'],
              'goo_style' => $_POST['goo_style'],
              'goo_material' => $_POST['goo_price'],
              'goo_price' => $_POST['goo_price'],
              'goo_addtime' => $_POST['goo_addtime'],
              'goo_ord' => $_POST['goo_ord'],
              'is_show' => $_POST['is_show'],
              'cat_id' => $_POST['cat_id'],
            );

            $goo_id = $_POST['goo_id'];
            //先删除图片
            $user = $this->common_model->get_one('goods',"goo_id = $goo_id","goo_img");
            $user_path = $user['goo_img'];
            $path ='./upload/'.$user_path;
            if (!empty($banner_path) && file_exists($path)) {
                unlink($path);
            }
            $goo_img = upload('goo_img');
            $data['goo_img'] = $goo_img;
            $res = $this->common_model->edit('goods',$data,"goo_id = $goo_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/shop/goods_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'goods' => $goods,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/goods_edit',$data);
    }

    public function goods_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('goods',"cat_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }
	
	 public function config_edit() {
        $logo = $this->common_model->get_one('config',"con_title = 'LOGO'");
        $phone = $this->common_model->get_one('config',"con_title = '热线电话'");
        $icp = $this->common_model->get_one('config',"con_title = '备案号'");
        if($_POST) {
            //先删除图片
            $photo = $this->common_model->get_one('config',"con_title='LOGO'");
            $user_path = $photo['con_value'];
            $path ='./upload/'.$user_path;
            if (!empty($banner_path) && file_exists($path)) {
                unlink($path);
            }
            $photo = upload('photo');
            $data1['con_value'] = $photo;
            $res1 = $this->common_model->edit('config',$data1,"con_title='LOGO'");
            $data2 = array(
                 'con_value' => $_POST['phone']
            );
            $res2 = $this->common_model->edit('config',$data2,"con_title='热线电话'");
            $data3 = array(
                 'con_value' => $_POST['icp']
            );
            $res3 = $this->common_model->edit('config',$data3,"con_title='备案号'");
            if ($res1||$res2||$res3) {
                show_msg('编辑成功！',site_url('admin/shop/config_edit'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'logo' => $logo,
            'phone' => $phone,
            'icp' => $icp,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/config_edit',$data);
    }
}