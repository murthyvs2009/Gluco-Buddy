<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class Logout extends Basecontroller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper('general');
    }

    public function index() {
        $this->session->sess_destroy();
        redirect((BASEURL.'Login'));
    }
}
?>
