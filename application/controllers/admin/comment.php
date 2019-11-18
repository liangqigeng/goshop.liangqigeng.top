 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
    }

     public function comment_list()
    {
        $con = 1;
        $comment = $this->common_model->get_all('comment',NULL,'*');
		$data = array(
			'comment' => $comment,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/comment_list',$data);
    }

    public function comment_add() {

        if($_POST) {
            $data = array(
              'user_id' => $_POST['user_id'],
              'goo_id' => $_POST['goo_id'],
              'com_content' => $_POST['com_content'],
              'com_email' => $_POST['com_email']
            );
            $res = $this->common_model->add('comment',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/comment/comment_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/comment_add',$data);
    }

    public function comment_edit() {
        $com_id = $this->uri->segment(4,1);
        $comment = $this->common_model->get_one('comment',"com_id = $com_id");
        if($_POST) {
            $data = array(
                'user_id' => $_POST['user_id'],
                'goo_id' => $_POST['goo_id'],
                'com_content' => $_POST['com_content'],
                'com_email' => $_POST['com_email']
            );
            $com_id = $_POST['com_id'];
            $res = $this->common_model->edit('comment',$data,"com_id = $com_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/comment/comment_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'comment' => $comment,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/comment_edit',$data);
    }

    public function comment_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('comment',"comment_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }


}