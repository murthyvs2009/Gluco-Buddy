<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
    
    public function loginSeeIfEmailExists($emailId){
        $this->db->select('email');
        $this->db->from('tbl_users');
        $this->db->where('email', $emailId);
        
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }




    public function isvalidate($email5,$password5){
        $query9=$this->db->where(['email'=>$email5 ,'password'=>$password5])
                        ->get('tbl_users');
                        if($query9->num_rows()){
                            return TRUE;
                        }
                        else{
                            return FALSE;
                        }

        
    }



    public function getPassByEmail($email8){
        $this->db->select('password');
        $this->db->from('tbl_users');
        $this->db->where('email',$email8);
        //$userId=$this->db->get();
        //return $userId->result();
     
        $query5 = $this->db->get();
        if($query5->num_rows()>0) {
        $data5 = $query5->row_array();
        $userPass = $data5['password'];
        return $userPass;
        }
        else{
        return false;
        }
    }
    


    public function checkPassTrueFalse($email_Id,$md5pass){
        $multipleCIWhere = ['email' => $email_Id, 'password' => $md5pass];
        $this->db->select('id');
        $this->db->from('tbl_users');
        $this->db->where($multipleCIWhere);
        $query4 = $this->db->get();
        if($query4->num_rows() > 0){
            return True;
        }
        else{
            return False;
        }
        
    }


public function getUsersData (){
        $myArr= $this->db->get('tbl_users');
        return $myArr->result();
     }

     public function getMainData($id) {
        $this->db->where('ownerId', $id);
        $query = $this->db->get('tbl_main');
        
        return $query->result();
    }
    





public function getId($length){
    $alphacode = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, $length);
    return $alphacode;
}

public function getUniqueId($table,$field,$length){
    $code=$this->getId($length);
    $this->db->select($field);
    $this->db->from($table);
    $this->db->where($field, $code);

    $query1=$this->db->get();
    if($query1->num_rows()){
        return $this->getUniqueId($table,$field,$length);
    }
    else{
        return $code;
    }

}


    



public function GBUserUpdateData($userUpdateInfo){
        $id=$userUpdateInfo['id'];
        $password=$userUpdateInfo['password'];
        $status=$userUpdateInfo['status'];
        $this->db->where('id',$id);
        $data = array('password' => $password,'status' => $status);
        $this->db->update('tbl_users',$data);

    }

    
    public function configureSmtp() {
        $smtpEmail = SMTPEMAIL;
        $smtpPass = SMTPPASS;
    
        $config['protocol']    = 'mail';
        $config['smtp_host']    = 'smtp.gmail.com';
        $config['smtp_port']    = 587;
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = $smtpEmail;
        $config['smtp_pass']    = $smtpPass;
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
    
        $this->email->initialize($config);
    }
    
    public function sendMail($toEmail, $subj, $message) {
        $fromemail = "murthyvs2009@gmail.com";
        $fromName = "Cyberbee.in";
        $givenmail = $toEmail;
    
        $this->email->from($fromemail, $fromName);
        $this->email->to($givenmail);
        $this->email->subject($subj);
        $this->email->message($message);
    
        $this->email->send();
    
        return $this->email->print_debugger();
    }

    public function sendMail2($fromemail,$fromPhone,$subj,$message) {
        $toemail = "murthyvs2009@gmail.com";
        $toName = "Cyberbee.in";
    
        $this->email->from($fromemail,$fromName);
        $this->email->to($toemail);
        $this->email->subject($subj);
        $this->email->message($message);
    
        $this->email->send();
    
        return $this->email->print_debugger();
    }
    


        public function getUsersIdByEmail($emailAddress){
            $this->db->select('id');
            $this->db->from('tbl_users');
            $this->db->where('email',$emailAddress);
            //$userId=$this->db->get();
            //return $userId->result();
         
            $query10 = $this->db->get();
            if($query10->num_rows()>0) {
            $data10 = $query10->row_array();
            $userId10 = $data10['id'];
            return $userId10;
            }
            else{
            return false;
            }
        }

        public function getStatusById($id){
            $this->db->select('status');
            $this->db->from('tbl_users');
            $this->db->where('id',$id);
            //$userId=$this->db->get();
            //return $userId->result();
         
            $query70 = $this->db->get();
            if($query70->num_rows()>0) {
            $data70 = $query70->row_array();
            $userId70 = $data70['status'];
            return $userId70;
            }
            else{
            return false;
            }
        }

        
 
        public function fpSeeIfEmailExists($email){
            $this->db->select('email');
            $this->db->from('tbl_users');
            $this->db->where('email',$email);
            $query6=$this->db->get();
            if($query6->num_rows()>0){
                return true;
            }
            else{
                return false;
            }
    
        }


    public function getPassById($sesId){
        $this->db->select('password');
        $this->db->from('tbl_users');
        $this->db->where('id',$sesId);
        //$userId=$this->db->get();
        //return $userId->result();
     
        $query12 = $this->db->get();
        if($query12->num_rows()>0) {
        $data12 = $query12->row_array();
        $userPass = $data12['password'];
        return $userPass;
        }
        else{
        return false;
        }
    }
    




function SignupInsertData($SignupInsertData){
        $this->db->insert('tbl_users',$SignupInsertData);
    }

   
    
}

?>