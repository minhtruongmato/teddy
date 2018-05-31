<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends Admin_Controller{
	private $author_data = array();
	function __construct(){
		parent::__construct();
        $this->load->model('set_desk_model');
        $this->load->model('config_model');
		$this->load->model('desk_model');
		$this->load->helper('common');
        $this->load->helper('file');

        $this->data['controller'] = $this->set_desk_model->table;
		$this->author_data = handle_author_common_data();
	}
	public function index()
	{
		
	}
	public function edit_total_desk_online(){
		if($this->input->post('total') != '' && $this->input->post('total') >= 0){
            $count_total_rows_desk = $this->desk_model->count_total_rows();
            $number_desk_status_confirm = $this->set_desk_model->count_total_rows1(2);
			if($count_total_rows_desk < $this->input->post('total')){
				return $this->return_api(HTTP_NOT_FOUND,ERROR_TOTAL_NUMBER_DESK_ONLINE);
			}
			if($number_desk_status_confirm > $this->input->post('total')){
				return $this->return_api(HTTP_NOT_FOUND,ERROR_TOTAL_CONFIRM_TABLE_RESERVATIONS);
			}
			$update = $this->config_model->config_update($this->input->post('total'),"total_number_desk_online");
	        if($update){
	        	/*$number_desk_status_confirm = $this->set_desk_model->count_total_rows1(2);
	        	$this->config_model->config_update(($this->input->post('total')-$number_desk_status_confirm),"number_desk_placed_online");*/
				$reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
				return $this->return_api(HTTP_SUCCESS,'',$reponse);
			}
			return $this->return_api(HTTP_NOT_FOUND,ERROR_UPDATE_TOTAL_NUMBER_DESK_ONLINE);
		}else{
			return $this->return_api(HTTP_NOT_FOUND,ERROR_GREATER_ZERO);
		}
	}

}

/* End of file Config.php */
/* Location: ./application/controllers/admin/Config.php */