<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class GenerateReport extends Basecontroller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MainModel');
        $this->load->helper('general');
        $this->load->helper('date_helper');
    }

    public function index() {
        if ($this->session->userdata('LogIn') !== '1') {
            redirect('Home');
        }

        if($this->session->userdata('myStatus')== 0){
            redirect('ChangePassword');
        }


        if($this->session->userdata('myStatus')== '0'){
            redirect('ChangePassword');
        }

        $reportData = [];
        $hideForm = 0;
        $desiredType=[];
        $fieldTypes=[];
        $highestValues=[];
        $data=[];

        if ($this->input->post('grSubmit')) {
            $hideForm=1;

            $this->form_validation->set_rules("grStartDate", "Report Start Date", "trim|required");
            $this->form_validation->set_rules("grEndDate", "Report End Date", "trim|required");
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run() == TRUE) {
                $ReportStartDate = $this->input->post('grStartDate');
                $ReportEndDate = $this->input->post('grEndDate');

                $ReportStartDate = date('Y-m-d', strtotime($ReportStartDate));
                $ReportEndDate = date('Y-m-d', strtotime($ReportEndDate));

                $ownerId = $this->session->userdata('myId');
                $ReportData = $this->MainModel->getMainData($ReportStartDate, $ReportEndDate, $ownerId);

                foreach ($ReportData as $ReportRecord) {
                    $reportData['ReportRecord'][] = $ReportRecord;
                }

                $ownerId=$this->session->userdata('myId');        

                $specificTypes = ['Fpg', 'Ppg', 'Rando', 'Hba1c', 'Steps'];
        
                if ($ReportStartDate && $ReportEndDate) {
                    $result = $this->MainModel->getValuesByTypeAndDateRange($ownerId, $ReportStartDate, $ReportEndDate);
                
                    if (!empty($result)) {
                        foreach ($specificTypes as $specificType) {
                            $count = $this->MainModel->countRecordsByType($ownerId, $ReportStartDate, $ReportEndDate, $specificType);
                
                            if ($count > 0) {
                                $totalSum = $this->MainModel->getSumByTypesAndDateRange($ownerId, $specificType, $ReportStartDate, $ReportEndDate);

                                $this->session->set_userdata('ReportTypeName', $specificType);
                                $this->session->set_userdata('ReportTypeCount', $count);
                                $this->session->set_userdata('ReportTotalSumValue', $totalSum);

                                $typeName = $this->session->userdata('ReportTypeName');
                                $typeCount = $this->session->userdata('ReportTypeCount');
                                $totalSumValue = $this->session->userdata('ReportTotalSumValue');

                                $desiredType = $specificTypes; 
                                                                
                                if ($typeName === $desiredType[0] && $typeCount && $totalSumValue) {
                                    $data['FpgAverage'] = round($totalSumValue / $typeCount, 1);
                                }
                                
                                if ($typeName === $desiredType[1] && $typeCount && $totalSumValue) {
                                    $data['PpgAverage'] = round($totalSumValue / $typeCount, 1);
                                }
                                
                                if ($typeName === $desiredType[2] && $typeCount && $totalSumValue) {
                                    $data['RandomAverage'] = round($totalSumValue / $typeCount, 1);
                                }
                                
                                if ($typeName === $desiredType[3] && $typeCount && $totalSumValue) {
                                    $data['Hba1cAverage'] = round($totalSumValue / $typeCount, 1);
                                }
                                
                                if ($typeName === $desiredType[4] && $typeCount && $totalSumValue) {
                                    $data['StepsAverage'] = round($totalSumValue / $typeCount, 1);
                                }
                            }
                        }
                    }
                }

                $OwnerID = $this->session->userdata("myId");

                foreach ($specificTypes as $field) {
                    if ($field == 'Fpg') {
                        $data['highestValueFpg'] = $this->MainModel->getMaxValueForType($OwnerID, 'FPG', $ReportStartDate, $ReportEndDate);
                    }
                    if ($field == 'Ppg') {
                        $data['highestValuePpg'] = $this->MainModel->getMaxValueForType($OwnerID, 'PPG', $ReportStartDate, $ReportEndDate);
                    }
                    if ($field == 'Rando') {
                        $data['highestValueRandom'] = $this->MainModel->getMaxValueForType($OwnerID, 'Rando', $ReportStartDate, $ReportEndDate);
                    }
                    if ($field == 'Hba1c') {
                        $data['highestValueHba1c'] = $this->MainModel->getMaxValueForType($OwnerID, 'Hba1c', $ReportStartDate, $ReportEndDate);
                    }
                    if ($field == 'Steps') {
                        $data['highestValueSteps'] = $this->MainModel->getMaxValueForType($OwnerID, 'Steps', $ReportStartDate, $ReportEndDate);
                    }
                }

                foreach ($specificTypes as $fieldName) {
                    if ($fieldName == 'Fpg') {
                        $data['lowestValueFpg'] = $this->MainModel->getMinValueForType($OwnerID, 'FPG', $ReportStartDate, $ReportEndDate);
                    }
                    if ($fieldName == 'Ppg') {
                        $data['lowestValuePpg'] = $this->MainModel->getMinValueForType($OwnerID, 'PPG', $ReportStartDate, $ReportEndDate);
                    }
                    if ($fieldName == 'Rando') {
                        $data['lowestValueRandom'] = $this->MainModel->getMinValueForType($OwnerID, 'Rando', $ReportStartDate, $ReportEndDate);
                    }
                    if ($fieldName == 'Hba1c') {
                        $data['lowestValueHba1c'] = $this->MainModel->getMinValueForType($OwnerID, 'Hba1c', $ReportStartDate, $ReportEndDate);
                    }
                    if ($fieldName == 'Steps') {
                        $data['lowestValueSteps'] = $this->MainModel->getMinValueForType($OwnerID, 'Steps', $ReportStartDate, $ReportEndDate);
                    }
                }


                $ownerId = $this->session->userdata('myId');
                $ReportStartDate = $this->input->post('grStartDate');
                $ReportEndDate = $this->input->post('grEndDate');
                
                $ReportStartDate = date('Y-m-d', strtotime($ReportStartDate));
                $ReportEndDate = date('Y-m-d', strtotime($ReportEndDate));
                
                $fpgDatesForReport = $this->MainModel->get_fpg_and_date_values_by_owner($ReportStartDate, $ReportEndDate, $ownerId);
                
                $fpgDatesForReportDate = [];
                $fpgDatesForReportValue = [];
                
                if (!empty($fpgDatesForReport)) {
                    foreach ($fpgDatesForReport as $rowFpg) {
                        $formattedDateFpg = date('Y-m-d', strtotime($rowFpg['date_main']));
                        $fpgDatesForReportDate[] = $formattedDateFpg;
                        $fpgDatesForReportValue[] = $rowFpg['value'];
                    }
                
                    // Sort both arrays based on date
                    array_multisort($fpgDatesForReportDate, SORT_ASC, $fpgDatesForReportValue);
                
                    // Format the dates as 'd M'
                    $fpgDatesForReportDateFormatted = [];
                    foreach ($fpgDatesForReportDate as $dateFpg) {
                        $fpgDatesForReportDateFormatted[] = date('d M', strtotime($dateFpg));
                    }
                
                    // Prepare data for chart
                    $fpgData = [
                        'labels' => $fpgDatesForReportDateFormatted,
                        'values' => $fpgDatesForReportValue
                    ];
                }
                

                $ppgDatesForReport = $this->MainModel->get_ppg_and_date_values_by_owner($ReportStartDate, $ReportEndDate, $ownerId);

                $ppgDatesForReportDate = [];
                $ppgDatesForReportValue = [];
                
                if (!empty($ppgDatesForReport)) {
                    foreach ($ppgDatesForReport as $rowPpg) {
                        $formattedDatePpg = date('Y-m-d', strtotime($rowPpg['date_main']));
                        $ppgDatesForReportDate[] = $formattedDatePpg;
                        $ppgDatesForReportValue[] = $rowPpg['value'];
                    }
                
                    // Sort both arrays based on date
                    array_multisort($ppgDatesForReportDate, SORT_ASC, $ppgDatesForReportValue);
                
                    // Format the dates as 'd M'
                    $ppgDatesForReportDateFormatted = [];
                    foreach ($ppgDatesForReportDate as $datePpg) {
                        $ppgDatesForReportDateFormatted[] = date('d M', strtotime($datePpg));
                    }
                
                    // Prepare data for chart
                    $ppgData = [
                        'labels' => $ppgDatesForReportDateFormatted,
                        'values' => $ppgDatesForReportValue
                    ];
                }



                $randomDatesForReport = $this->MainModel->get_random_and_date_values_by_owner($ReportStartDate, $ReportEndDate, $ownerId);

                $randomDatesForReportDate = [];
                $randomDatesForReportValue = [];
                
                if (!empty($randomDatesForReport)) {
                    foreach ($randomDatesForReport as $rowRandom) {
                        $formattedDateRandom = date('Y-m-d', strtotime($rowRandom['date_main']));
                        $randomDatesForReportDate[] = $formattedDateRandom;
                        $randomDatesForReportValue[] = $rowRandom['value'];
                    }
                
                    // Sort both arrays based on date
                    array_multisort($randomDatesForReportDate, SORT_ASC,$randomDatesForReportValue);
                
                    // Format the dates as 'd M'
                    $randomDatesForReportDateFormatted = [];
                    foreach ($randomDatesForReportDate as $dateRandom) {
                        $randomDatesForReportDateFormatted[] = date('d M', strtotime($dateRandom));
                    }
                
                    // Prepare data for chart
                    $randomData = [
                        'labels' => $randomDatesForReportDateFormatted,
                        'values' => $randomDatesForReportValue
                    ];
                }


            
            }
        }

        $this->load->view('Template/header3.php');
        $this->load->view('generateReport.php', ['reportData' => $reportData, 'hideForm' => $hideForm, 'data' => $data,'fpgData' => $fpgData,'ppgData' => $ppgData,'randomData' => $randomData]);
        $this->load->view('Template/footer3.php');
    }

 
}
?>