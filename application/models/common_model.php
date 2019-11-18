<?php
	class Common_model extends CI_Model {
		//获取多条数据
		public function get_all ($tablename,$conditions=NULL,$field="*",$limit=0,$con=0) {
			$this->db->select($field);
			if($limit) {//如果传$limit参数说明有分页的情况
				$query = $this->db->get_where($tablename,$conditions,$limit,$con);
			} else {//没有分页的情况
				$query = $this->db->get_where($tablename,$conditions);
			}
			//result_array()方法可以返回一个二维数组
			return $query->result_array();
		}
		//获取单条数据
		public function get_one ($tablename,$conditions=NULL,$field="*") {
			$this->db->select($field);
			$query=$this->db->get_where($tablename,$conditions);
			//row_array()方法可以返回一个一维数组
			return $query->row_array();
		} 
		//查询数据总数
		public function get_count ($tablename,$conditions=NULL) {
			if ($conditions) {
				$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix($tablename)." WHERE $conditions");
			} else {
				$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix($tablename));
			}
			//num_rows()可以返回查询出来资源的总数据数
			return $query->num_rows();
		}
		//添加
		public function add($tablename,$data) {
			$this->db->insert($tablename,$data);
//			echo $this->db->last_query();die;
			//insert_id()方法可以返回添加成功那条数据的主键
			return $this->db->insert_id();
		}
		//修改
		public function edit($tablename,$data,$conditions) {
			$this->db->where($conditions);
			$this->db->update($tablename,$data);
			//echo $this->db->last_query();die;
			//affected_rows()成功返回1，失败返回0
			return $this->db->affected_rows();
		}
		//删除
		public function del($tablename, $conditions) {
			$this->db->delete($tablename, $conditions);
			return $this->db->affected_rows();
		}
	}