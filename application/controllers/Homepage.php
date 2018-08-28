<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {


    public function index(){
        $this->render('homepage_view');
    }
}
