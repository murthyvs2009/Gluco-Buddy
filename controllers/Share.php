<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class Share extends Basecontroller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper(['general', 'language']);
        $this->lang->load('cont');
    }

    public function index() {    
        if ($this->session->userdata('LogIn') == '1') {
            $this->load->view('Template/header3.php');
            $this->load->view('share.php');
            $this->load->view('Template/footer3.php');
        } else {
            $this->load->view('Template/header1.php');
            $this->load->view('share.php');
            $this->load->view('Template/footer1.php');
        }

        if($this->session->userdata('myStatus')== '0'){
            redirect('ChangePassword');
        }
    }
}
?>