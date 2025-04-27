<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class Home extends Basecontroller{
    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper('general');
        $this->lang->load('cont');
        $this->load->helper('language');
    }


	public function index()
	{	

        if($this->session->userdata('LogIn') == '1')
        {
             echo redirect('WeeklyRecord');
        }
      
		/*$this->load->view('Template/header1.php');*/
        $this->load->view('home.php');
		/*$this->load->view('Template/footer1.php');*/


		
        
	}
}
?>