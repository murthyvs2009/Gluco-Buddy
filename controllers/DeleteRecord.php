<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class DeleteRecord extends Basecontroller {

    function __construct() {
        parent::__construct();
        $this->load->model('MainModel');
        $this->load->helper('general');
        $this->load->library('mylibrary');
        $this->lang->load('cont');
        $this->load->helper('date_helper');
        $this->load->helper('language');
    }

    public function index() {

        if ($this->session->userdata('LogIn') !== '1') {
            redirect('Home');
        }
    
        if ($this->input->get('deleteDate')) {
            $deleteDate=$this->input->get('deleteDate', TRUE);
        }
        if ($this->input->post('deleteModalSubmit')) {
            $deleteUserId = $this->session->userdata('myId');
            echo $this->MainModel->deleteRecordsByDateAndOwnerId($deleteDate, $deleteUserId);
            $url = 'WeeklyRecord';
            echo'<script> window.location.href = "'.base_url().'index.php?/'.$url.'";</script>';
            $this->session->set_flashdata('deleteDataSucc', 'The record has been successfully deleted! ');
        }
        ?>
<br/>
<br/>
<br/>

        <?php



        $this->load->view('Template/header3.php');
        $this->load->view('deleteRecord.php');
        $this->load->view('Template/footer3.php');
    

    }
}
