<?php 

/**
* 
*/
class Set_desk extends Admin_Controller{
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->model('set_desk_model');
		$this->load->helper('common');
        $this->load->helper('file');

        $this->data['controller'] = $this->set_desk_model->table;
		$this->author_data = handle_author_common_data();
	}
    public function status($status){
        if(is_numeric($status) && ($status == 0 || $status == 1)){
            $this->data['keyword'] = '';
            if($this->input->get('search')){
                $this->data['keyword'] = $this->input->get('search');
            }
            $date = array();
            if($this->input->get('date')){
                $this->data['date'] = $this->input->get('date');
                $date = explode(" - ", $this->input->get('date'));
                foreach ($date as $key => $value) {
                    $date[$key]=date('Y-m-d H:i:s', strtotime($value));
                    if($key == 1){
                        $date[$key]=date('Y-m-d 23:59:59', strtotime($value));
                    }
                }
            } 
            $this->load->library('pagination');
            $per_page = 10;
            $total_rows  = $this->set_desk_model->count_total_rows($this->data['keyword'],$status,$date);
            $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 5);
            $this->data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            $this->pagination->initialize($config);
            $this->data['page_links'] = $this->pagination->create_links();
            $this->data['result'] = $this->set_desk_model->get_all_search('desc', $per_page, $this->data['page'], $this->data['keyword'],$status,$date);
   /*         if(isset($date)){
                foreach ($this->data['result'] as $key => $value) {
                    if(strtotime($value['time'])>=strtotime($date[0]) && strtotime($value['time'])<strtotime($date[1])){
                        $this->data['result'][$key] = $value;
                    }else{
                        unset($this->data['result'][$key]);
                    }
                }
            }*/
            return $this->render('admin/'.$this->data['controller'].'/list_'.$this->data['controller'].'_view');
        }
        redirect('admin/'. $this->data['controller'] .'/status/1', 'refresh');

    }
    public function edit_status(){
        $detail = $this->set_desk_model->find($this->input->post('id'));
        if(!empty($detail)){
            if($detail['status'] == 1 && $this->input->post('status') == 'error'){
                $update = $this->set_desk_model->common_update($this->input->post('id'),array_merge(array("status" => 0),$this->author_data));
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode(array('status' => 200,'reponse' => $reponse, 'isExists' => true)));
                }
            }else{
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode(array('status' => 404)));
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode(array('status' => 404)));
    }

	public function create(){
		$this->load->helper('form');
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('slot', 'Slot', 'required');
            if($this->form_validation->run() == TRUE){
                $time = $this->input->post('date')." ".$this->input->post('hour').":".$this->input->post('min').":00";
                $shared_request =array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'slot' => $this->input->post('slot'),
                    'time' => date_format(date_create($time),"Y-m-d H:i:s")
                );
                $insert = $this->set_desk_model->common_insert(array_merge($shared_request,$this->author_data));
                if($insert){
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/'. $this->data['controller'] .'/status/1', 'refresh');
                }
                $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                $this->render('admin/'.$this->data['controller'].'/create_'.$this->data['controller'].'_view');
            }
        }
        $this->render('admin/'.$this->data['controller'].'/create_'.$this->data['controller'].'_view');
	}

    public function detail($id){
        if($id &&  is_numeric($id) && ($id > 0)){
            $detail = $this->set_desk_model->find($id);
            if(!empty($detail)){
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->data['detail'] = $detail;
                $this->render('admin/'.$this->data['controller'].'/detail_'.$this->data['controller'].'_view');
            }else{
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/'.$this->data['controller'].'', 'refresh');
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            return redirect('admin/'.$this->data['controller'],'refresh');
        }
    }
    function remove($id){
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->set_desk_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/'.$this->data['controller'].'', 'refresh');
            }
            $data = array('is_deleted' => 1);
            $update = $this->set_desk_model->common_update($id, $data);
            if($update){
                $this->session->set_flashdata('message_success',MESSAGE_REMOVE_SUCCESS);
                return redirect('admin/'.$this->data['controller'],'refresh');
            }
            $this->session->set_flashdata('message_error',MESSAGE_REMOVE_ERROR);
            return redirect('admin/'.$this->data['controller'],'refresh');
            
        }
        $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
        return redirect('admin/'.$this->data['controller'],'refresh');
    }
}