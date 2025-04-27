<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class WeeklyRecord extends Basecontroller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('MainModel');
        $this->load->model('UserModel');
        $this->load->helper('general');
        $this->load->helper('date_helper');
      
    }

    public function unsetSelectedWeek(){
        $this->session->unset_userdata('selectedWeek');
        $this->session->unset_userdata('selectedYear');
    }

  

    public function index() {

        if ($this->session->userdata('LogIn') !== '1') {
            redirect('Home');
        }
        if($this->session->userdata('myStatus')== '0'){
            redirect('ChangePassword');
        }
        if (!$this->session->userdata('selectedWeek')) {
            $curr_date = date('d-m-Y');
            $weekNumber = date("W", strtotime($curr_date));
            $this->session->set_userdata('selectedWeek', $weekNumber);
        }
        
        if (!$this->session->userdata('selectedYear')) {
            $curr_date = date('d-m-Y');
            $weekYear = date("Y", strtotime($curr_date));
            $this->session->set_userdata('selectedYear', $weekYear);
        }         
        
        if (isset($_POST['leftArrowBtn'])) {
            $selectedWeekLeft = $this->session->userdata('selectedWeek');
            $selectedYearLeft = $this->session->userdata('selectedYear');
            
            $selectedYearLeft = intval($selectedYearLeft);
            $previousWeekData = get_previous_week($selectedWeekLeft, $selectedYearLeft);
        
            $this->session->set_userdata('selectedWeek', $previousWeekData['week']);
            $this->session->set_userdata('selectedYear', $previousWeekData['year']);            
        }

        if (isset($_POST['rightArrowBtn'])) {
            $selectedWeekRight = $this->session->userdata('selectedWeek');
            $selectedYearRight = $this->session->userdata('selectedYear');

            $selectedWeekRight = intval($selectedWeekRight);
            $selectedYearRight = intval($selectedYearRight);
            $nextWeekData = get_next_week($selectedWeekRight, $selectedYearRight);
        
            $this->session->set_userdata('selectedWeek', $nextWeekData['week']);
            $this->session->set_userdata('selectedYear', $nextWeekData['year']);

    
        }


        $selectedStartNEndDate = getStartAndEndDateOfWeek($this->session->userdata('selectedWeek'),(int)$this->session->userdata('selectedYear'));
        
        $selectedStartDate = $selectedStartNEndDate['start_date'];
        $selectedEndDate = $selectedStartNEndDate['end_date'];
     
        $this->session->set_userdata('startDate',$selectedStartDate);
        $this->session->set_userdata('endDate',$selectedEndDate);
   

        $weekDates = get_dates_for_week((int)$this->session->userdata('selectedWeek'),(int)$this->session->userdata('selectedYear'));
        $data['weekDates'] = $weekDates;
        

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
        $this->load->view('weeklyRecord.php', $data);
        $this->load->view('Template/footer3.php');
    }


    
}