<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class PhpInfoController extends Basecontroller {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_php_version()
    {
        $data['php_version'] = phpversion();
        $this->load->view('php_info_view', $data);
    }


}