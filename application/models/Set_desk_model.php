<?php 

/**
* 
*/
class Set_desk_model extends MY_Model{
	
	public $table = 'set_desk';
    public function count_total_rows($keyword = '',$status,$date=array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->group_start();
        $this->db->like('name', $keyword)->or_like('phone', $keyword)->or_like('email', $keyword);
        $this->db->group_end();
        $this->db->where(array('is_deleted' => 0,'status' => $status));
        if(count($date) == 2){
            $this->db->where(array("DATE(time)>=" => $date[0],"DATE(time)<=" => $date[1]));
        }
        return $result = $this->db->get()->num_rows();
    }
    public function get_all_search($order = 'desc', $limit = NULL, $start = NULL, $keyword = '',$status,$date=array()) {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->group_start();
        $this->db->like('name', $keyword)->or_like('phone', $keyword)->or_like('email', $keyword);
        $this->db->group_end();
        $this->db->where(array('is_deleted' => 0,'status' => $status));
        if(count($date) == 2){
            $this->db->where(array("DATE(time)>=" => $date[0],"DATE(time)<=" => $date[1]));
        }
        $this->db->limit($limit, $start);
        $this->db->order_by("time");
        return $result = $this->db->get()->result_array();
    }
    public function get_all() {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        return $result = $this->db->get()->result_array();
    }
    public function count_total_rows1($status){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where(array('is_deleted' => 0,'status' => $status));
        return $result = $this->db->get()->num_rows();
    }
}