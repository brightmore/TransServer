<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author bright
 */
class Dashboard extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $data['content'] = $this->load->view('index','',TRUE);
        $this->load->view('template',$data);
    }
    
    function users(){
        $data['content'] = $this->load->view('users','',TRUE);
        $this->load->view('template',$data);
    }
    
    function destination(){
        
    }
    
    function history(){
       
    }
    
    function booking(){
        
        $terminal_code = $_SESSION['terminal_code'];
        
        $content['result'] = $this->Trip->trip_today($terminal_code,$offset=0,$limit=50);
    }
    
    function reserve_seat(){
        
        angular_post();
        
        $this->load->helper('string');
        
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('session','Session','trim|required|in_list[morning,afternoon,evening,night]');
        $this->form_validation->set_rules('user_code','User Code','trim|required|max_lenght[45]');
        $this->form_validation->set_rules('bus_type','Bus type','trim|required|in_list[executive,tour]');
        $this->form_validation->set_rules('terminal_to_code','Destination','trim|required');
        $this->form_validation->set_rules('terminal_from_code','From','trim|required');
        $this->form_validation->set_rules('total_seats_booked','Total Seats Booked','trim|required|numeric');
        
        
        if($this->form_validation->run() === FALSE){
            echo json_encode(array('result'=>false,'message'=> validation_errors("<div class='form_error'>","</div>"),'status'=>'form_error')); exit;
        }
        
        $data = array();
        
        $data['password'] = $this->input->post('password');
        $data['session'] = $this->input->post('session');
        $data['user_code'] = $this->input->post('user_code');
        $data['bus_type'] = $this->input->post('bus_type');
        
        $data['terminal_from_code'] = $this->input->post('terminal_form_code');
        $data['terminal_to_code'] = $this->input->post('terminal_to_code');
        $data['total_seats_booked'] = $this->input->post('total_seats_booked');
        
        $day_code = get_day_code(date('l'));
        $random_str = random_string('numeric',6);
        $data['receipt_code'] = $day_code.'-'.'-'.$data['terminal_from_code'].'-'.$random_str;
        
        
       $result = $this->Trip->reserve_seat($data);
       
       if($result === Trip::NO_SEAT){
           echo json_encode(array('result'=>FALSE,'error'=>'No seat available','status'=>  Trip::NO_SEAT)); exit;
       }else if($result === Trip::ERROR){
           echo json_encode(array('result'=>FALSE,'error'=>'Unknown error','status'=>  Trip::ERROR)); exit;
       }else{
           echo json_encode(array('result'=>TRUE));
       }
         
    }
    
    function issued($receipt_code){
        
    }
    
}
