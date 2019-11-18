 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
    }

     public function tag_list()
    {
        $con = 1;
        $tag = $this->common_model->get_all('tag',NULL,'*');
		$data = array(
			'tag' => $tag,
			'a' => $con,
			'admin_name' => $this->admin_name,
		);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/tag_list',$data);
    }

    public function tag_add() {

        if($_POST) {
            $data = array(
              'tag_name' => $_POST['tag_name'],
              'goo_id' => $_POST['goo_id'],
              'tag_addtime' => time()
            );
            $res = $this->common_model->add('tag',$data);
            if ($res) {
                show_msg('添加成功！',site_url('admin/tag/tag_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/tag_add',$data);
    }

    public function tag_edit() {
        $tag_id = $this->uri->segment(4,1);
        $tag = $this->common_model->get_one('tag',"tag_id = $tag_id");
        if($_POST) {
            $data = array(
               'tag_name' => $_POST['tag_name'],
               'goo_id' => $_POST['goo_id'],
               'tag_addtime' =>  strtotime($_POST['tag_addtime'])
            );
            $tag_id = $_POST['tag_id'];
            $res = $this->common_model->edit('tag',$data,"tag_id = $tag_id");
            if ($res) {
                show_msg('编辑成功！',site_url('admin/tag/tag_list'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $data = array(
            'tag' => $tag,
            'admin_name' => $this->admin_name,
        );
        $this->load->view('admin/header',$data);
        $this->load->view('admin/tag_edit',$data);
    }

    public function tag_del() {
        $id = $_GET['id'];
        $res = $this->common_model->del('tag',"tag_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo $this->db->last_query();die;
        }
    }


}