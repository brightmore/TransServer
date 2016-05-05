<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Terminals
 *
 * @author bright
 */
class Terminals extends CI_Model{
    
    private $table = 'terminal';


    public function __construct() {
        parent::__construct();
    }
    
    public function total_seats($terminal_code){
        $seats = $this->db->select('seats')
                ->from($this->table)
                ->where('code',$terminal_code)
                ->get()->row()->seats;
        return $seats;
    }
    
    public function add_terminal($data){
        $this->db->insert($this->table,$data);
        return $this->db->insert_id() ? true:FALSE;
    }
    
    public function edit_terminal($data,$terminal_code){
        $this->db->update($this->table,$data,array('terminal_code'=>$terminal_code));
        return ($this->db->affected_rows() > 0) ? TRUE:FALSE;
    }
    
}
