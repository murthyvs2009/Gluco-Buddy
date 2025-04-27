<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class Login extends Basecontroller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper('general');
        $this->CI = & get_instance();
        $this->load->library('mylibrary');
        $this->lang->load('cont');
        $this->load->helper('language');
    }

    public function generateCaptcha($sesCapArr) {
        $randomNumber = sprintf("%06d", mt_rand(0, 999999));
        $randomNumber = trim($randomNumber);

        $vals = array(
            'word'          => $randomNumber,
            'img_path'      => FCPATH . 'assets/images/captchaImages/',
            'img_url'       => base_url('assets/images/captchaImages/'),
            'font_path'     => '',
            'img_width'     => 150,
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 6,
            'font_size'     => 24,
            'pool'          => '0123456789',
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border'     => array(255, 255, 255),
                'text'       => array(0, 0, 0),
                'grid'       => array(255, 40, 40),
            ),
        );

        $cap = create_captcha($vals);
        $this->CI->session->set_userdata($sesCapArr.'_captchaWord', $randomNumber);
        $this->CI->session->set_userdata($sesCapArr.'_captchaImg', $cap['image']);
    }

    public function headerCreater($pageTitle){
        $data['pageTitle'] = $pageTitle;
        return $data;
    }

    public function index() {

        if ($this->session->userdata('LogIn') == '1'){ 
            echo redirect('WeeklyRecord');
        }

        $sesCapArr = 'login';
        $this->generateCaptcha($sesCapArr);
        $data['captchaImg'] = $this->session->userdata($sesCapArr.'_captchaImg');
        $data['captchaWord'] = $this->session->userdata($sesCapArr.'_captchaWord');

     
        
        $headerCreater = $this->headerCreater('Login');
        $this->load->view('Template/header2', $headerCreater);
        $this->load->view('login', $data);
        $this->load->view('Template/footer2');
    }

    public function loginSubmission() {
        if ($this->input->post('logInSubmit')) {

            $this->form_validation->set_rules("logInEmail", "Login Email", "trim|required|valid_email");
            $this->form_validation->set_rules("logInPassword", "Login Password", "trim|required");
            $this->form_validation->set_rules("logInCaptcha", "Login Captcha", "trim|required");
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            $logInEmailId = $this->input->post('logInEmail');
            $logInPassword = $this->input->post('logInPassword');
            $logInCaptcha = $this->input->post('logInCaptcha');

            // store values in session
            $this->session->set_userdata("logInEmail", $logInEmailId);
            $this->session->set_userdata("logInPassword", $logInPassword);
         

            if ($this->form_validation->run() == TRUE) {
                $logInPasswordMd5 = md5($logInPassword);

                if ($this->UserModel->loginSeeIfEmailExists($logInEmailId)) {
                    $passInDB = $this->UserModel->getPassByEmail($logInEmailId);

                    if ($passInDB == $logInPasswordMd5) {

                        if (trim($this->session->userdata('login_captchaWord')) == trim($logInCaptcha)) {

                            $msg9 = alertMsg(lang('cont_9'), 'succ');
                            $this->session->set_userdata('LogIn', '1');

                            $userId = $this->UserModel->getUsersIdByEmail($logInEmailId);
                            $this->session->set_userdata('myId', $userId);
                            $status = $this->UserModel->getStatusById($userId);
                            $this->session->set_userdata('myStatus', $status);

                            // clear email from session after success
                            $this->session->unset_userdata('logInEmail');
                            $this->session->unset_userdata('logInPassword');
                         

                            redirect(BASEURL . "WeeklyRecord");

                        } else {
                            $incorrectCaptcha = "Incorrect Captcha";
                            $this->session->set_userdata("incorrectCaptcha", $incorrectCaptcha);
                            redirect(site_url("Login"));
                        }

                    } else {
                        $incorrectPassword = "Incorrect Password";
                        $this->session->set_userdata("incorrectPassword", $incorrectPassword);
                        redirect(site_url("Login"));
                    }

                } else {
                    $emailDoesNotExist = "Email Address does not Exist";
                    $this->session->set_userdata("emailDoesNotExist", $emailDoesNotExist);
                    redirect(site_url("Login"));
                }

            } else {
                $this->session->set_flashdata('validation_errors', validation_errors());
                redirect(BASEURL . "Login");
            }
        }
    }
}
?>
