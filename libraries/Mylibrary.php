<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mylibrary {

protected $CI;

public function __construct() {
    $this->CI =& get_instance();
}

public function headerCreater($pageTitle){
    $data['pageTitle'] = $pageTitle;
    return $data;

}

public function captcha() {
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

// Set captcha word in the session
$this->CI->session->set_userdata('captchaWord', $randomNumber);

// Return the captcha image
return $cap['image'];
}



      
}
?>