<?php

function random_str($length = 8){
    
$RandomString = substr(str_shuffle(md5(time())), 0, $length);
return $RandomString;
}

function __isString($value){
    if ( isset( $value ) && $value !== NULL ) {
        return TRUE;
    }
    return false;
}

function failureSession(){
    $CI = get_instance();
    if($CI->session->flashdata('failure')){
        echo "<div class='alert alert-danger'>".$CI->session->flashdata('failure')."</div>";
    }
}

function successSession(){
    $CI = get_instance();
    if($CI->session->flashdata('success')){
        echo "<div alert class='alert-success'>".$CI->session->flashdata('success')."</div>";
    }
}

function regions(){
     $region_list = [
         'Greater Accra'=>'Greater Accra Region',
         'Ashanti'=>'Ashanti Region',
         'Brong Ahafo'=>'Brong Ahafo Region',
         'Central'=>'Central Region',
         'Eastern'=>'Eastern Region',
         'Western'=>'Western Region',
         'Northern'=>'Northern Region',
         'Upper West'=>'Upper West Region',
         'Upper East'=>'Upper East Region',
         'volta'=>'Volta Region'
         ];
     
         return $region_list;
}

function get_day_code($day){

    $data['monday'] = 'MON'; 
    $data['tuesday'] = 'TUD';
    $data['wednesday'] = 'WED';
    $data['thursday'] = 'THD';
    $data['friday'] = 'FRD';
    $data['saturday'] = 'SAD';
    $data['sunday'] = 'SUD';

    return $data[strtolower($day)];
}

function angular_post(){
    if (strcasecmp($_SERVER['REQUEST_METHOD'], 'post') === 0 && stripos($_SERVER['CONTENT_TYPE'], 'application/json') !== FALSE) {
    // POST is actually in json format, do an internal translation
        $_POST += json_decode(file_get_contents('php://input'), true);
    }
}