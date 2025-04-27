<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class YearlyRecord extends Basecontroller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MainModel');
        $this->load->helper('general');
        $this->load->helper('date_helper');
      
    }

    public function unsetSelectedYear(){
        $this->session->unset_userdata('selectedYearYear');
    }

  

    public function index() {
        if ($this->session->userdata('LogIn') !== '1') {
            redirect('Home');
        }

        if($this->session->userdata('myStatus')== '0'){
            redirect('ChangePassword');
        }

        if (!$this->session->userdata('selectedYearYear')) {
            $curr_date = date('d-m-Y');
            $yearNumber = date("Y", strtotime($curr_date));
            $this->session->set_userdata('selectedYearYear', $yearNumber);
        }
         
        
        if (isset($_POST['leftArrowBtn'])) {
            $selectedYearYearLeft = $this->session->userdata('selectedYearYear');
            
            $selectedYearYearLeft = intval($selectedYearYearLeft);
            $previousYearData = get_previous_year($selectedYearYearLeft);
        
            $this->session->set_userdata('selectedYearYear', $previousYearData);            
        }

        if (isset($_POST['rightArrowBtn'])) {
            $selectedYearYearRight = $this->session->userdata('selectedYearYear');
            
            $selectedYearYearRight = intval($selectedYearYearRight);
            $previousYearData = get_next_year($selectedYearYearRight);
        
            $this->session->set_userdata('selectedYearYear', $previousYearData);            
        }


        $selectedStartNEndDate = getStartAndEndDateOfYear($this->session->userdata('selectedYearYear'));
        
        $selectedStartDate = $selectedStartNEndDate['start_date'];
        $selectedEndDate = $selectedStartNEndDate['end_date'];
     
        $this->session->set_userdata('startDateYear',$selectedStartDate);
        $this->session->set_userdata('endDateYear',$selectedEndDate);

        
        $yearDates = get_dates_for_year((int)$this->session->userdata('selectedYearYear'));
        $data['yearDates'] = $yearDates;




        $startDate = $this->session->userdata('startDateYear');
        $endDate = $this->session->userdata('endDateYear');
        $ownerId=$this->session->userdata('myId');        

        $specificTypes = ['Fpg', 'Ppg', 'Rando', 'Hba1c', 'Steps'];

        if ($startDate && $endDate) {
            $result = $this->MainModel->getValuesByTypeAndDateRange($ownerId, $startDate, $endDate);
        
            if (!empty($result)) {
                foreach ($specificTypes as $specificType) {
                    $count = $this->MainModel->countRecordsByType($ownerId, $startDate, $endDate, $specificType);
        
                    if ($count > 0) {
                        $totalSum = $this->MainModel->getSumByTypesAndDateRange($ownerId, $specificType, $startDate, $endDate);

                        $this->session->set_userdata('typeName',$specificType);
                        $this->session->set_userdata('typeCount',$count);
                        $this->session->set_userdata('totalSumValue',$totalSum);


                        $typeName = $this->session->userdata('typeName');
                        $typeCount = $this->session->userdata('typeCount');
                        $totalSumValue = $this->session->userdata('totalSumValue');
                        
                        $desiredType = $specificTypes; 
                        
                        if ($typeName === $desiredType[0] && $typeCount && $totalSumValue) {
                            $FpgAverage = $totalSumValue / $typeCount;
                            $data['FpgAverage']=$FpgAverage;
                        }
                        
                        if ($typeName === $desiredType[1] && $typeCount && $totalSumValue) {
                            $PpgAverage = $totalSumValue / $typeCount;
                            $data['PpgAverage']=$PpgAverage;
                        }
                        
                        if ($typeName === $desiredType[2] && $typeCount && $totalSumValue) {
                            $RandomAverage = $totalSumValue / $typeCount;
                            $data['RandomAverage']=$RandomAverage;
                        }
                        
                        if ($typeName === $desiredType[3] && $typeCount && $totalSumValue) {
                            $Hba1cAverage = $totalSumValue / $typeCount;
                            $data['Hba1cAverage']=$Hba1cAverage;
                        }
                        
                        if ($typeName === $desiredType[4] && $typeCount && $totalSumValue) {
                            $StepsAverage = $totalSumValue / $typeCount;
                            $data['StepsAverage']=$StepsAverage;
                        }
                        
                    }
                }
            }
        }



        $this->load->view('Template/header3.php');
        $this->load->view('yearlyRecord.php', $data);
        $this->load->view('Template/footer3.php');
    }
}