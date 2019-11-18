 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
        $this->load->helper('upload');//加载公共函数库
    }

     public function index()
    {
        $con = 1;
        $banner = $this->common_model->get_all('banner',NULL,'*');
		$data = array(
			'banner' => $banner,
			'a' => $con,
			 'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/banner_list',$data);
    }

    public function banner_add() {

        if($_POST) {
            $data = array(
              'banner_title' => $_POST['banner_title'],
              'banner_url' => $_POST['banner_url'],
              'banner_addtime' => time(),
            );
            $banner_path = upload('banner_path');
            $data['banner_path'] = $banner_path;
            $res = $this->common_model->add('banner',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/banner/index'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
             'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/banner_add',$data);
    }

    public function banner_edit() {
        $banner_id = $this->uri->segment(4,1);
        $banner = $this->common_model->get_one('banner',"banner_id = $banner_id");
        if($_POST) {
            $data = array(
              'banner_title' => $_POST['banner_title'],
              'banner_url' => $_POST['banner_url'],
              'banner_addtime' => strtotime($_POST['banner_addtime'])
            );
            $banner_path = upload('banner_path');
            $data['banner_path'] = $banner_path;
            $banner_id = $_POST['banner_id'];
            //先删除图片
            $banner = $this->common_model->get_one('banner',"banner_id = $banner_id","banner_path");
            $banner_path = $banner['banner_path'];
            $path ='./upload/'.$banner_path;
            if (!empty($banner_path) && file_exists($path)) {
                unlink($path);
            }
            $res = $this->common_model->edit('banner',$data,"banner_id = $banner_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/banner/index'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'banner' => $banner,
             'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/banner_edit',$data);
    }

    public function banner_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('banner',"banner_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }


}