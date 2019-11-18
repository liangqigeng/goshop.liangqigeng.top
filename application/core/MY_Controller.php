<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //当前文件目录 \blog\application\core
        $this->load->model('common_model');//加载模型
        $this->load->helper('function');//加载公共函数库
        $this->load->helper('cookie');//加载cookie方法
        //接收cookie
        $is_login = $this->session->userdata('is_login');
        if (!$is_login || $is_login!=1) {
            show_msg('请先登录',site_url('admin/login/log'));
        } else {
            //接收cookie
            $this->admin_name = $this->input->cookie('admin_name');
        }
    }
}