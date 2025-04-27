<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class ChangePassword extends BaseController {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper('general');
        $this->lang->load('cont');
        $this->load->helper('language');
        $this->load->library('session'); // Ensure the session library is loaded
    }

    public function index() {

        if ($this->session->userdata('LogIn') !== '1') {
            redirect('Login');
        }


        if ($this->input->post('cpSubmit')) {
            $this->form_validation->set_rules("cpOldPassword", "Old Password", "trim|required");
            $this->form_validation->set_rules("cpNewPassword", "New Password", "trim|required");
            $this->form_validation->set_rules("cpCfNewPassword", "Confirm Password", "trim|required|matches[cpNewPassword]");
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run() == TRUE) {
                $oldPassword = $this->input->post("cpOldPassword");
                $newPassword = $this->input->post("cpNewPassword");
                $confirmPassword = $this->input->post("cpCfNewPassword");

                // Retrieve session user ID
                $sesId = $this->session->userdata('myId');
                $UsersPassInDb = $this->UserModel->getPassById($sesId);

                // Hash the old password using MD5
                $oldPassWithMd5 = md5($oldPassword);

                // Verify old password
                if ($UsersPassInDb == $oldPassWithMd5) {
                 
                    // Hash the new password using MD5
                    $userUpdateInfo['id'] = $sesId;
                    $userUpdateInfo['password'] = md5($newPassword); // Use MD5 for new password
                    $userUpdateInfo['status'] = '1';
                    $this->UserModel->GBUserUpdateData($userUpdateInfo);
                    redirect("Logout");
                } 
                else {
                    $oldPassNotMatchPassInDB="The Old Password does not match with the password in our database";
                    $this->session->set_userdata("oldPassNotMatchPassInDB", $oldPassNotMatchPassInDB);
                    redirect(site_url("ChangePassword"));
        
                }
            } else {
                // Display validation errors
                $msg = validation_errors();
                $this->session->set_flashdata('validationErrors', $msg);
            }
        }

        // Load views
        $this->load->view('Template/header3');
        $this->load->view('changePassword');
        $this->load->view('Template/footer3');
    }
}
