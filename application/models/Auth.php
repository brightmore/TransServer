<?php

/**
 * Description of Auth
 *
 * @author bright
 */
class Auth extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    function login($username,$password,$type){
        try {
            $password = sha1($password);
            $where= array('name'=>$username,'password'=>$password);
            
//            if($this->__isBlock($username, $password, $type)){
//                return false;
//            }
            
            $this->db->select('name');
            $this->db->from($type);
            $this->db->where($where);
            $this->db->limit(1);
            $q = $this->db->get();
            
            if($q->num_rows() > 0){
                return TRUE;
            }
            return false;
            
        } catch (Exception $ex) {
            
        }
    }
    
    function isBlock($username,$password,$type){
        $query = $this->db->query('SELECT * FROM ? WHERE (name = ? AND password = ?) AND block = 0',[$type,$username,$password]);
        if($query->now_rows() > 0){ //counsellor is not blocked
            return false;
        }else{
            return TRUE;
        }
    }
    
    function create_account($name,$password,$email,$age,$gcm,$phone,$region,$type){
        $type = strtolower($type);
            $db_table = NULL;
            $data = array();
            switch ($type){
            case 'counsellor':
                $db_table = 'counsellor';
                $data['email'] = $email;
                $data['password'] = sha1($password);
                $data['gms_id'] = $gcm;
                $data['name'] = $name;
                $data['region'] = $region;
                $data['phone'] = $phone;
                break;
            case 'user':
                $db_table = 'members';
                $data['email'] = $email;
                $data['password'] = sha1($password);
                $data['gms_id'] = $gcm;
                $data['name'] = $name;
                $data['region'] = $region;
                $data['phone'] = $phone;
                $data['age'] = $age;
                break;
            case 'administration':
                $db_table = 'administration';
                $data['email'] = $email;
                $data['password'] = sha1($password);
                $data['name'] = $name;
                break;
                    
            }
            
            if($type == NULL){
                return false; //No proper type was provided
            }
            
            $this->db->insert($db_table,$data);
            if($this->db->affected_rows() > 0){
                return TRUE;
            }
            
            return false;
    }
    
    function changePassword($id,$newpassword,$oldpassword,$who){
        
        $table = null;
        switch ($who){
            case "counsellors":
                $table = 'counsellors';
                break;
            case "members":
                $table = 'members';
                break;
            case "administration":
                $table = 'administration';
                break;
        }
        
        if($table == NULL){
            return 0; //
        }
        
         //check if the old password exist
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where(array('id'=>$id,'password'=>  sha1($oldpassword)));
        $query = $this->db->get();
        
        if($query->num_rows() == 0){ // if there is no match
            return -1;
        }
        
        
        $this->db->update($table,array('password'=>  sha1($newpassword)),array('id'=>$id));
        if($this->db->affected_rows() > 0){
            return 1;
        }
        
        return 2;
        
    }
    
    function forgotPassword_get($id,$who){
        
    }
    
    
    function block($counsellor_id,$user_id,$who){
        $update = array();
        $where = array('counsellor_id'=>$counsellor_id,'user_id'=>$user_id);
        if($who === 'counsellor'){
            $update['block_counsellor'] = 1; 
        }else{
            $update['block_user'] = 1;
        }
        
        $this->db->update('counsellors_users',$update,$where);
        if($this->db->affected_rows() > 0){
         return TRUE;   
        }
        
        return FALSE;
    }
    
    function remove_counseller($counsellor_id){
        $where = array('counsellor_id'=>$counsellor_id);
        
        $this->db->delete('counsellors',$where);
        if($this->db->affected_rows() > 0){
            return true;
        }
        
        return FALSE;
    }
    
    
}
