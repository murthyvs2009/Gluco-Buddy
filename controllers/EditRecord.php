<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class EditRecord extends Basecontroller {

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
    
        $data = array();
    
        if ($this->input->get('date')) {
            $data['date'] = $this->input->get('date', TRUE);
            $this->session->set_userdata('editDate', $data['date']);
        }
        
        if ($this->input->get('fpg')) {
            $data['fpg'] = $this->input->get('fpg', TRUE);
     
        }
        
 
    
        if ($this->input->get('ppg')) {
            $data['ppg'] = $this->input->get('ppg', TRUE);

        }
    
        if ($this->input->get('hba1c')) {
            $data['hba1c'] = $this->input->get('hba1c', TRUE);
   
        }
    
        if ($this->input->get('random')) {
            $data['random'] = $this->input->get('random', TRUE);
         
        }
    
        if ($this->input->get('steps')) {
            $data['steps'] = $this->input->get('steps', TRUE);

        }

        if ($this->input->post('editRecordSubmit')) {
            echo $this->MainModel->deleteRecordsByDateAndOwnerId($this->session->userdata('editDate'), $this->session->userdata('myId'));
        
            $ownerId = $this->session->userdata('myId');
            $editDate = $this->session->userdata('editDate');

            $settedTypes=array();

            if(!empty($this->input->post('erFPGValue'))){
                array_push($settedTypes,"FPG");


            }

            if(!empty($this->input->post('erPPGValue'))){
                array_push($settedTypes,"PPG");

                
            }

            if(!empty($this->input->post('erHBA1CValue'))){
                array_push($settedTypes,"HBA1C");

                
            }


            if(!empty($this->input->post('erRandoValue'))){
                array_push($settedTypes,"Rando");

                
            }


            if(!empty($this->input->post('erStepsValue'))){
                array_push($settedTypes,"Steps");
                
            }

    
            print_r($settedTypes);

            $data = array();
        
            foreach ($settedTypes as $settedType) {
                $value = $this->input->post('er' . $settedType . 'Value');
                if ($value === null) {
                    $value = ''; 
                }
        
                $data[] = array(
                    'ownerId' => $ownerId,
                    'date_main' => $editDate,
                    'type' => $settedType,
                    'value' => $value
                );
            }
        
            $this->db->insert_batch('tbl_main', $data);
            $url = 'WeeklyRecord';
            echo'<script> window.location.href = "'.base_url().'index.php?/'.$url.'";</script>';
            $this->session->set_flashdata('editRecord_success', 'The record has been successfully updated! ');


        }

 
        $this->load->view('Template/header3.php');
        $this->load->view('editRecord.php', $data);
        $this->load->view('Template/footer3.php');
    
    
    }

    
    
}
?>