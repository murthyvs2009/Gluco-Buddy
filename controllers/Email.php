<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class Email extends BaseController {

 public function phpinfo(){
    
 }
	public function index()
	{	
        $toEmail="murthyvs2009@gmail.com";
        $subj="test Subject";
        $message="message : I love you very much.";


        $smtpEmail="vemuriinfomedia@gmail.com";
        $smtpPass="cbgkytyiruxrkajr";
    
        $fromemail="vpsrinivas32@gmail.com";
        $fromName="Murthy S Vemuri";
        $givenmail=$toEmail;
    
        
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = $smtpEmail;
        $config['smtp_pass']    = $smtpPass;
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
        
        $this->email->initialize($config);
        
        $this->email->from($fromemail,$fromName);
        $this->email->to($givenmail); 
        $this->email->subject($subj);
        $this->email->message($message);
        
        
        $this->email->send();
        
        //echo $this->email->print_debugger();
    
    
    }




     }
   

	


?>