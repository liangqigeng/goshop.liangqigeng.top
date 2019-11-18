<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/5
 * Time: 17:03
 */
 //商品模型
 class Cat_goods_model extends CI_Model {
    //连表查询所有商品
    public function  get_cat_goods ($limit,$con) {
        $this->db->select('*');
        $this->db->from('cat_goods');
        $this->db->order_by('cat_addtime','desc');
        $this->db->limit($limit,$con);
        $query = $this->db->get();
        return $query->result_array();
    }
 }