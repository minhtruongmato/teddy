<?php 

/**
* 
*/
class Floor extends Admin_Controller{
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->model('floor_model');
		$this->load->helper('common');
        $this->load->helper('file');

        $this->data['controller'] = $this->floor_model->table;
		$this->author_data = handle_author_common_data();
	}

    public function index(){
        $this->data['keyword'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        $this->load->library('pagination');
        $per_page = 10;
        $total_rows  = $this->floor_model->count_total_rows($this->data['keyword']);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 4);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['result'] = $this->floor_model->get_all_search('desc', $per_page, $this->data['page'], $this->data['keyword']);
        $this->render('admin/'.$this->data['controller'].'/list_'.$this->data['controller'].'_view');
    }

	public function create(){
		$this->load->helper('form');
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
            if($this->form_validation->run() == TRUE){
                $slug = $this->input->post('slug_shared');
                $unique_slug = $this->floor_model->build_unique_slug($slug);
                $shared_request = array(
                    'title' => $this->input->post("title"),
                    'slug' => $unique_slug,
                );
                $insert = $this->floor_model->common_insert(array_merge($shared_request,$this->author_data));
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
        $detail = $this->floor_model->find($id);
        if(!empty($detail)){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->data['detail'] = $detail;
            $this->render('admin/'.$this->data['controller'].'/detail_'.$this->data['controller'].'_view');
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
            redirect('admin/'.$this->data['controller'].'', 'refresh');
        }
    }
    function remove(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
        $detail = $this->floor_model->find($id);
            if(empty($detail)){
                return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ISSET_ERROR);
            }
            $this->load->model('desk_model');
            $desk = $this->desk_model->find_rows(array("floor_id" => $id,"is_deleted" => 0));
            if($desk != 0){
                return $this->return_api(HTTP_NOT_FOUND,sprintf(MESSAGE_FOREIGN_KEY_ERROR,$desk));
            }
            $data = array('is_deleted' => 1);
            $update = $this->floor_model->common_update($id, $data);
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
            $this->load->helper('form');
            if($this->floor_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/'.$this->data['controller'].'', 'refresh');
            }
            $this->data['detail'] = $this->floor_model->find($id);
            if($this->input->post()){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title', 'Title', 'required');
                if($this->form_validation->run() == TRUE){
                    if($this->input->post('title') !== $this->data['detail']['title']){
                        $unique_slug = $this->floor_model->build_unique_slug($this->input->post('slug_shared'));
                        $shared_request = array(
                            'title' => $this->input->post('title'),
                            'slug' => $unique_slug
                        );
                    }else{
                        $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                        redirect('admin/'. $this->data['controller'] .'', 'refresh');
                    }
                    $update = $this->floor_model->common_update($id,array_merge($shared_request,$this->author_data));
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