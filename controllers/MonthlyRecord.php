<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class  MonthlyRecord extends Basecontroller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('MainModel');
        $this->load->helper('general');
        $this->load->helper('date_helper');
      
    }

    public function unsetSelectedMonth(){
        $this->session->unset_userdata('selectedMonth');
        $this->session->unset_userdata('selectedMonthYear');
    }

  

    public function index() {
        if ($this->session->userdata('LogIn') !== '1') {
            redirect('Home');
        }

        if($this->session->userdata('myStatus')== '0'){
            redirect('ChangePassword');
        } 
        if (!$this->session->userdata('selectedMonth')) {
            $curr_date = date('d-m-Y');
            $monthNumber = date("m", strtotime($curr_date));
            $this->session->set_userdata('selectedMonth', $monthNumber);
        }

        if (!$this->session->userdata('selectedMonthYear')) {
            $curr_date = date('d-m-Y');
            $monthYear = date("Y", strtotime($curr_date));
            $this->session->set_userdata('selectedMonthYear', $monthYear);
        } 
        
        
        
        if (isset($_POST['leftArrowBtn'])) {
            $selectedMonthLeft = $this->session->userdata('selectedMonth');
            $selectedMonthYearLeft = $this->session->userdata('selectedMonthYear');
            
            $selectedMonthYearLeft = intval($selectedMonthYearLeft);
            $previousMonthData = get_previous_month($selectedMonthLeft, $selectedMonthYearLeft);
        
            $this->session->set_userdata('selectedMonth', $previousMonthData['month']);
            $this->session->set_userdata('selectedMonthYear', $previousMonthData['year']);            
        }

        if (isset($_POST['rightArrowBtn'])) {
            $selectedMonthRight = $this->session->userdata('selectedMonth');
            $selectedMonthYearRight = $this->session->userdata('selectedMonthYear');

            $selectedMonthRight = intval($selectedMonthRight);
            $selectedMonthYearRight = intval($selectedMonthYearRight);
            $nextMonthData = get_next_month($selectedMonthRight, $selectedMonthYearRight);
        
            $this->session->set_userdata('selectedMonth', $nextMonthData['month']);
            $this->session->set_userdata('selectedMonthYear', $nextMonthData['year']);

    
        }

        $selectedStartNEndDate = getStartAndEndDateOfMonth((int)$this->session->userdata('selectedMonth'),(int)$this->session->userdata('selectedMonthYear'));
        
        $selectedStartDate = $selectedStartNEndDate['start_date'];
        $selectedEndDate = $selectedStartNEndDate['end_date'];
     
        $this->session->set_userdata('startDate',$selectedStartDate);
        $this->session->set_userdata('endDate',$selectedEndDate);
   
       
        $monthDates = get_dates_for_month((int)$this->session->userdata('selectedMonth'),(int)$this->session->userdata('selectedMonthYear'));
        $data['monthDates'] = $monthDates;
        

        $startDate = $this->session->userdata('startDate');
        $endDate = $this->session->userdata('endDate');
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
        $this->load->view('monthlyRecord.php', $data);
        $this->load->view('Template/footer3.php');
    }


    
}