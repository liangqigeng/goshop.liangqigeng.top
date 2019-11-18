<?php
    //分页辅助函数
    function page ($base_url,$total_rows,$per_page,$uri_segment = 4,$num_links = 2) {
    //在函数里面调用类需要这样写，$CI就是对象
    $CI =& get_instance();
    //加载分页类
    $CI->load->library('pagination');
    //配置分页三个参数
    $config['base_url'] = $base_url;//当前页面的url包含参数
    $config['total_rows'] = $total_rows;//总数数据
    $config['per_page'] = $per_page;//每页显示的数据数
    $config['uri_segment'] = $uri_segment;//当前页参数在地址栏第几位
    $config['num_links'] = $num_links;//当前页左右两边各有多少个页码
    $config['use_page_numbers'] = TRUE;//参数变为当前页
    //配置分页的HTML标签
    //最外层标签
    $config['full_tag_open'] = '<ul>';
    $config['full_tag_close'] = '</ul>';
    //首页
    $config['first_link'] = '首页';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    //尾页
    $config['last_link'] = '尾页';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    //上一页
    $config['prev_link'] = '上一页';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
     //下一页
    $config['next_link'] = '下一页';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    //当前页
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
    //数字页
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    //加载配置
    $CI->pagination->initialize($config);
    //生成分页数据
    $str = $CI->pagination->create_links();
    return $str;
    }