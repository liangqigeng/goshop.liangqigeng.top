 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
    }

     public function link_list()
    {
        $con = 1;
        $link = $this->common_model->get_all('link',NULL,'*');
		$data = array(
			'link' => $link,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/link_list',$data);
    }

    public function link_add() {
        if($_POST) {
            $data = array(
              'link_name' => $_POST['link_name'],
              'link_path' => $_POST['link_path'],
              'link_ord' => $_POST['link_ord'],
              'link_addtime' => time(),
            );
            $res = $this->common_model->add('link',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/link/link_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/link_add',$data);
    }

    public function link_edit() {
        $link_id = $this->uri->segment(4,1);
        $link = $this->common_model->get_one('link',"link_id = $link_id");
        if($_POST) {
            $data = array(
              'link_name' => $_POST['link_name'],
              'link_path' => $_POST['link_path'],
              'link_ord' => $_POST['link_ord'],
              'link_addtime' => strtotime($_POST['link_addtime']),
            );
            $link_id = $_POST['link_id'];
            $res = $this->common_model->edit('link',$data,"link_id = $link_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/link/link_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'link' => $link,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/link_edit',$data);
    }

    public function link_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('link',"link_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }


}