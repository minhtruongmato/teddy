<?php 

/**
* 
*/
class Client_gmail_model extends MY_Model{
	
	public $table = 'client_gmail';
    public function count_total_rows($keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->group_start();
        $this->db->like('email', $keyword);
        $this->db->group_end();
        $this->db->where(array('is_deleted' => 0));
        return $result = $this->db->get()->num_rows();
    }
    public function get_all_search($order = 'desc', $limit = NULL, $start = NULL, $keyword = '') {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->group_start();
        $this->db->like('email', $keyword);
        $this->db->group_end();
        $this->db->where(array('is_deleted' => 0));
        $this->db->limit($limit, $start);
        $this->db->order_by("id");
        return $result = $this->db->get()->result_array();
    }
    public function get_all() {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        return $result = $this->db->get()->result_array();
    }
}