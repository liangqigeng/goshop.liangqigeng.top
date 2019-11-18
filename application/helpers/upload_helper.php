<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/5
 * Time: 10:46
 */
 //上传辅助函数
 //参数$input_name.input框name值
 function upload($input_name,$upload='./upload/'){

     //在函数里面调用类需要这样写，$CI就是对象
     $CI = &get_instance();
     $config['upload_path'] = $upload;//储存路径
     $config['allowed_types'] = "png|gif|jpg";//允许上传类型
     $pre = pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION);
     $file_name = date('YmdHis', time()) . mt_rand(1000, 9999) . mt_rand(1000, 9999) . '.' . $pre;
     $config['file_name'] = $file_name;//保留图片名
     $config['max_size'] = 1048576;//允许上传最大值
     $CI->load->library('upload', $config);
     if ($CI->upload->do_upload($input_name)) {//成功
         $data = $CI->upload->data();
//         p($data);die;
         return $data['file_name'];//返回上传之后的图片名称
     } else {
         return $CI->upload->display_errors();
     }
 }