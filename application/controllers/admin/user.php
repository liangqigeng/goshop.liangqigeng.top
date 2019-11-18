 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
        $this->load->helper('upload');//加载公共函数库
    }

     public function user_list()
    {
        $con = 1;
        $user = $this->common_model->get_all('user',NULL,'*');
		$data = array(
			'user' => $user,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/user_list',$data);
    }

    public function user_add() {

        if($_POST) {

            $data = array(
              'user_name' => $_POST['user_name'],
              'user_pwd' => md5($_POST['user_name']),
              'user_email' => $_POST['user_email'],
              'user_sex' => $_POST['user_sex'],
              'user_content' => $_POST['user_content'],
              'user_nickname' => $_POST['user_nickname'],
              'user_job' => $_POST['user_job'],
              'user_company' => $_POST['user_company'],
              'user_address' => $_POST['user_address'],
              'user_location' => $_POST['user_location'],
              'user_addtime' => time(),
              'user_lasttime' => time(),
            );
            $user_photo = upload('user_photo');
            $data['user_photo'] = $user_photo;
            $res = $this->common_model->add('user',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/user/user_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/user_add',$data);
    }

    public function user_edit() {
        $user_id = $this->uri->segment(4,1);
        $user = $this->common_model->get_one('user',"user_id = $user_id");
        if($_POST) {
            $data = array(
              'user_name' => $_POST['user_name'],
              'user_pwd' => md5($_POST['user_pwd']),
              'user_email' => $_POST['user_email'],
              'user_sex' => $_POST['user_sex'],
              'user_content' => $_POST['user_content'],
              'user_nickname' => $_POST['user_nickname'],
              'user_job' => $_POST['user_job'],
              'user_company' => $_POST['user_company'],
              'user_address' => $_POST['user_address'],
              'user_location' => $_POST['user_location'],
              'user_addtime' =>  strtotime($_POST['user_addtime']),
              'user_lasttime' => strtotime($_POST['user_lasttime']),
            );
            $user_id = $_POST['user_id'];
            $user_photo = upload('user_photo');
            $data['user_photo'] = $user_photo;
            //先删除图片
            $user = $this->common_model->get_one('user',"user_id = $user_id","user_photo");
            $user_path = $user['user_photo'];
            $path ='./upload/'.$user_path;
            if (!empty($banner_path) && file_exists($path)) {
                unlink($path);
            }
            $res = $this->common_model->edit('user',$data,"user_id = $user_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/user/user_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'user' => $user,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/user_edit',$data);
    }

    public function user_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('user',"user_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }


}