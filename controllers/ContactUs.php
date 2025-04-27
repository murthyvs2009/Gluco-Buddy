<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class ContactUs extends Basecontroller {

    function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
        $this->load->model('UserModel');
        $this->load->helper('general');
        $this->lang->load('cont');
        $this->load->helper('language');
    }

        
        public function headerCreater($pageTitle){
            $data['pageTitle'] = $pageTitle;
            return $data;
    
        }




	public function index()
	{	

        $headerCreater=$this->headerCreater('contactus');

        if($this->session->userdata('LogIn') == '1')
        {
            $this->load->view('Template/header3',$headerCreater);
            $this->load->view('contactUs.php',$dataContact); 
            $this->load->view('Template/footer3'); 
        }
        else{
        $this->load->view('Template/header1',$headerCreater);
        $this->load->view('contactUs.php',$dataContact); 
        $this->load->view('Template/footer1'); 

    }


    if($this->session->userdata('myStatus')== '0'){
        redirect('ChangePassword');
    }
    }

    public function contactUsSubmission() {  
        if ($this->input->post('cuSubmit')) {
            $this->form_validation->set_rules("cuEmail", "Contact Us Email", "trim|required|valid_email");
            $this->form_validation->set_rules("cuPhone", "Contact Us Phone", "trim|required|exact_length[10]");
            $this->form_validation->set_rules("cuMessage", "Contact Us Message", "trim|required");
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            
            $cuEmail = $this->input->post("cuEmail");
            $cuPhone = $this->input->post("cuPhone");
            $cuMessage = $this->input->post("cuMessage");


            $this->session->set_userdata("cuEmail", $cuEmail);
            $this->session->set_userdata("cuPhone", $cuPhone);
            $this->session->set_userdata("cuMessage", $cuMessage);

            if ($this->form_validation->run() == TRUE) {
    
                $data['email'] = $cuEmail;
                $data['cuMessage'] = $cuMessage;
                $data['cuPhone'] = $cuPhone;
    
                $message = $this->load->view('contact_us_email', $data, true);
    
                emailFunction($cuEmail, 'Contact Form Submission', $message);
                $this->session->set_flashdata('contactForm', 'Contact Form submitted successfully!');
                
                if ($this->session->userdata('LogIn') == '1') {
                    redirect(BASEURL . "WeeklyRecord");
                } else {
                    redirect(BASEURL . "Home");
                }
            } else {
                // Validation failed, redirect back to the form with errors
                $this->session->set_flashdata('validaion_errors', validation_errors());
                redirect(BASEURL . "ContactUs");
            }
        }
    }
    

    }

?>