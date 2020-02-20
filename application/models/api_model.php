<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
	}
  	
	public function apiCall($url, $dataArray, $type, $param){
	    	    
	    //print_r("inside api call");
	    //log_message('debug',print_r('inside apicall', TRUE));
	    //log_message('debug',print_r('method is :'.$type, TRUE));
	    //log_message('debug',print_r('url is :'.$url, TRUE));

	    
	    $this->load->library('session');
	    $ch = curl_init();
	    

	    if ($param == 'REFRESH'){
	        $headers = [
	            'Content-Type: application/json',
	            'Authorization: Bearer '. $dataArray['refresh_token'] .''
	        ];
	    } elseif ($param == 'LOGOUT'){
	        $headers = [
	            'Content-Type: application/json',
	            'Authorization: Bearer '. $this->session->userdata('access_token') .''
	        ];
	        
	    } elseif ($param == 'BEARER'){
	        $headers = [
	            'Content-Type: application/json',
	            'Authorization: Bearer '. $this->session->userdata('access_token') .''
	        ];
	    } else {
	        $headers = [
	            'Content-Type: application/json'
	        ];
	    }
	    
	    
	    
	    if ($type == 'GET'){
	        
	        //log_message('debug',print_r('Inside get method',TRUE));
	        $data = http_build_query($dataArray);
	        $getUrl = $url."?".$data;

	        
	        log_message('debug', print_r('printing url :'.$getUrl, TRUE));
	        log_message('debug', print_r('printing HEADER', TRUE));

	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        curl_setopt($ch, CURLOPT_URL, $getUrl);
            
            log_message('debug', print_r($headers, TRUE));                
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	        
	        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
	        
	    } elseif ($type == 'POST'){
	        	        
	        $data_string = json_encode($dataArray);
	        
	        log_message('debug', print_r('Printing data string after this message', TRUE));
	        log_message('debug', print_r($data_string, TRUE));
	        
	        log_message('debug', print_r('Printing header after this message', TRUE));
	        log_message('debug', print_r($headers, TRUE));
	        
	        
	        curl_setopt($ch, CURLOPT_URL, $url);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	        
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

	        curl_setopt($ch, CURLOPT_POST, TRUE);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	            
	    } elseif ($type == 'PUT'){
	        
	        $data_string = json_encode($dataArray);
	        
	        log_message('debug', print_r('Printing data ARRAY after this message', TRUE));
	        log_message('debug', print_r($data_string, TRUE));
	        
	        log_message('debug', print_r('Printing header after this message', TRUE));
	        log_message('debug', print_r($headers, TRUE));
	        
	        log_message('debug', print_r('Printing URL after this message', TRUE));
	        log_message('debug', print_r($url, TRUE));
	        
	        curl_setopt($ch, CURLOPT_URL, $url);
	        
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        
	        
	        //curl_setopt($ch, CURLOPT_PUT, TRUE);
	        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	        log_message('debug', print_r('here 1', TRUE));
	        log_message('debug', print_r('here 2', TRUE));
	    } elseif ($type == 'DEL'){
	        
	        
	        log_message('debug', print_r('Printing data ARRAY after this message', TRUE));
	        log_message('debug', print_r($dataArray, TRUE));
	        
	        log_message('debug', print_r('Printing header after this message', TRUE));
	        log_message('debug', print_r($headers, TRUE));
	        
	        //$url = sprintf("%s?%s", $url, http_build_query($dataArray));
	        
	        log_message('debug', print_r('Printing URL after this message', TRUE));
	        log_message('debug', print_r($url, TRUE));
	        
	        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	        
	        curl_setopt($ch, CURLOPT_URL, $url);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	        
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        
	    }
	    
	    $response_json = curl_exec($ch);

	    if(curl_error($ch)){
	        //echo 'Request Error:' . curl_error($ch);
	        log_message('debug', print_r('curl execution error', TRUE));
	        log_message('debug', print_r(curl_error($ch), TRUE));
	    }
	    
	    $response = json_decode($response_json, true);
	    log_message('debug', print_r('Printing respone after this message', TRUE));
	    log_message('debug', print_r($response, TRUE));
	    
	    
	    
	    
	    curl_close($ch);
	    
	    return $response_json;
	    
	}
	
	public function set_session_data($result_json, $data, $function){
	    
	    $result_array = array();
	    $result_array = json_decode($result_json, true);
	    
	    $this->load->library('session');
	    
	    
	    log_message('debug',print_r($data,TRUE));
	    log_message('debug',print_r($result_array,TRUE));
	    
	    $response_data = array();
	    $newdata = array();
	    if ($result_array['code'] == 0){

	        if ($function == 'UPDATE_PROFILE'){
	            $newdata['first_name'] = $result_array['data']['user']['first_name'];
	            $newdata['last_name'] = $result_array['data']['user']['last_name'];	            
	            $newdata['email'] = $result_array['data']['user']['email'];
	            
	            $date_of_birth = $result_array['data']['user']['date_of_birth'];
	            
	            $newdata['date_of_birth'] = date("Y-m-d", $date_of_birth);
	            
	            
	        } else {
	            $expire_time = $result_array['data']['token']['created_at'] + $result_array['data']['token']['expires_in'];
	            
	            if (ISSET($data['username'])){
	                $newdata['username'] = $data['username'];
	                $newdata['email'] = $data['username'];
	            } elseif ($this->session->userdata('username')){
	                $newdata['username'] = $this->session->userdata('username');
	                $newdata['email'] = $this->session->userdata('username');
	            }
	            
	            $newdata['logged_in'] = TRUE;
	            $newdata['access_token'] = $result_array['data']['token']['access_token'];
	            $newdata['refresh_token'] = $result_array['data']['token']['refresh_token'];
	            $newdata['token_type'] = $result_array['data']['token']['token_type'];
	            $newdata['created_at'] = $result_array['data']['token']['created_at'];
	            $newdata['expire_time'] = $expire_time;
	            
	        }
	        
	        $this->session->set_userdata($newdata);
	        
	        $response_data['message'] = 'Sucessfuly Set The User Data';
	        
	        log_message('debug',print_r($newdata,TRUE));
	        
	    } else {
	        $response_data['message'] = $result_array['message'];
	    }
	    
	    $response_data['code'] = $result_array['code'];
	    
	    log_message('debug', print_r('Now returning to caller function',TRUE));
	    return $response_data;
	}

	public function unset_session_data($result_json){
	    
	    $result_array = array();
	    $result_array = json_decode($result_json, true);
	    
	    log_message('debug',print_r($result_array,TRUE));
	    
	    $response_data = array();
	    $newdata = array();
	    if ($result_array['code'] == 0){
	        
            $newdata['username'] = 'username';
            $newdata['email'] = 'email';
	        
	        $newdata['logged_in'] = 'logged_in';
	        $newdata['access_token'] = 'access_token';
	        $newdata['refresh_token'] = 'refresh_token';
	        $newdata['created_at'] = 'created_at';
	        $newdata['expire_time'] = 'expire_time';
	        
	        $newdata['first_name'] = 'first_name';
	        $newdata['last_name'] = 'last_name';
	        $newdata['email'] = 'email';
	        $newdata['date_of_birth'] = 'date_of_birth';
	        
	        $this->load->library('session');
	        $this->session->unset_userdata($newdata);
	        
	        $response_data['message'] = 'Sucessfuly Unset the session';
	        
	        log_message('debug',print_r($newdata,TRUE));
	        
	    } else {
	        $response_data['message'] = 'There was an error';
	    }
	    
	    $response_data['code'] = $result_array['code'];
	    
	    log_message('debug', print_r('Now returning to caller function',TRUE));
	    return $response_data;
	}

	
	public function unset_all_data(){
	    
	    log_message('debug', print_r('UNSET ALL DATA, USE DURING DEVELOPMENT ONLY',TRUE));
	    
	        $newdata['username'] = 'username';
	        $newdata['email'] = 'email';
	        
	        $newdata['logged_in'] = 'logged_in';
	        $newdata['access_token'] = 'access_token';
	        $newdata['refresh_token'] = 'refresh_token';
	        $newdata['created_at'] = 'created_at';
	        $newdata['expire_time'] = 'expire_time';
	        
	        $this->load->library('session');
	        $this->session->unset_userdata($newdata);
	        
	        $response_data['message'] = 'Sucessfuly Unset the session';
	        
	        log_message('debug',print_r($newdata,TRUE));
	        
	    
	        log_message('debug', print_r('UNSET ALL DATA, ENDS HERE',TRUE));
	}
	
}
