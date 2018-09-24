<?php
/**
 * 
 */
class About extends Admin_Controller
{
	private $request_language_template = array(
        'title', 'description', 'content', 'metakeywords', 'metadescription'
    );
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->helper('common');
		$this->load->helper('file');
		$this->data['template'] = build_template();
		$this->author_data = handle_author_common_data();
		$this->data['request_language_template'] = $this->request_language_template;
		$this->load->model('about_model');
	}

	public function index()
	{
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->about_model->count_search('vi');
        if($keywords != ''){
            $total_rows  = $this->about_model->count_search('vi', $keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/about/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $result = $this->about_model->get_all_with_pagination_search('desc','vi' , $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->about_model->get_all_with_pagination_search('desc','vi' , $per_page, $this->data['page'], $keywords);
        }
        $this->data['result'] = $result;

		$this->render('admin/about/list_about_view');
	}

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');
        $this->form_validation->set_rules('image_shared', 'Hình ảnh', 'callback_file_selected_test[image_shared]');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/about/create_about_view');
        } else {
        	if($this->input->post()){
        		$check_upload = true;
                if ($_FILES['image_shared']['size'] > 1228800 && $_FILES['image_shared']) {
                    $check_upload = false;
                }
                if($check_upload == true){
                	$slug = $this->input->post('slug_shared');
                    $unique_slug = $this->about_model->build_unique_slug($slug);
                    $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/about', 'assets/upload/about/thumb');

                    $shared_request = array(
                        'slug' => $unique_slug,
                        'image' => $image,
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    $this->db->trans_begin();

                    $insert = $this->about_model->common_insert($shared_request);
                    if($insert){

                        $requests = handle_multi_language_request('about_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
                        $this->about_model->insert_with_language($requests);
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                        $this->render('admin/about/create_post_category_view');
                    } else {
                        $this->db->trans_commit();
                        $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                        redirect('admin/about', 'refresh');
                    }
                }else{
                    $this->session->set_flashdata('message_error',sprintf(MESSAGE_PHOTOS_ERROR, 1200));
                    redirect('admin/about');
                }
        	}
        }
	}

	public function detail($id){
		$detail = $this->about_model->get_by_id($id, $this->request_language_template);
        $detail = build_language('about', $detail, $this->request_language_template, $this->page_languages);
        $this->data['detail'] = $detail;

        $this->render('admin/about/detail_about_view');
	}

	public function edit($id){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->about_model->get_by_id($id, $this->request_language_template);
        $detail = build_language('about', $detail, $this->request_language_template, $this->page_languages);
        $this->data['detail'] = $detail;

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/about/edit_about_view');
        }else{
        	if($this->input->post()){
                $check_upload = true;
                if ($_FILES['image_shared']['size'] > 1228800) {
                    $check_upload = false;
                }
                if ($check_upload == true) {
                    $slug = $this->input->post('slug_shared');
                    $unique_slug = $this->about_model->build_unique_slug($slug, $id);
                    $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/about', 'assets/upload/about/thumb');
                    $shared_request = array(
                        'slug' => $unique_slug,
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    if($image){
                        $shared_request['image'] = $image;
                    }
                    $this->db->trans_begin();

                    $update = $this->about_model->common_update($id, $shared_request);
                    if($update){
                        $requests = handle_multi_language_request('about_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                        foreach ($requests as $key => $value){
                            $this->about_model->update_with_language($id, $requests[$key]['language'], $value);
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                        $this->render('admin/'. $this->controller .'/edit/'.$id);
                    } else {
                        $this->db->trans_commit();
                        $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                        if($image != '' && $image != $detail['image'] && file_exists('assets/upload/about/'.$detail['image'])){
                            unlink('assets/upload/about/'.$detail['image']);
                        }
                        redirect('admin/about', 'refresh');
                    }
                }else{
                    $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
                    redirect('admin/about');
                }
            }
        }
	}

	function file_selected_test($str, $field){
        if (empty($_FILES[$field]['name'])) {
            $this->form_validation->set_message(__FUNCTION__, 'The {field} field is required.');
            return false;
        }else{
            return true;
        }
    }
}