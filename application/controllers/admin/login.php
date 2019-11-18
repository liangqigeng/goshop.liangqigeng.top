<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
        $this->load->helper('cookie');//加载cookie方法

    }
    public function  log() {
        if ($_POST) {
            $admin_name = $this->input->post('admin_name');
            $admin_password = md5($this->input->post('admin_password'));
            $admin = $this->common_model->get_one('admin',"admin_name = '$admin_name' AND admin_password = '$admin_password'");
            if ($admin) {
                //设置cookie
                $this->input->set_cookie('admin_name',$admin['admin_name'],60*60*24);
                //设置session
                //config/config.php227行$config['encryption_key'] = '123456';
                //config/autoload.php55行
                //$autoload['libraries'] = array('database','session');
                $data = array(
                    'is_login' =>1,
                );
                $this->session->set_userdata($data);
                show_msg('登录成功',site_url('admin/shop/index'));
            } else {
                show_msg('数据有误，请重试...');
            }
        }
        $this->load->view('admin/login');
    }
    //退出
    public function logout () {
        delete_cookie('admin_name');
        $data = array(
            'is_logout' =>'',
        );
        $this->session->unset_userdata($data);
        show_msg('退出成功',site_url('admin/login/log'));
    }
}