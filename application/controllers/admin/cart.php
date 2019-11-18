 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
    }

     public function cart_list()
    {
        $con = 1;
        $cart = $this->common_model->get_all('cart',NULL,'*');
		$data = array(
			'cart' => $cart,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/cart_list',$data);
    }

    public function cart_add() {

        if($_POST) {
            $data = array(
              'goo_id' => $_POST['goo_id'],
              'cart_addtime' => time(),
            );
            $res = $this->common_model->add('cart',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/cart/cart_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/cart_add',$data);
    }

    public function cart_edit() {
        $cart_id = $this->uri->segment(4,1);
        $cart = $this->common_model->get_one('cart',"cart_id = $cart_id");
        if($_POST) {
            $data = array(
              'goo_id' => $_POST['goo_id'],
              'cart_addtime' => strtotime($_POST['cart_addtime']),
            );
            $cart_id = $_POST['cart_id'];
            $res = $this->common_model->edit('cart',$data,"cart_id = $cart_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/cart/cart_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'cart' => $cart,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/cart_edit',$data);
    }

    public function cart_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('cart',"cart_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }


}