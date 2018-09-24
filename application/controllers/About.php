<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('about_model');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index(){
    	$result = $this->about_model->get_all_with_pagination_search('desc', $this->data['lang'], 3);
    	$this->data['result'] = $result;
        $this->render('list_about_view');
    }

    public function detail($slug){
    	$detail = $this->about_model->get_by_slug($slug, array('title', 'description', 'content', 'metakeywords', 'metadescription'), $this->data['lang']);
        if($detail['id']){
            $recommended = $this->about_model->get_about_by_recommended($detail['id'], array(), $this->data['lang'], 'desc', 2);
            $this->data['recommended'] = $recommended;
            $this->data['detail'] = $detail;
        }else{
            redirect('homepage','refresh');
        }
        $this->render('detail_about_view');
    }
}
