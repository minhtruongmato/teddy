<?php 

/**
* 
*/
class Menu extends Admin_Controller{
	
	private $request_language_template = array(
        'title'
    );
    private $author_data = array();
    private $controller = '';

	function __construct(){
		parent::__construct();
        $this->load->model('post_category_model');
        $this->load->model('post_model');
        $this->load->model('menu_model');
		$this->load->helper('common');
        $this->load->helper('file');

        $this->data['template'] = build_template();
        $this->data['request_language_template'] = $this->request_language_template;
        $this->controller = 'menu';

		$this->author_data = handle_author_common_data();
	}

	public function index(){
		$menus = $this->menu_model->get_by_parent_id(0, 'asc');
		$this->data['menus'] = $menus;
		$this->render('admin/menu/menu_view');
	}

    public function create($id = ''){
        $main_category = $this->post_category_model->get_by_parent_id_when_active(null,'asc');
        $this->data['main_category'] = $main_category;
        if(isset($id) && is_numeric($id)){
            $this->data['id'] = $id;
            $this->fetch_posts_for_menu($id, $this->controller, $this->page_languages, $main_category);
        }else{
            $this->data['id'] = 0;
            $this->data['slug'] = '';
            $this->data['posts'] = array('' => 'Click để chọn');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');

        

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/menu/create_menu_view');
        } else {
            if ($this->input->post()) {
                $shared_request = array(
                    'url' => $this->input->post('url_shared'),
                    'is_activated' => $this->input->post('isActived_shared'),
                    'parent_id' => $id,
                    'slug' => $this->input->post('selectMain_shared'),
                    'slug_post' => $this->input->post('selectArticle_shared'),
                );
                $this->db->trans_begin();
                $insert = $this->menu_model->common_insert(array_merge($shared_request,$this->author_data));

                if($insert){
                    $requests = handle_multi_language_request('menu_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
                    $this->menu_model->insert_with_language($requests);
                }

                if ($this->db->trans_status() === false) {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    $this->render('admin/'. $this->controller .'/create_menu_view');
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    if(isset($id) && is_numeric($id)){
                        redirect('admin/'. $this->controller .'/edit/' . $id,'refresh');
                    }else{
                        redirect('admin/'. $this->controller, 'refresh');
                    }
                }
            }
        }
    }

    public function edit($id){
        $this->load->model('post_category_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $main_category = $this->post_category_model->get_by_parent_id_when_active(null,'asc');

        $subs = $this->menu_model->get_by_parent_id($id, 'asc');
        $this->data['subs'] = $subs;

        $this->fetch_posts_for_menu($id, $this->controller, $this->page_languages, $main_category);

        
        $this->data['main_category'] = $main_category;
        $this->data['count_sub'] = count($this->menu_model->get_by_parent_id_when_active($id));

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/'. $this->controller .'/edit_menu_view');
        } else {
            if ($this->input->post()) {

                $shared_request = array(
                    'url' => $this->input->post('url_shared'),
                    'is_activated' => $this->input->post('isActived_shared'),
                    'slug' => $this->input->post('selectMain_shared'),
                    'slug_post' => $this->input->post('selectArticle_shared'),
                );
                $this->db->trans_begin();

                $update = $this->menu_model->common_update($id,array_merge($shared_request,$this->author_data));
                if($update){
                    $requests = handle_multi_language_request('menu_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                    foreach ($requests as $key => $value){
                        $this->menu_model->update_with_language($id, $requests[$key]['language'], $value);
                    }
                }

                if ($this->db->trans_status() === false) {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                    $this->render('admin/'. $this->controller .'/create_menu_view');
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                    redirect('admin/'. $this->controller .'/edit/' . $id,'refresh');
                }
            }
        }
        
    }

    public function remove(){
        $id = $this->input->get('id');
        $list_menus = $this->menu_model->get_by_parent_id(null, 'asc');
        
        $detail_menu = $this->menu_model->get_by_id_wo_lang($id);
        
        $this->get_posts_with_category($list_menus, $detail_menu['id'], $ids);
        $ids = array_unique($ids);
        $new_id = array(0 => $id);
        if(array_diff($ids, $new_id) == null){
            $data = array('is_deleted' => 1);
            $update = $this->menu_model->common_update($id, $data);
            if($update == 1){
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'isExisted' => true)));
            }
        }else{
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'isExisted' => false)));
        }
        return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_BAD_REQUEST)
                ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
    }

	public function sort(){
        $params = array();
        parse_str($this->input->get('sort'), $params);
        $i = 1;
        foreach($params as $value){
            $this->menu_model->update_sort($i, $value[0]);
            $i++;
        }
   }

   public function active(){
        $id = $this->input->post('id');
        $detail = $this->menu_model->get_by_id_wo_lang($id);
        if($detail['is_activated'] == 0){
            $data = array('is_activated' => 1);
            $update = $this->menu_model->common_update($id, $data);
            $message_success = 'Tắt Menu thành công';
        }else{
            $data = array('is_activated' => 0);
            $update = $this->menu_model->common_update($id, $data);
            $message_success = 'Bật Menu thành công';
        }
        if ($update == 0) {
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(HTTP_BAD_REQUEST)
            ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
        } else {
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse, 'message_success' => $message_success)));
        }
    }

    public function show_sub_category(){
        $slug = $this->input->get('slug');
        $category_post = $this->post_category_model->get_by_parent_id(null, 'asc');
        $detail = $this->post_category_model->get_by_slug($slug);
        
        $this->get_sub_category($detail['id'], '---', $sub_cate);

        $this->get_posts_with_category($category_post, $detail['id'], $ids);
        $new_ids = array_unique($ids);
        $posts = $this->post_model->get_by_multiple_ids(array_unique($new_ids), 'vi');
       
        $reponse = array(
                'sub_cate' => $sub_cate,
                'posts' => $posts
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse)));
    }

    public function show_posts(){
        $slug = $this->input->post('slug');
        $category_post = $this->post_category_model->get_by_parent_id(null, 'asc');
        $detail = $this->post_category_model->get_by_slug($slug);
        
        $this->get_posts_with_category($category_post, $detail['id'], $ids);
        $new_ids = array_unique($ids);
        $posts = $this->post_model->get_by_multiple_ids($new_ids, 'vi');
        
        $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash(),
                'posts' => $posts
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse)));
    }

    function get_sub_category($id, $char = '', &$sub_cate){
        $category = $this->post_category_model->get_by_parent_id($id,'asc');
        if(count($category) > 0){
            foreach ($category as $key => $item){
                $sub_cate[$item['slug']] = $char.$item['title'];
                continue;
            }
            $this->get_sub_category($item['id'], $char.'|---', $sub_cate);
        }
    }

    function get_posts_with_category($categories, $parent_id = 0, &$ids){
        foreach ($categories as $key => $item){
            $ids[] = $parent_id;
            if ($item['parent_id'] == $parent_id){
                $ids[] = $item['id'];
                $this->get_posts_with_category($categories, $item['id'], $ids);
            }
        }
    }

    protected function build_parent_title($parent_id){
        $sub = $this->post_category_model->get_by_id($parent_id, array('title'));

        if($parent_id != 0){
            $title = explode('|||', $sub['post_category_title']);
            $sub['title_en'] = $title[0];
            $sub['title_vi'] = $title[1];

            $title = $sub['title_vi'];
        }else{
            $title = 'Danh mục gốc';
        }
        return $title;
    }

    protected function fetch_posts_for_menu($id, $controller, $page_languages, $main_category){
        $detail = $this->menu_model->get_by_id($id, array('title'));
        $detail = build_language($this->controller, $detail, array('title'), $this->page_languages);

        $detail_category = $this->post_category_model->get_by_slug($detail['slug']);
        

        $this->get_posts_with_category($main_category, $detail_category['id'], $ids);
        $new_ids = array_unique($ids);
        $posts = $this->post_model->get_by_multiple_ids(array_unique($new_ids), 'vi');
        $posts = build_array_by_slug_for_dropdown($posts);
        $this->data['detail'] = $detail;
        $this->data['posts'] = $posts;
        $this->data['slug'] = $detail_category['slug'];
    }

}