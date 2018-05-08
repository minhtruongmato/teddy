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
        $this->controller = $this->uri->segment(2);

		$this->author_data = handle_author_common_data();
	}

	public function index(){
		$menus = $this->menu_model->get_all_with_pagination_search('asc');
		$this->data['menus'] = $menus;
		$this->render('admin/menu/menu_view');
	}

    public function create(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');

        $main_category = $this->post_category_model->get_by_parent_id(0,'asc');
        $main_category = build_array_by_slug_for_dropdown($main_category);
        $this->data['main_category'] = $main_category;

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/menu/create_menu_view');
        } else {
            if ($this->input->post()) {
                $shared_request = array(
                    'url' => $this->input->post('parent_id_shared'),
                    'is_actived' => $this->input->post('is_actived'),
                    'level' => 1,
                    'sort' => (int)$count + 1,
                    'parent_id' => $this->input->post('parent_id_shared'),
                    'type' => $this->input->post('type_shared'),
                    'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
            }
        }

        
    }

	public function sort(){
        $params = array();
        parse_str($this->input->get('sort'), $params);
        $i = 1;
        foreach($params as $value){
            $this->post_category_model->update_sort($i, $value[0]);
            $i++;
        }
   }

    public function show_sub_category(){
        $slug = $this->input->post('slug');
        $category_post = $this->post_category_model->get_by_parent_id(null, 'asc');
        $detail = $this->post_category_model->get_by_slug($slug);
        
        $this->get_sub_category($detail['id'], '', $sub_cate);

        $this->get_posts_with_category($category_post, $detail['id'], $ids);
        $new_ids = array_unique($ids);
        $posts = $this->post_model->get_by_multiple_ids(array_unique($new_ids), 'vi');
       
        $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash(),
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
        $posts = $this->post_model->get_by_multiple_ids(array_unique($new_ids), 'vi');
        
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
        if(count($category)){
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

}