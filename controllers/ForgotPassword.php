<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class ForgotPassword extends Basecontroller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper('general');
        $this->lang->load('cont');
        $this->load->helper('language');
        $this->load->library('mylibrary');
    }

    public function headerCreater($pageTitle){
        $data['pageTitle'] = $pageTitle;
        return $data;
    }

    public function index() {  
        if ($this->session->userdata('LogIn') == '1') { 
            redirect('WeeklyRecord');
        }
    
        $headerCreater = $this->headerCreater('Forgot Password');
        // Load views
        $this->load->view('Template/header2', $headerCreater);
        $this->load->view('forgotPassword.php');
        $this->load->view('Template/footer2');
    
        if ($this->input->post('fpEmail')) {   
            // Validating User's given email address.
            $this->form_validation->set_rules("fpEmail", "FPUserEmail", "trim|required|valid_email");
            $ForgotPasswordEmailInput = $this->input->post('fpEmail');
    
            $this->session->set_userdata("fpEmail", $ForgotPasswordEmailInput);

            // if form validation is correct
            if ($this->form_validation->run() == TRUE) {

                // Check if the entered email address is in our database.
                $ifEmailExists = $this->UserModel->fpSeeIfEmailExists($ForgotPasswordEmailInput);
    
                if ($ifEmailExists) {
                    $alphaNumericCodeForFP = alphaNumericCode();
                    // Updating user's password
                    $userUpdateInfo['password'] = md5($alphaNumericCodeForFP);
                    $userUpdateInfo['id'] = $this->UserModel->getUsersIdByEmail($ForgotPasswordEmailInput);
                    $userUpdateInfo['status'] =0;
                    $this->UserModel->GBUserUpdateData($userUpdateInfo);
    
                    // Sending user temporary code 
                    $data['email'] = $ForgotPasswordEmailInput;
                    $data['new_password'] = $alphaNumericCodeForFP;
                    $message = $this->load->view('reset_password_email', $data, true);
    
                    $email = $ForgotPasswordEmailInput;
                    $subject = 'Password Reset';
                    emailFunctionFP($email,$subject, $message);
    
                    $scucessfullPasswordReset="Your password has been successfully reset. A new password has been sent to your email. Please check your inbox.";
                    $this->session->set_userdata("scucessfullPasswordReset", $scucessfullPasswordReset);
                    redirect(site_url("Login"));
                } else {
                    $emailDoesNotExistFP = "The Email Address you entered does not Exist in our database";
                    $this->session->set_userdata("emailDoesNotExistFP", $emailDoesNotExistFP);
                    redirect(site_url("ForgotPassword"));
                }
            } else {
                $this->session->set_flashdata('validation_errors', validation_errors());
                redirect(BASEURL."ForgotPassword");
            }
        }
    }
}
?>
