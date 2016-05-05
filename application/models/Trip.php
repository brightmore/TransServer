<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Trip
 *
 * @author bright
 */
class Trip extends CI_Model {
   
    private $table = 'trip';
    private $today = null;
    const NO_SEAT = "NO_SEAT";
    const SEAT = "SEAT";
    const ERROR = "ERROR";

    public function __construct() {
        parent::__construct();
        
        $this->today = date('d-M-Y',  time());
        $this->load->model('Terminals');
    }
    
    public function reserve_seat($data){
        $from_code = $data['terminal_from_code'];
        
        $total_seats = (int)$this->Terminals->total_seats($from_code);
        $total_seats_booked = (int)$this->total_booked_today($from_code);
        
        if($total_seats_booked >= $total_seats){
            return Trip::NO_SEAT;
        }
        
        $data['today'] = $this->today;
        $data['date_created'] = time();
        
        $this->db->insert($this->table,$data);
        if($this->db->insert_id()){
            return Trip::SEAT;
        }
        
        return Trip::ERROR;
    }
    
    public function trip_today($terminal_code,$offset=0,$limit=50){
       
         $query = $this->db->select('*')
                 ->from($this->table)
                 ->where('today',  $this->today)
                 ->where('terminal_code_from',$terminal_code)
                 ->limit($limit, $offset)
                 ->get();
         
         $data = null;
         if($query->num_rows() > 0){
             $data = $query->result();
             $query->free_result();
         }
         
         return $data;
    }
    
    public function change_session($user_code,$session){
        
        $this->db->set('session',$session);
        $this->db->where('today',  $this->today);
        $this->db->where('user_code',$user_code);
        $this->db->update();
        
        if($this->db->affected_rows()){
            return TRUE;
        }
            
        return false;
    }
    
    public function change_session_by_date($user_code,$receipt_code){
        
    }
    
    public function issue($receipt_code,$user_code){
        $this->db->set('issued',1);
        $this->db->where('user_code',$user_code);
        $this->db->where('receipt',$receipt_code);
        $this->db->where('today',  $this->today);
        $this->db->update();
        
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        
        return false;
    }
    
    function cancel_trip($receipt_code,$user_code){
        $this->db->set('cancel','1');
        $this->db->where('receipt_code',$receipt_code);
        $this->db->where('user_code',$user_code);
        $this->db->from($this->table);
        $this->db->update();
        return ($this->db->affected_rows() > 0)? true:FALSE;
    }
    
    function remove_cancel_trips(){
        $this->db->where('cancel',1);
        $this->db->from($this->table);
        $this->db->delete();
        
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
                
        return false;
    }
    
    public function total_booked_today($code){
        $today = date('d-M-Y',  time());
        
        $query = $this->db->select("sum(total_seats_booked) AS total_seats_booked")
                 ->from($this->table)
                ->group_by('today')
                ->having('today',$today)
                ->having('terminal_code_from',$code)
                ->get()
                ->row();
        return $query->total_seats_booked;
    }
}
