<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class AddRecord extends BaseController {

    function __construct() {
        parent::__construct();
        $this->load->model('MainModel');
        $this->load->helper(array('general', 'url', 'date', 'language'));
        $this->load->library(array('session', 'form_validation'));
        $this->lang->load('cont');
    }

    public function index() {
        if ($this->session->userdata('LogIn') !== '1') {
            redirect('Home');
        }

        $data = array();

        if ($this->input->post('addRecordSubmit')) {
            $this->processFormSubmission();
        }

        $this->load->view('Template/header3.php');
        $this->load->view('addRecord.php', $data);
        $this->load->view('Template/footer3.php');
    }

    public function getRecordDataByDate($date) {
        $ownerId = $this->session->userdata('myId');
        $data = array(
            'fpg' => $this->MainModel->getValueByDateOwnerType($date, $ownerId, 'fpg'),
            'ppg' => $this->MainModel->getValueByDateOwnerType($date, $ownerId, 'PPG'),
            'hba1c' => $this->MainModel->getValueByDateOwnerType($date, $ownerId, 'HBA1c'),
            'random' => $this->MainModel->getValueByDateOwnerType($date, $ownerId, 'Rando'),
            'steps' => $this->MainModel->getValueByDateOwnerType($date, $ownerId, 'Steps')
        );

        echo json_encode($data);
    }

    private function processFormSubmission() {
        $recordDate = $this->input->post('arDate');
        $ownerId = $this->session->userdata('myId');

        $this->MainModel->deleteRecordsByDateAndOwnerId($recordDate, $ownerId);

        $settedTypes = array_filter([
            'FPG' => $this->input->post('arFPGValue'),
            'PPG' => $this->input->post('arPPGValue'),
            'HBA1C' => $this->input->post('arHBA1CValue'),
            'Rando' => $this->input->post('arRandoValue'),
            'Steps' => $this->input->post('arStepsValue'),
        ]);

        $records = array();
        foreach ($settedTypes as $type => $value) {
            $records[] = array(
                'ownerId' => $ownerId,
                'date_main' => $recordDate,
                'type' => $type,
                'value' => $value ?: null
            );
        }

        if (!empty($records)) {
            $this->db->insert_batch('tbl_main', $records);
            $this->session->set_flashdata('addRecord_success', 'The record has been successfully added!');
        } else {
            $this->session->set_flashdata('addRecord_error', 'No valid data provided to add!');
        }

        redirect('WeeklyRecord');
    }
}
?>
