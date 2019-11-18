 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
    }

     public function page_list()
    {
        $con = 1;
        $page = $this->common_model->get_all('page',NULL,'*');
		$data = array(
			'page' => $page,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/page_list',$data);
    }

    public function page_add() {

        if($_POST) {
            $data = array(
              'page_name' => $_POST['page_name'],
              'page_content' => $_POST['page_content']
            );
            $res = $this->common_model->add('page',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/page/page_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/page_add',$data);
    }

    public function page_edit() {
        $page_id = $this->uri->segment(4,1);
        $page = $this->common_model->get_one('page',"page_id = $page_id");
        if($_POST) {
            $data = array(
               'page_name' => $_POST['page_name'],
               'page_content' => $_POST['page_content']
            );
            $page_id = $_POST['page_id'];
            $res = $this->common_model->edit('page',$data,"page_id = $page_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/page/page_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'page' => $page,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/page_edit',$data);
    }

    public function page_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('page',"page_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }


}