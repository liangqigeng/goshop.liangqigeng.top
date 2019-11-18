 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Likes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
    }

     public function likes_list()
    {
        $con = 1;
        $likes = $this->common_model->get_all('likes',NULL,'*');
		$data = array(
			'likes' => $likes,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/likes_list',$data);
    }

    public function likes_add() {

        if($_POST) {
            $data = array(
              'goo_id' => $_POST['goo_id'],
              'likes_addtime' => time(),
            );
            $res = $this->common_model->add('likes',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/likes/likes_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/likes_add',$data);
    }

    public function likes_edit() {
        $likes_id = $this->uri->segment(4,1);
        $likes = $this->common_model->get_one('likes',"likes_id = $likes_id");
        if($_POST) {
            $data = array(
              'goo_id' => $_POST['goo_id'],
              'likes_addtime' => strtotime($_POST['likes_addtime']),
            );
            $likes_id = $_POST['likes_id'];
            $res = $this->common_model->edit('likes',$data,"likes_id = $likes_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/likes/likes_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'likes' => $likes,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/likes_edit',$data);
    }

    public function likes_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('likes',"likes_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }


}