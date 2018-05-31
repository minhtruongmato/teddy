<?php 

/**
* 
*/
class Desk extends Admin_Controller{
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->model('desk_model');
		$this->load->helper('common');
        $this->load->helper('file');

        $this->data['controller'] = $this->desk_model->table;
		$this->author_data = handle_author_common_data();
	}

    public function index(){
        $this->data['keyword'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        $this->load->library('pagination');
        $per_page = 10;
        $total_rows  = $this->desk_model->count_total_rows($this->data['keyword']);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 4);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['result'] = $this->desk_model->get_all_search('desc', $per_page, $this->data['page'], $this->data['keyword']);
        $this->render('admin/'.$this->data['controller'].'/list_'.$this->data['controller'].'_view');
    }

	public function create(){
		$this->load->helper('form');
        $this->load->model("floor_model");
        $this->data['floor'] = array();
        if(count($this->floor_model->get_all())>0){
            foreach ($this->floor_model->get_all() as $key => $value) {
                $this->data['floor'][$value['id']] = $value['title'] ;
            }
        }
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('slot', 'Slot', 'required');
            /*$this->form_validation->set_rules('status', 'Status', 'required');*/
            if($this->form_validation->run() == TRUE){
                $slug = $this->input->post('slug_shared');
                $unique_slug = $this->desk_model->build_unique_slug($slug);
                $shared_request = array(
                    'title' => $this->input->post("title"),
                    'slug' => $unique_slug,
                    'slot' => $this->input->post("slot"),
                    /*'status' => $this->input->post("status"),*/
                    'floor_id' => $this->input->post("floor_id"),
                );
                $insert = $this->desk_model->common_insert(array_merge($shared_request,$this->author_data));
                if($insert){
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/'. $this->data['controller'] .'', 'refresh');
                }
                $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                $this->render('admin/'.$this->data['controller'].'/create_'.$this->data['controller'].'_view');
            }
        }
        $this->render('admin/'.$this->data['controller'].'/create_'.$this->data['controller'].'_view');
	}

    public function detail($id){
        $detail = $this->desk_model->find($id);
        if(!empty($detail)){
            $this->load->model("floor_model");
            $floor = $this->floor_model->find($detail['floor_id']);
            if(!empty($floor)){
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->data['detail'] = $detail;
                $this->data['detail']['floor'] = $floor['title'];
                $this->render('admin/'.$this->data['controller'].'/detail_'.$this->data['controller'].'_view');
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
            redirect('admin/'.$this->data['controller'].'', 'refresh');
        }
    }
    function remove(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->desk_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/'.$this->data['controller'].'', 'refresh');
            }
            $data = array('is_deleted' => 1);
            $update = $this->desk_model->common_update($id, $data);
            if($update){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
            }
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
            
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }

    public function edit($id){
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->desk_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/'.$this->data['controller'].'', 'refresh');
            }
            $this->load->helper('form');
            $this->load->model("floor_model");
            $this->data['floor'] = array();
            if(count($this->floor_model->get_all())>0){
                foreach ($this->floor_model->get_all() as $key => $value) {
                    $this->data['floor'][$value['id']] = $value['title'];
                }
            }
            $this->data['detail'] = $this->desk_model->find($id);
            if($this->input->post()){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('slot', 'Slot', 'required');
                /*$this->form_validation->set_rules('status', 'Status', 'required');*/
                if($this->form_validation->run() == TRUE){
                    $shared_request =array(
                        'slot' => $this->input->post('slot'),
                        /*'status' => $this->input->post('status'),*/
                        'floor_id' => $this->input->post('floor_id')
                    );
                    if($this->input->post('title') !== $this->data['detail']['title']){
                        $unique_slug = $this->desk_model->build_unique_slug($this->input->post('slug_shared'));
                        $shared_request['title'] = $this->input->post('title');
                        $shared_request['slug'] = $unique_slug;
                    }
                    $update = $this->desk_model->common_update($id,array_merge($shared_request,$this->author_data));
                    if($update){
                        $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                        redirect('admin/'. $this->data['controller'] .'', 'refresh');
                    }
                }
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            redirect('admin/'. $this->data['controller'] .'', 'refresh');
        }
        $this->render('admin/'.$this->data['controller'].'/edit_'.$this->data['controller'].'_view');
    }
}