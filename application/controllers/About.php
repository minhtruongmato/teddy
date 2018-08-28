<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Public_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->render('list_about_view');
    }

    public function detail(){
        $this->render('detail_about_view');
    }
}
