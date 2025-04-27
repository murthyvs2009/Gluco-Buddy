<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class Users extends BaseController {  // Ensure this matches the case in BaseController.php

    public function __construct() {
        parent::__construct();
        $this->load->model('MainModel');
        $this->load->model('UserModel');
        $this->load->helper(array('general'));  // Load helpers in a single line
    }

    public function unsetSelectedWeek() {
        $this->session->unset_userdata(array('selectedWeek', 'selectedYear'));
    }

    public function index() {
        if ($this->session->userdata('LogIn') != '1') {  // Avoid strict comparison if stored as an integer
            redirect('Home');
        }
        if ($this->session->userdata('myStatus') == '0') {
            redirect('ChangePassword');
        }
        if ($this->session->userdata('myId') != 'mNcybYL7') {  // Avoid strict comparison unless sure
            redirect('WeeklyRecord');
        }

        $data['userData'] = $this->UserModel->getUsersData();

        $this->load->view('Template/header3.php');
        $this->load->view('users.php', $data);
        $this->load->view('Template/footer3.php');
    }

    public function getMainData() {
        $ownerId = $this->session->userdata('myId');
        $data['userData'] = $this->UserModel->getUsersData();
        $data['mainData'] = (!empty($ownerId)) ? $this->UserModel->getMainData($ownerId) : [];

        $this->load->view('Template/header3.php');
        $this->load->view('users.php', $data);
        $this->load->view('Template/footer3.php');
    }
}
