<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Public_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->render('contact_view');
    }
}
