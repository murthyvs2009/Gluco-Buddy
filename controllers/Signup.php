<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class Signup extends Basecontroller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->CI = & get_instance();
        $this->load->helper('general');
        $this->load->helper('language');
        $this->lang->load('cont');

    }

    public function generateCaptcha($sesCapArr) {
        // Generate a random CAPTCHA word
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
        
        // Generate CAPTCHA
        $cap = create_captcha($vals);

        $this->CI->session->set_userdata($sesCapArr.'_captchaWord', $randomNumber);
        $this->CI->session->set_userdata($sesCapArr.'_captchaImg', $cap['image']);
  
        }
        
        public function headerCreater($pageTitle){
            $data['pageTitle'] = $pageTitle;
            return $data;
    
        }


	public function index()

	{	    
        
        if ($this->session->userdata('LogIn') == '1'){ 
            echo redirect('WeeklyRecord');
              
          }
             
        $sesCapArr2='';
        $sesCapArr2='signup';
        $this->generateCaptcha($sesCapArr2);
        $dataSignup['captchaImg'] = $this->session->userdata($sesCapArr2.'_captchaImg');
        $dataSignup['captchaWord'] = $this->session->userdata($sesCapArr2.'_captchaWord');
       
        $headerCreater=$this->headerCreater('Signup');
        // Load v'iews
        $this->load->view('Template/header2',$headerCreater);
        //echo $this->session->userdata('captchaWord');
        $this->load->view('signup',$dataSignup); 
        $this->load->view('Template/footer2'); 


	}


    public function signupAddRec(){
        if ($this->input->post('signInSubmit'))
        {       
      
            $this->form_validation->set_rules("uEmail","User Email","trim|required|valid_email|is_unique[tbl_users.email]");
            $this->form_validation->set_rules("uName","User Name","trim|required");
            $this->form_validation->set_rules("uPhone","User Phone","trim|required|exact_length[10]|is_unique[tbl_users.phone]");
            $this->form_validation->set_rules('uCaptcha','Captcha','trim|required');
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


            $UserSignupEmail=$this->input->post('uEmail');
            $UserSignupName=$this->input->post('uName');
            $UserSignupPhone=$this->input->post('uPhone');
            $UserSignupCaptcha=$this->input->post('uCaptcha');


            $this->session->set_userdata("UserSignupEmail", $UserSignupEmail);
            $this->session->set_userdata("UserSignupName", $UserSignupName);
            $this->session->set_userdata("UserSignupPhone", $UserSignupPhone);
            



            if($this->form_validation->run()==TRUE){
            
   
                if (trim($this->session->userdata('signup_captchaWord')) == trim($UserSignupCaptcha)) {

                    $UniqueCode=$this->UserModel->getUniqueId('tbl_users','id',8);
                    
                    $SignupInsertData['id']= $UniqueCode;
                    $SignupInsertData['email']=$UserSignupEmail;
                    $SignupInsertData['name']=$UserSignupName;
                    $SignupInsertData['phone']=$UserSignupPhone;
        

                    $this->UserModel->SignupInsertData($SignupInsertData);
                    $newPass=trim(alphaNumericCode());
                    $passwordGenerated=trim(md5($newPass));

                   
                   $SignupInsertData['new_password'] = $newPass;
                   $message = $this->load->view('signup_email_msg',$SignupInsertData, true);
                   
                   $email=$UserSignupEmail;
                   
                   $subject = 'GlucoBuddy:Account Created(Details)';
                   
                 
                   emailFunctionSignUp($UserSignupEmail, $subject, $message);
                   

                    $userUpdateInfo['password']=$passwordGenerated;
                    $userId=$this->UserModel->getUsersIdByEmail($UserSignupEmail);
                    $userUpdateInfo['id']=$userId;
                    $userUpdateInfo['status']=0;
                    $this->UserModel->GBUserUpdateData($userUpdateInfo);
              
                    
                    $this->session->set_flashdata('signup_successPT1', 'Your account has been created successfully.');
                    $this->session->set_flashdata('signup_successPT2', 'A temporary password has been sent to your email. Please check your inbox.');

                    $this->session->unset_userdata('uEmail');
                    $this->session->unset_userdata('uName');
                    $this->session->unset_userdata('uPhone');
                     
                    redirect('Login'); 
            
                    
               }
               else{
                $incorrectCaptcha="Incorrect Captcha";
                $this->session->set_userdata("incorrectCaptcha",$incorrectCaptcha);
                redirect(site_url("Signup"));
                    }
            }
            
            else{
         
                $this->session->set_flashdata('validation_errors', validation_errors());
                redirect(BASEURL."Signup");
            }
            
           

        
        }
      

     
        
    }
}

?>