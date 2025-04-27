<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BaseController extends CI_Controller{


function __construct() {
    parent::__construct();
    //$this->load->helper('url');
    //$this->lang->load('content'); 
   // $this->load->library('veminfofunctions');
   

   
}



function vemSendmail($toEmail, $subj, $message) {
  /*  $fromemail = "samskritabharatime@gmail.com";
    $fromName = "Samskrita Bharati";
    */
    $givenmail = $toEmail;

    // Load PHPMailer library
    $this->load->library('PHPMailer_Lib');
    $mail = $this->phpmailer_lib->load();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = MAILHOST;
    $mail->SMTPAuth = true;
    $mail->Username = MAILUSERNAME;
    $mail->Password = MAILPASSWORD;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Email content
    $mail->setFrom(MAILUSERNAME, MAILNAME);
    $mail->addAddress($toEmail);
    $mail->Subject = $subj;
    $mail->Body = $message;
    $mail->AltBody = $message;

    // Send email
    if (!$mail->send()) {
        log_message('error', 'Failed to send email. Error: ' . $mail->ErrorInfo);
        return false;
    } else {
        log_message('debug', 'Email sent successfully.');
        return true;
    }
}


}

