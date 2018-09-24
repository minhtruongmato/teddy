<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->model('post_category_model');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index(){
    	$categories = $this->post_category_model->get_all_when_active('desc', $this->data['lang']);
    	$this->data['categories'] = $categories;

    	$this->load->library('pagination');
        $config = array();
        $base_url = base_url('bai-viet/');
        $total_rows  = $this->post_model->count_search($this->data['lang']);
        $uri_segment = 2;
        $this->data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $per_page = 2;
        
        $config = $this->pagination_config($base_url, $total_rows, $per_page, $uri_segment);
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $blogs = $this->post_model->get_all_with_pagination_join_category('desc', $this->data['lang'], $per_page, $this->data['page'], null);
    	$this->data['blogs'] = $blogs;
        $this->render('list_blogs_view');
    }

    public function category($slug){
    	$categories = $this->post_category_model->get_all_when_active('desc', $this->data['lang']);
    	$this->data['categories'] = $categories;
    	$category = $this->post_category_model->get_by_slug($slug, 'desc', $this->data['lang']);
    	if($category){
        	$category_id = $category['id'];
        	$category_title = $category['title'];
        	$this->load->library('pagination');
        	$config = array();
        	$base_url = base_url('blogs/category/' . $slug);
	        $total_rows  = $this->post_model->count_by_category_id($this->data['lang'], $category_id);
	        $uri_segment = 4;
	        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	        $per_page = 2;
        
	        $config = $this->pagination_config($base_url, $total_rows, $per_page, $uri_segment);
	        $this->pagination->initialize($config);
	        $this->data['page_links'] = $this->pagination->create_links();

	        $blogs = $this->post_model->get_all_with_pagination_join_category('desc', $this->data['lang'], $per_page, $this->data['page'], $category_id);
	        $this->data['blogs'] = $blogs;
        }else{
        	redirect('homepage','refresh');
        }

    	$this->render('list_blogs_view');
    }

    public function detail($slug){
        $detail = $this->post_model->get_by_slug($slug, array('title', 'description', 'content', 'metakeywords', 'metadescription'), $this->data['lang']);
        if($detail){
            $category = $this->post_category_model->get_by_id($detail['post_category_id'], array('title', 'metakeywords', 'metadescription'), $this->data['lang']);
            $recommended = $this->post_model->get_post_by_recommended($detail['post_category_id'], $detail['id'], array(), $this->data['lang'], 'desc', 2);
        }
        $this->data['detail'] = $detail;
        $this->data['category'] = $category;
        $this->data['recommended'] = $recommended;
        // echo '<pre>';
        // print_r($detail);die;
        $this->render('detail_blogs_view');
    }
}
