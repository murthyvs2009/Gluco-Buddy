<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class Main extends Basecontroller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MainModel');
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

        if (isset($_POST['leftArrowBtn'])) {
            $selectedWeekLeft = $this->session->userdata('selectedWeek');
            $selectedYearLeft = $this->session->userdata('selectedYear');
            
            $selectedYearLeft = intval($selectedYearLeft);
            $previousWeekData = get_previous_week($selectedWeekLeft, $selectedYearLeft);
        
            // Update session data
            $this->session->set_userdata('selectedWeek', $previousWeekData['week']);
            $this->session->set_userdata('selectedYear', $previousWeekData['year']);


            if(!$this->session->set_userdata('startDate')){

                $selectedStartNEndDate = getStartAndEndDateOfWeek($selectedWeekLeft, $selectedYearLeft);

                // Access the start and end dates
                $selectedStartDateLeft = $selectedStartNEndDate['start_date'];
                $selectedEndDateLeft = $selectedStartNEndDate['end_date'];
    
                $this->session->set_userdata('startDate',$selectedStartDateLeft);
                $this->session->set_userdata('endDate',$selectedEndDateLeft);

            }
            
        }

        if (isset($_POST['rightArrowBtn'])) {
            $selectedWeekRight = $this->session->userdata('selectedWeek');
            $selectedYearRight = $this->session->userdata('selectedYear');
            
            $nextWeekData = get_next_week($selectedWeekRight, $selectedYearRight);
        
            // Update session data
            $this->session->set_userdata('selectedWeek', $nextWeekData['week']);
            $this->session->set_userdata('selectedYear', $nextWeekData['year']);

            
            if(!$this->session->set_userdata('startDate')){

                $selectedStartNEndDateRight = getStartAndEndDateOfWeek($selectedWeekRight, $selectedYearRight);

                // Access the start and end dates
                $selectedStartDateRight = $selectedStartNEndDateRight['start_date'];
                $selectedEndDateRight = $selectedStartNEndDateRight['end_date'];
    
                $this->session->set_userdata('startDate',$selectedStartDateRight);
                $this->session->set_userdata('endDate',$selectedEndDateRight);

            }
            
        }



        if ($this->MainModel->getOldestDate()) {
            $oldestDate = $this->MainModel->getOldestDate();
            $oldestDateWeek = date('W', strtotime($oldestDate));
            $oldestDateYear = date('Y', strtotime($oldestDate));
            $this->session->set_userdata('oldestDateWeek',$oldestDateWeek);
            $this->session->set_userdata('oldestDateYear',$oldestDateYear);
        }
        
        if (empty($this->session->userdata('selectedWeek'))) {
            $curr_date = date('d-m-Y');
            list($day, $month, $year) = explode('-', $curr_date);
            $weekNumber = date("W", strtotime($curr_date));
            $weekYear = date("Y", strtotime($curr_date));
        
            $this->session->set_userdata('selectedWeek', $weekNumber);
            $this->session->set_userdata('selectedYear', $weekYear);
                    
            $oldestDateWeek = $this->session->userdata('oldestDateWeek');
            $oldestDateYear = $this->session->userdata('oldestDateYear');
            
            if ($oldestDateWeek === null && $oldestDateYear === null) {
                // Get the previous week
                $previousWeekData = get_previous_week($weekNumber, $weekYear);
                
                // Extract week and year from the array
                $oldestDateWeek = $previousWeekData['week'];
                $oldestDateYear = $previousWeekData['year'];
            
                // Set the session values
                $this->session->set_userdata('oldestDateWeek', $oldestDateWeek);
                $this->session->set_userdata('oldestDateYear', $oldestDateYear);
            }
            

            $oldestDateWeekIsNewer=$this->session->userdata('oldestDateWeek');
            $oldestDateYearIsNewer=$this->session->userdata('oldestDateYear');
        
            if ($oldestDateWeekIsNewer !== null && $oldestDateYearIsNewer !== null && isNewerWeek($weekNumber,$weekYear,$oldestDateWeekIsNewer,$oldestDateYearIsNewer)) {
        
                $weekYear = intval($weekYear);
                $startNEndDate = getStartAndEndDateOfWeek($weekNumber, $weekYear);
                $startDate = $startNEndDate['start_date'];
                $endDate = $startNEndDate['end_date'];

                $this->session->set_userdata('startDate', $startDate);
                $this->session->set_userdata('endDate', $endDate);
            }
        }
        
        $weekDates = get_dates_for_week($this->session->userdata('selectedWeek'), $this->session->userdata('selectedYear'));
        $data['weekDates'] = $weekDates;
        

        if (isset($_POST['leftArrowMonth'])) {
            $selectedMonthLeft = $this->session->userdata('selectedMonth');
            $selectedMonthYearLeft = $this->session->userdata('selectedMonthYear');
            

            $selectedMonthLeft = intval($selectedMonthLeft);
            $selectedMonthYearLeft = intval($selectedMonthYearLeft);
            $previousMonthData = get_previous_month($selectedMonthLeft, $selectedMonthYearLeft);
        
            // Update session data
            $this->session->set_userdata('selectedMonth', $previousMonthData['month']);
            $this->session->set_userdata('selectedMonthYear', $previousMonthData['year']);


            if(!$this->session->set_userdata('startDateMonth')){

                $selectedMonthStartNEndDate = getStartAndEndDateOfMonth($selectedMonthLeft, $selectedMonthYearLeft);

                // Access the start and end dates
                $selectedMonthStartDateLeft = $selectedMonthStartNEndDate['start_date'];
                $selectedMonthEndDateLeft = $selectedMonthStartNEndDate['end_date'];
    
                $this->session->set_userdata('startDateMonth',$selectedMonthStartDateLeft);
                $this->session->set_userdata('endDateMonth',$selectedMonthEndDateLeft);

            }
            
        }

        if (isset($_POST['rightArrowMonth'])) {
            $selectedMonthRight = $this->session->userdata('selectedMonth');
            $selectedMonthYearRight = $this->session->userdata('selectedMonthYear');
            
            $nextMonthData = get_next_month($selectedMonthRight, $selectedMonthYearRight);
        
            // Update session data
            $this->session->set_userdata('selectedMonth', $nextMonthData['month']);
            $this->session->set_userdata('selectedMonthYear', $nextMonthData['year']);

            
            if(!$this->session->set_userdata('startDateMonth')){

                $selectedMonthStartNEndDateRight = getStartAndEndDateOfMonth($selectedMonthRight, $selectedMonthYearRight);

                // Access the start and end dates
                $selectedMonthStartDateRight = $selectedMonthStartNEndDateRight['start_date'];
                $selectedMonthEndDateRight = $selectedMonthStartNEndDateRight['end_date'];
    
                $this->session->set_userdata('startDateMonth',$selectedMonthStartDateRight);
                $this->session->set_userdata('endDateMonth',$selectedMonthEndDateRight);

            }
            
        }

        if ($this->MainModel->getOldestDateMonth()) {
            $oldestDate = $this->MainModel->getOldestDateMonth();
            $oldestDateMonth = date('m', strtotime($oldestDate));
            $oldestDateMonthYear = date('Y', strtotime($oldestDate));
            $this->session->set_userdata('oldestDateMonth',$oldestDateMonth);
            $this->session->set_userdata('oldestDateMonthYear',$oldestDateMonthYear);
        }
        
        if (empty($this->session->userdata('selectedMonth'))) {
            $curr_date = date('d-m-Y');
            list($day, $month, $year) = explode('-', $curr_date);
            $monthNumber = date("m", strtotime($curr_date));
            $monthYear = date("Y", strtotime($curr_date));
        
            $this->session->set_userdata('selectedMonth', $monthNumber);
            $this->session->set_userdata('selectedMonthYear', $monthYear);
                    
            $oldestDateMonth = $this->session->userdata('oldestDateMonth');
            $oldestDateMonthYear = $this->session->userdata('oldestDateMonthYear');
            
            if ($oldestDateMonth === null && $oldestDateMonthYear === null) {
                // Get the previous week
                $previousMonthData = get_previous_month($monthNumber, $monthYear);
                
                // Extract week and year from the array
                $oldestDateMonth = $previousMonthData['month'];
                $oldestDateMonthYear = $previousMonthData['year'];
            
                // Set the session values
                $this->session->set_userdata('oldestDateMonth', $oldestDateMonth);
                $this->session->set_userdata('oldestDateMonthYear', $oldestDateMonthYear);
            }
            

            $oldestDateMonthIsNewer = $this->session->userdata('oldestDateMonth');
            $oldestDateMonthYearIsNewer = $this->session->userdata('oldestDateMonthYear');
            
            if ($oldestDateMonthIsNewer !== null && $oldestDateMonthYearIsNewer !== null && isNewerMonth($monthNumber, $monthYear, $oldestDateMonthIsNewer, $oldestDateMonthYearIsNewer)) {
                $monthYear = intval($monthYear);
                $startNEndDateMonth = getStartAndEndDateOfMonth($monthNumber, $monthYear);
                $startDateMonth = $startNEndDateMonth['start_date'];
                $endDateMonth = $startNEndDateMonth['end_date'];
            
                $this->session->set_userdata('startDateMonth', $startDateMonth);
                $this->session->set_userdata('endDateMonth', $endDateMonth);
            }
            
        }
        
        $monthDates = get_dates_for_month($this->session->userdata('selectedMonth'), $this->session->userdata('selectedMonthYear'));
        $data['monthDates'] = $monthDates;


        
       // $data['monthDates'] = $this->MainModel->printDates($this->MainModel->subtract_one_month_from_date($curr_date), $curr_date);


        $this->load->view('Template/header3.php');
        $this->load->view('main.php', $data);
        $this->load->view('Template/footer3.php');
    


}

}