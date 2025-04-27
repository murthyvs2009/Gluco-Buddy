<?php
function alphaNumericCode(){
    $alphacode = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 8);
    return $alphacode;  

}
function alphaNumericCode2(){
    $alphacode = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 6);
    return $alphacode;  

}
/*
function compareByTimeStamp($a, $b) {
    // Assuming each element of $reportRecordDates is an array or object with a 'timestamp' key
    return $a['timestamp'] - $b['timestamp']; // Adjust based on your data structure
}
*/

if (!function_exists('emailFunctionFP')) {
    function emailFunctionFP($userEmail, $subject, $messageContent) {
        // Get the CodeIgniter instance
        $CI =& get_instance(); 
        
        // Load the email library
        $CI->load->library('email');
        
        // Configure the email settings (you can configure it in email.php config file)
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'murthyvs2009@gmail.com', // Your email address (sender)
            'smtp_pass' => 'liey knqa tvhr itri',  // Your email password or app password
            'smtp_crypto' => 'tls',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'newline'  => "\r\n",  
        );
        
        // Initialize email library with config
        $CI->email->initialize($config);
        
        // Set the email properties
        $CI->email->from('murthyvs2009@gmail.com','Glucobuddy,Cyberbee.in' ); // Set the sender's email (the user's email)
        $CI->email->to($userEmail); // Set the recipient's email (your email address)
        $CI->email->subject($subject); // Set the subject of the email
        $CI->email->message($messageContent); // Set the email body content
        
        // Send the email and check for success
        if ($CI->email->send()) {
            return true; // Email sent successfully
        } else {
            // Print or log the debug output to help diagnose the issue
            echo "Email sending failed: " . $CI->email->print_debugger();
            return false;
        }
    }
}


if (!function_exists('emailFunctionSignUp')) {
    function emailFunctionSignUp($userEmail, $subject, $messageContent) {
        // Get the CodeIgniter instance
        $CI =& get_instance(); 
        
        // Load the email library
        $CI->load->library('email');
        
        // Configure the email settings (you can configure it in email.php config file)
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'murthyvs2009@gmail.com', // Your email address (sender)
            'smtp_pass' => 'liey knqa tvhr itri',  // Your email password or app password
            'smtp_crypto' => 'tls',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'newline'  => "\r\n",  
        );
        
        // Initialize email library with config
        $CI->email->initialize($config);
        
        // Set the email properties
        $CI->email->from('murthyvs2009@gmail.com','Glucobuddy,Cyberbee.in'); // Set the sender's email (the user's email)
        $CI->email->to($userEmail); // Set the recipient's email (your email address)
        $CI->email->subject($subject); // Set the subject of the email
        $CI->email->message($messageContent); // Set the email body content
        
        // Send the email and check for success
        if ($CI->email->send()) {
            return true; // Email sent successfully
        } else {
            // Print or log the debug output to help diagnose the issue
            echo "Email sending failed: " . $CI->email->print_debugger();
            return false;
        }
    }
}




function getStartAndEndDateOfWeek($week, $year) {
    $dto = new DateTime();
    $dto->setISODate($year, $week);
    $start = $dto->format('Y-m-d');
    $dto->modify('+6 days');
    $end = $dto->format('Y-m-d');

    return [
        'start_date' => $start,
        'end_date' => $end
    ];
}

function get_previous_month($selectedMonthLeft, $selectedMonthYearLeft) {
    $selectedMonthLeft = intval($selectedMonthLeft);
    $selectedMonthYearLeft = intval($selectedMonthYearLeft);

    if ($selectedMonthLeft == 1) {
        $previousMonth = 12;
        $previousYear = $selectedMonthYearLeft - 1;
    } else {
        $previousMonth = $selectedMonthLeft - 1;
        $previousYear = $selectedMonthYearLeft;
    }

    return array('month' => $previousMonth, 'year' => $previousYear);
}


function get_previous_week($selectedWeekLeft, $selectedYearLeft) {
    $selectedWeekLeft = intval($selectedWeekLeft);
    $selectedYearLeft = intval($selectedYearLeft);

    if ($selectedWeekLeft == 1) {
        $previousYear = $selectedYearLeft - 1;
        $previousWeek = (int) (new DateTime("{$previousYear}-12-28"))->format("W");
    } else {
        $previousWeek = $selectedWeekLeft - 1;
        $previousYear = $selectedYearLeft;
    }

    // Adjust to Sunday-Saturday week format
    $date = new DateTime();
    $date->setISODate($previousYear, $previousWeek, 7); // Sunday of the previous week
    $startDate = $date->format('Y-m-d');
    $date->modify('+6 days'); // Saturday of the previous week
    $endDate = $date->format('Y-m-d');

    return array('week' => $previousWeek, 'year' => $previousYear, 'start_date' => $startDate, 'end_date' => $endDate);
}



function get_next_week($selectedWeekRight, $selectedYearRight) {
    $selectedWeekRight = intval($selectedWeekRight);
    $selectedYearRight = intval($selectedYearRight);

    $totalWeeks = (int) (new DateTime("{$selectedYearRight}-12-28"))->format("W");

    if ($selectedWeekRight >= $totalWeeks) {
        $nextWeek = 1;
        $nextYear = $selectedYearRight + 1;
    } else {
        $nextWeek = $selectedWeekRight + 1;
        $nextYear = $selectedYearRight;
    }

    // Adjust to Sunday-Saturday week format
    $date = new DateTime();
    $date->setISODate($nextYear, $nextWeek, 7); // Sunday of the next week
    $startDate = $date->format('Y-m-d');
    $date->modify('+6 days'); // Saturday of the next week
    $endDate = $date->format('Y-m-d');

    return array('week' => $nextWeek, 'year' => $nextYear, 'start_date' => $startDate, 'end_date' => $endDate);
}

function get_previous_year($selectedYearYearLeft) {
    $selectedYearYearLeft = intval($selectedYearYearLeft);
    $previousYear = $selectedYearYearLeft - 1;
    return $previousYear;
}

function get_next_year($selectedYearYearRight) {
    $selectedYearYearRight = intval($selectedYearYearRight);
    $nextYear = $selectedYearYearRight + 1;
    return $nextYear;
}



function get_next_month($selectedMonthRight, $selectedMonthYearRight) {
    $selectedMonthRight = intval($selectedMonthRight);
    $selectedMonthYearRight = intval($selectedMonthYearRight);

    if ($selectedMonthRight == 12) {
        // If it's December, move to January of the next year
        $nextMonth = 1;
        $nextYear = $selectedMonthYearRight + 1;
    } else {
        $nextMonth = $selectedMonthRight + 1;
        $nextYear = $selectedMonthYearRight;
    }

    return array('month' => $nextMonth, 'year' => $nextYear);
}



function get_dates_for_week($selectedWeek, $selectedYear) {
    $dto = new DateTime();
    $dto->setISODate($selectedYear, $selectedWeek);
    
    $weekDates = [];
    for ($i = 0; $i < 7; $i++) {
        $weekDates[] = $dto->format('Y-m-d');
        $dto->modify('+1 day');
    }

    return $weekDates;
}

if (!function_exists('getStartAndEndDateOfYear')) {
    function getStartAndEndDateOfYear($selectedYear) {
        return array(
            'start_date' => date('Y-m-d', strtotime("$selectedYear-01-01")),
            'end_date'   => date('Y-m-d', strtotime("$selectedYear-12-31"))
        );
    }
}

if (!function_exists('get_dates_for_year')) {
    function get_dates_for_year($selectedYear) {
        $dates = array();
        $startDate = strtotime("$selectedYear-01-01");
        $endDate = strtotime("$selectedYear-12-31");

        for ($currentDate = $startDate; $currentDate <= $endDate; $currentDate += 86400) { 
            $dates[] = date('Y-m-d', $currentDate);
        }

        return $dates;
    }
}


/*

function getStartAndEndDateOfWeek($weekNumber, $year) {
    $startDate = date('Y-m-d', strtotime($year . "W" . str_pad($weekNumber, 2, '0', STR_PAD_LEFT)));
    $endDate = date('Y-m-d', strtotime($startDate . ' +6 days'));
    return ['start_date' => $startDate, 'end_date' => $endDate];
}

*/

function getStartAndEndDateOfMonth($selectedMonth, $selectedYear) {
    $startDate = date('Y-m-d', mktime(0, 0, 0, $selectedMonth, 1, $selectedYear));
    $endDate = date('Y-m-d', mktime(0, 0, 0, $selectedMonth + 1, 0, $selectedYear));
    return ['start_date' => $startDate, 'end_date' => $endDate];
}

function get_dates_for_month($selectedMonth, $selectedYear) {
    $dates = [];
    $numDays = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $selectedYear);
    for ($day = 1; $day <= $numDays; $day++) {
        $dates[] = date('Y-m-d', mktime(0, 0, 0, $selectedMonth, $day, $selectedYear));
    }
    return $dates;
}





function getGlucoTblUp() {
    $var='';
    $var.='<div class="container mt-5">';
    $var.='<h1>Main Data</h1>';
    $var.='';
    $var.='<table class="table table-bordered">';
    $var.='<thead>';
    $var.='<tr>';
    $var.='<th>Date</th>';
    $var.='<th>Value</th>';
    $var.='<th>Type</th>';
    $var.='</tr>';
    $var.='</thead>';
    return $var;

}

function getGlucoTblDown($date, $value, $type) {
    $var = '';
    $var .= '<tbody>';
    $var .= '<tr>';
    $var .= '<td>'.$date. '</td>';
    $var .= '<td>' . $value . '</td>';
    $var .= '<td>' . $type . '</td>';
    $var .= '</tr>';
    $var .= '</tbody>';
    $var.='</table>';
    $var.='</div>';

    return $var;
}


    
function messageBox($LogInLink,$LogInName, $LogUserName,$LogPass) {
    $var = '';
    $var .= '<html>';
    $var .= '<body>';
    $var .= '<div style="border-style: solid; max-width:500px; border-color:blue; border-radius:10px;  color:black; margin:0 auto; padding: 10px; background-color: #f5f5f5; ">';
    $var .= '<h4>';
    $var .= 'Hello '.$LogInName;
    $var .= '<br/>';
    $var .= 'Congratulations! Your password has been successfully reset. You can now login by clicking the link below.';
    $var .= '<br>';
    $var .= '<b>Login URL:</b>' . $LogInLink . ' <br/>';
    $var .= '<b>Login Username:</b>' . $LogUserName . ' <br/>';
    $var .= '<b>Temporary Password:</b> ' . $LogPass . ' <br/>';
    $var .= 'You will be required to change your password upon your first login. This is to ensure better security.';
    $var .= '<br/>';
    $var .= '<a href="'.$LogInLink .'">';
    $var .= '<button type="button" style="margin-right:20px; padding: 10px 20px; background-color: #007BFF; color: #FFFFFF; border: none; border-radius: 5px;">Log In</button>';
    $var .= '</a>';
    $var .= '<br/>';
    $var .= 'Thank you <br/>';
    $var .= 'Team Cyberbee';
    $var .= '</h4>';
    $var .= '</div>';
    $var .= '</body>';
    $var .= '</html>';

    return $var;
}

function messageBox2($userEmail,$userPhone, $userSubject,$userMessage) {
    $var = '';
    $var .= '<html>';
    $var .= '<body>';
    $var .= '<div style="border-style: solid; max-width:500px; border-color:blue; border-radius:10px;  color:black; margin:0 auto; padding: 10px; background-color: #f5f5f5; ">';
    $var .= '<h4>';
    $var .= '<br/>';
    $var .= 'Gluco Buddy User Message';
    $var .= '<br>';
    $var .= '<b>User Email:</b>' . $userEmail . ' <br/>';
    $var .= '<b>User Phone:</b>' . $userPhone . ' <br/>';
    $var .= '<b>User Subject:</b> ' . $userSubject . ' <br/>';
    $var .= '<b>User Message:</b> ' . $userMessage . ' <br/>';
    $var .= '<button type="button" style="margin-right:20px; padding: 10px 20px; background-color: #007BFF; color: #FFFFFF; border: none; border-radius: 5px;">Log In</button>';
    $var .= '</a>';
    $var .= '<br/>';
    $var .= 'Thank you <br/>';
    $var .= 'Team Cyberbee';
    $var .= '</h4>';
    $var .= '</div>';
    $var .= '</body>';
    $var .= '</html>';

    return $var;
}



function jsredirectin5($url) {
    $var='';
    $var.='<script type=\'text/javascript\'>';
    $var.='setTimeout(function () {';
    $var.="window.location.href = '".$url."';";
    $var.='},3000); // 3 seconds';
    $var.='</script>';
    $var.='';
    return $var;
    }

    function jsredirectin2($url) {
        $var='';
        $var.='<script type=\'text/javascript\'>';
        $var.='setTimeout(function () {';
        $var.="window.location.href = '".$url."';";
        $var.='}); // 2 seconds';
        $var.='</script>';
        $var.='';
        return $var;
        }

        function jsredirect($url) {
            $var='';
            $var.='<script type=\'text/javascript\'>';
            $var.='setTimeout(function () {';
            $var.="window.location.href = '".$url."';";
            $var.='});';
            $var.='</script>';
            $var.='';
            return $var;
            }


    function alertMsg($langMsgD,$type) {
        $var='';
        $class='';
        if($type=='succ'){
        $class="alert alert-success";
        }
        if($type=='fail'){
        $class="alert alert-danger";
        }
        if($type=='info'){
        $class="alert alert-info";
        }
        $var.='<div class="'.$class.'" role="alert">';
        $var.= $langMsgD;
        $var.='</div>';
        return $var;
    }
    
?>