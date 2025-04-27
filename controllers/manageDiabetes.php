<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class ManageDiabetes extends Basecontroller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper(['general', 'my_helper', 'language']);
        $this->lang->load('cont');
    }

    public function index() {    
        if ($this->session->userdata('LogIn') == '1') {
            redirect('WeeklyRecord');
        } else {
            $this->load->view('Template/header1.php');
            $this->load->view('manageDiabetes.php');
            $this->load->view('Template/footer1.php');
        }
    }
}
?>