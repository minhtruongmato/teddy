<?php 

/**
* 
*/
class Config_model extends MY_Model{
	
	public $table = 'config';
    public function find_name($name){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('name',$name);
        return $this->db->get()->row_array();
    }
	public function config_update($number,$name) {
        $this->db->where('name', $name);
        return $this->db->update($this->table, array('value' => $number));
    }
}