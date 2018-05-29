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
		if(!empty($this->input->post('total'))){
            $count_total_rows_desk = $this->desk_model->count_total_rows();
            $number_desk_status_confirm = $this->set_desk_model->count_total_rows1(2);
			if($count_total_rows_desk < $this->input->post('total')){
				return $this->output
	                        ->set_content_type('application/json')
	                        ->set_status_header(404)
	                        ->set_output(json_encode(array('status' => 404,'message' => ERROR_TOTAL_NUMBER_DESK_ONLINE)));
			}
			if($number_desk_status_confirm > $this->input->post('total')){
				return $this->output
	                        ->set_content_type('application/json')
	                        ->set_status_header(404)
	                        ->set_output(json_encode(array('status' => 404,'message' => ERROR_TOTAL_CONFIRM_TABLE_RESERVATIONS)));
			}
			$update = $this->config_model->config_update($this->input->post('total'),"total_number_desk_online");
	        if($update){
	        	/*$number_desk_status_confirm = $this->set_desk_model->count_total_rows1(2);
	        	$this->config_model->config_update(($this->input->post('total')-$number_desk_status_confirm),"number_desk_placed_online");*/
				$reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(array('status' => 200,'reponse' => $reponse, 'isExists' => true)));
			}
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
               	->set_output(json_encode(array('status' => 404,'message' => ERROR_UPDATE_TOTAL_NUMBER_DESK_ONLINE)));
		}else{
			redirect('admin/'. $this->data['controller'] .'/status/1', 'refresh');
		}
	}

}

/* End of file Config.php */
/* Location: ./application/controllers/admin/Config.php */