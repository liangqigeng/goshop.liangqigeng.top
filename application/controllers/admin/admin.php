 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
    }

     public function admin_list()
    {
        $con = 1;
        $admin = $this->common_model->get_all('admin',NULL,'*');
		$data = array(
			'admin' => $admin,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/admin_list',$data);
    }

    public function admin_add() {

        if($_POST) {
            $data = array(
              'admin_name' => $_POST['admin_name'],
              'admin_pwd' => md5($_POST['admin_pwd']),
              'admin_addtime' => time(),
              'admin_lasttime' => time(),
            );
            $res = $this->common_model->add('admin',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/admin/admin_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/admin_add',$data);
    }

    public function admin_edit() {
        $admin_id = $this->uri->segment(4,1);
        $admin = $this->common_model->get_one('admin',"admin_id = $admin_id");
        if($_POST) {
            $data = array(
              'admin_name' => $_POST['admin_name'],
              'admin_pwd' => $_POST['admin_pwd'],
              'admin_addtime' => strtotime($_POST['admin_addtime']),
              'admin_lasttime' => strtotime($_POST['admin_lasttime']),
            );
            $admin_id = $_POST['admin_id'];
            $res = $this->common_model->edit('admin',$data,"admin_id = $admin_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/admin/admin_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin' => $admin,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/admin_edit',$data);
    }

    public function admin_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('admin',"admin_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }


}