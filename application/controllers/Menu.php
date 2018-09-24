<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->load->model('product_category_model');
		$this->load->model('product_model');
    }

    public function index(){
        $result = $this->product_category_model->get_all_with_pagination_search('asc', $this->data['lang'], 5);
        $this->data['result'] = $result;
        $this->render('list_menu_view');
    }

    public function detail($slug){
        $products = array();
        $category = array();
        if($slug != ''){
            $category = $this->product_category_model->get_by_slug($slug, array(), $this->data['lang']);
            $category_id = $category['id'];
            $products = $this->product_model->get_by_product_category_id($category_id, array(), $this->data['lang']);
        }
        $this->data['category'] = $category;
        $this->data['products'] = $products;
        $this->render('detail_menu_view');
    }
}
