 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
    }

     public function nav_list()
    {
        $con = 1;
        $nav = $this->common_model->get_all('nav',NULL,'*');
		$data = array(
			'nav' => $nav,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/nav_list',$data);
    }

    public function nav_add() {

        if($_POST) {
            $data = array(
              'nav_name' => $_POST['nav_name'],
              'nav_url' => $_POST['nav_url'],
              'nav_ord' => $_POST['nav_ord'],
            );
            $res = $this->common_model->add('nav',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/nav/nav_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/nav_add',$data);
    }

    public function nav_edit() {
        $nav_id = $this->uri->segment(4,1);
        $nav = $this->common_model->get_one('nav',"nav_id = $nav_id");
        if($_POST) {
            $data = array(
                'nav_name' => $_POST['nav_name'],
                'nav_url' => $_POST['nav_url'],
                'nav_ord' => $_POST['nav_ord']
            );
            $nav_id = $_POST['nav_id'];
            $res = $this->common_model->edit('nav',$data,"nav_id = $nav_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/nav/nav_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'nav' => $nav,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/nav_edit',$data);
    }

    public function nav_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('nav',"nav_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }


}