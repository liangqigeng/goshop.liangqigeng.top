<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/5
 * Time: 17:03
 */
 //商品模型
 class Goods_model extends CI_Model {
    //连表查询所有商品
    public function  get_goods ($limit,$con) {
        $this->db->select('*');
        $this->db->from('goods');
        $this->db->join('cat_goods','goods.cat_id = cat_goods.cat_id');
        $this->db->limit($limit,$con);
        $query = $this->db->get();
        return $query->result_array();
    }
 }