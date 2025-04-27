<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailer_Lib {
    protected $mail;

    public function __construct() {
        log_message('debug', 'PHPMailer class is loaded.');
    }

    public function load() {
        // Include PHPMailer library files
        require_once APPPATH.'../PHPMailer/src/Exception.php';
        require_once APPPATH.'../PHPMailer/src/PHPMailer.php';
        require_once APPPATH.'../PHPMailer/src/SMTP.php';

        $this->mail = new PHPMailer(true);
        return $this->mail;
    }
}