<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestModel extends CI_Model {
    
public function getUsersData (){
        $myArr= $this->db->get('tbl_users');
        return $myArr->result();
     }

    }

?>