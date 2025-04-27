<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {

    public function getValuesByTypeAndDateRange($ownerId, $startDate, $endDate) {
        $this->db->select('type, value'); 
        $this->db->where('ownerId', $ownerId);
        $this->db->where('date_main >=', $startDate);
        $this->db->where('date_main <=', $endDate);
        $this->db->group_by('type');
        $query = $this->db->get('tbl_main');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array(); // Return an empty array if no results found
        }
    }
    public function getMaxValueForType($ownerId, $type, $startDate, $endDate) {
        $this->db->select_max('value');
        $this->db->from('tbl_main');
        $this->db->where('ownerId', $ownerId);
        $this->db->where('date_main >=', $startDate);
        $this->db->where('date_main <=', $endDate);
        $this->db->where('type', $type);
    
        $query = $this->db->get();
        $result = $query->row();
    
        return $result; 
    }

    

    public function get_fpg_and_date_values_by_owner($ReportStartDate, $ReportEndDate, $ownerId) {
        $this->db->select('value, date_main, type');
        $this->db->from('tbl_main');
 
        $this->db->where('ownerId', $ownerId);
        $this->db->where('type', 'FPG');

        $this->db->where('date_main >=', $ReportStartDate);
        $this->db->where('date_main <=', $ReportEndDate);

        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }



    public function get_ppg_and_date_values_by_owner($ReportStartDate, $ReportEndDate, $ownerId) {
        $this->db->select('value, date_main, type');
        $this->db->from('tbl_main');
 
        $this->db->where('ownerId', $ownerId);
        $this->db->where('type', 'PPG');

        $this->db->where('date_main >=', $ReportStartDate);
        $this->db->where('date_main <=', $ReportEndDate);

        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }



    public function get_random_and_date_values_by_owner($ReportStartDate, $ReportEndDate, $ownerId) {
        $this->db->select('value, date_main, type');
        $this->db->from('tbl_main');
 
        $this->db->where('ownerId', $ownerId);
        $this->db->where('type', 'Rando');

        $this->db->where('date_main >=', $ReportStartDate);
        $this->db->where('date_main <=', $ReportEndDate);

        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }



    public function getMinValueForType($ownerId, $type, $startDate, $endDate) {
        $this->db->select_min('value');
        $this->db->from('tbl_main');
        $this->db->where('ownerId', $ownerId);
        $this->db->where('date_main >=', $startDate);
        $this->db->where('date_main <=', $endDate);
        $this->db->where('type', $type);
    
        $query = $this->db->get();
        $result = $query->row();
    
        return $result; 
    }
    
    

    public function InsertGlucotData($data){
        $this->db->insert('tbl_main', $data);
    }

    public function subtract_days_from_date($original_date, $days_to_subtract) {
        $date = new DateTime($original_date);
        $date->sub(new DateInterval("P{$days_to_subtract}D"));
        $result_date = $date->format('d-m-Y');
        return $result_date;
    }

    public function EditInsertData($EditInsertData){
        $this->db->insert('tbl_main',$EditInsertData);
    }

    public function hasValueInDateRangeAndType($ownerId, $startDate, $endDate, $type) {
        // Specify your table name
        $tableName = 'tbl_main';

        // Build the query to check for a value in the specified date range and type
        $this->db->from($tableName);
        $this->db->where('ownerId', $ownerId);
        $this->db->where('type', $type);
        $this->db->where('date_main >=', $startDate);
        $this->db->where('date_main <=', $endDate);

        // Execute the query
        $query = $this->db->get();

        // Check if there are any rows returned
        return ($query->num_rows() > 0);
    }

    public function getSumByTypesAndDateRange($ownerId, $type, $startDate, $endDate) {
        // Select only the specified column from the table
        $this->db->select('value');

        // Conditions for ownerId, date range, and type
        $this->db->where('ownerId', $ownerId);
        $this->db->where('date_main >=', $startDate);
        $this->db->where('date_main <=', $endDate);
        $this->db->where('type', $type);

        // Get results from the table
        $query = $this->db->get('tbl_main');

        if ($query->num_rows() > 0) {
            $result = $query->result_array();

            // Initialize total sum
            $totalSum = 0;

            foreach ($result as $row) {
                $totalSum += $row['value'];
            }

            return $totalSum;
        } else {
            return 0; // No records found
        }
    }

    public function countRecordsByType($ownerId, $startDate, $endDate, $specificType) {
        $this->db->where('ownerId', $ownerId);
        $this->db->where('date_main >=', $startDate);
        $this->db->where('date_main <=', $endDate);
        $this->db->where('type', $specificType);
        $query = $this->db->get('tbl_main');

        return $query->num_rows();
    }


    public function getMainData($startDate, $endDate, $ownerId) {
        $this->db->select('date_main, type, value');
        $this->db->from('tbl_main');
        $this->db->where('ownerId', $ownerId);
        
        $this->db->where('date_main >=', $startDate);
        $this->db->where('date_main <=', $endDate);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


    public function deleteRecordsByDateAndOwnerId($date, $ownerId) {
        $this->db->where('date_main', $date);
        $this->db->where('ownerId', $ownerId);
 
        if ($this->db->delete('tbl_main')) {
            return true;
        } else {
            return false;
        }
    }

public function getValueByDateOwnerType($date, $ownerId, $type) {
        $this->db->select('value');
        $this->db->where('date_main', $date);
        $this->db->where('ownerId', $ownerId);
        $this->db->where('type', $type);

        $query = $this->db->get('tbl_main');

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->value;
        } else {
            return null;
        }
    }


    public function getDateFromMain($ownerId, $field, $recordId) {
        $this->db->select($field);
        $this->db->where('ownerId', $ownerId);
        $this->db->where('id', $recordId);
        $query = $this->db->get('tbl_main');
    
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->$field; 
        } else {
            return null;
        }
    }
    

    public function subtract_one_month_from_date($original_date) {
        $date = new DateTime($original_date);
        $date->sub(new DateInterval("P1M"));
        $result_date = $date->format('d-m-Y');
        return $result_date;
    }


    public function getIdByDateAndOwnerId($date, $ownerId) {
        $this->db->select('id');
        $this->db->from('tbl_main');
        $this->db->where('date_main', $date);
        $this->db->where('ownerId', $ownerId);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id;
        }

        return null;
    }
    
    public function getOldestDate() {
        $this->db->select('MIN(date_main) as oldest_date');
        $this->db->from('tbl_main');
        $query = $this->db->get();
    
        if ($this->db->error()) {
            // handle the error, log it, or return an appropriate value
            return null;
        }
    
        $result = $query->row();
    
        if ($result) {
            return $result->oldest_date;
        } else {
            return null;
        }
    }
    
    public function getNewestDate() {
        $this->db->select('MAX(date_main) as newest_date');
        $this->db->from('tbl_main');
        $query = $this->db->get();
    
        if ($this->db->error()) {
            // handle the error, log it, or return an appropriate value
            return null;
        }
    
        $result = $query->row();
    
        if ($result) {
            return $result->newest_date;
        } else {
            return null;
        }
    }
        
        
    public function getOldestDateMonth() {
        $this->db->select('MIN(date_main) as oldest_date');
        $this->db->from('tbl_main');
        $query = $this->db->get();

        $result = $query->row();

        if ($result) {
            return $result->oldest_date;
        } else {
            return null;
        }
    }
    
    public function testMethod($input)
    {
        return $input;
    }

    public function hasRecordsForDate($ownerId, $date) {
        $this->db->where('ownerId', $ownerId);
        $this->db->where('date_main', $date);
        $this->db->from('tbl_main');
        $numRows = $this->db->count_all_results();
    
        return $numRows > 0;
    }

    public function hasRecordWithType($userId, $date) {
        $this->db->select('type');
        $this->db->from('tbl_main');
        $this->db->where('ownerId', $userId);
        $this->db->where('date_main', $date);
    
        $query = $this->db->get();
    
        return $query->num_rows() > 0;
    }
    

    public function getValueByDateTypeAndOwner($ownerId, $date, $type) {
        $query = $this->db
            ->select('value')
            ->from('tbl_main')
            ->where('ownerId', $ownerId)
            ->where('date_main', $date)
            ->where('type', $type)
            ->get();
    
        if ($this->db->error()['code'] != 0) {
            log_message('error', 'Database Error: ' . $this->db->error()['message']);
            return null;
        }
    
        return $query->row()?->value ?? null;
    }
    
    

    public function printDates($start_date, $end_date) {
        $start_date = new DateTime($start_date);
        $end_date = new DateTime($end_date);
        $interval = new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $end_date->modify('+1 day'));
    
        $dates = array();
        foreach ($date_range as $date) {
            $dates[] = $date->format('d-m-Y');
        }
    
        return $dates;
    }


}