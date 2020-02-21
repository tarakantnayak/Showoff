<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		//$this->load->view('welcome_message');
	    log_message('debug',print_r('Inside index welcome',TRUE));
	    //landing page should display visible widgets
	    $master_data = array();
	    
	    $this->load->library('session');
	    $this->load->model('api_model');
	    
	    $client_id = $this->config->item('client_id');
	    $client_secret = $this->config->item('client_secret');
	    
	   //$this->api_model->unset_all_data();
	    
	    if ($this->session->userdata('username')){ 
	        //user is already logged in. Check if the token is still valid, if not refresh it with refresh token. 
	        //Then display the widgets created by this user. Both visible and hidden

	        log_message('debug', print_r('already logged in:'.$this->session->userdata('username'),TRUE));
	        
	        $expire_time = $this->session->userdata('expire_time');
	        $current_time = date(strtotime(date("Y-m-d h:i:s")));
	        
	        log_message('debug', print_r('expire time:'.$expire_time, TRUE));
	        log_message('debug', print_r('current_time time:'.$current_time, TRUE));
	        	        
	        if ($current_time > $expire_time){	            //refresh the token
	            log_message('debug', print_r('current session has expired in the server, need to refresh',TRUE));
	            $data = array();
	            
	            $data['client_id'] = $client_id;
	            $data['client_secret'] = $client_secret;
	            
	            $data['api'] = 'REFRESH';
	            $data['refresh_token'] = $this->session->userdata('refresh_token');
	            $data['grant_type'] = $this->config->item('refresh_grant_type');
	            
	            //$data['call_from'] = 'refresh_login'; //for debugging purpose
	            
	            $url = $this->config->item('refresh_login');
	            
	            $result_json = $this->api_model->apiCall($url, $data, 'POST', 'REFRESH');
	            
	            $response_data = $this->api_model->set_session_data($result_json, $data, 'INDEX_HOME');
	            
	            log_message('debug',print_r($data,TRUE));
	            log_message('debug',print_r($response_data,TRUE));
	        }
	        //now that user is already loged in, display him, his personal landing page.
	        $data = array();
	        
	        $data['client_id'] = $client_id;
	        $data['client_secret'] = $client_secret;
	        
	        $my_widgets = $this->config->item('my_widgets');

	        if (ISSET($_GET['search_term'])){
	            $data['term'] = $_GET['search_term'];
	        }        
	        
	        $result_json = $this->api_model->apiCall($my_widgets, $data, 'GET', 'BEARER');
	        
	        if ($this->session->userdata('first_name')){
    	        $master_data['display']['display_first_name'] = $this->session->userdata('first_name');
    	        $master_data['display']['display_last_name'] = $this->session->userdata('last_name');
    	        $master_data['display']['display_date_of_birth'] = $this->session->userdata('date_of_birth');
    	        $master_data['display']['display_small_url'] = $this->session->userdata('small_url');
	        } else {
	            $data = array();
	            
	            $my_details = $this->config->item('my_details');
	            
	            $my_data_json = $this->api_model->apiCall($my_details, $data, 'GET', 'BEARER');
	            
	            $my_data = json_decode($my_data_json, true);
	            
	            $master_data['display']['display_first_name'] = $my_data['data']['user']['first_name'];
	            $master_data['display']['display_last_name'] = $my_data['data']['user']['last_name'];
	            $date_of_birth = $my_data['data']['user']['date_of_birth'];
	            $master_data['display']['display_date_of_birth'] = date("Y-m-d", $date_of_birth);
	            $master_data['display']['display_small_url'] = $my_data['data']['user']['images']['small_url'];
	            
	        }

	    } else { ///The user has not logged in, hence display all the visible widgets created by all the users
	        log_message('debug',print_r('user has not logged in',TRUE));
    	    $data = array();
    	    
    	    $data['client_id'] = $client_id;
    	    $data['client_secret'] = $client_secret;
    	    
    	    $this->load->model('api_model');
    	    
    	    if (ISSET($_GET['user_id'])){
    	        log_message('debug',print_r('user id is:'.$_GET['user_id'], TRUE));
    	        
    	        $user_widgets = $this->config->item('user_widgets');
    	        $user_widgets_ext = $this->config->item('user_widgets_ext');
    	        
    	        $url = $user_widgets . $_GET['user_id'] . $user_widgets_ext;
    	        
    	        if (ISSET($_GET['search_term'])){
    	            log_message('debug',print_r('search term is:'.$_GET['search_term'], TRUE));
    	            $data['term'] = $_GET['search_term'];
    	        }
    	            	        
    	        $all_result_json = $this->api_model->apiCall($url, $data, 'GET', '');
    	        
    	        $all_result = json_decode($all_result_json, true);
    	        
    	        $visible_widgets = array();
    	        
    	        foreach ($all_result['data']['widgets'] as $widget){
    	            if ($widget['kind'] == 'visible'){
    	                $visible_widgets[] = $widget;
    	            }
    	        }
    	        
    	        $widgets['widgets'] = $visible_widgets;
    	        
    	        $result = array(
    	            'code'     => $all_result['code'],
    	            'message'  => $all_result['message'],
    	            'data'     => $widgets
    	        );
    	        
    	        $result_json = json_encode($result);
    	        
    	    } else {
    	        $url = $this->config->item('visible_widgets');
    	        
    	        if (ISSET($_GET['search_term'])){
    	            log_message('debug',print_r('search term is:'.$_GET['search_term'], TRUE));
    	            $data['term'] = $_GET['search_term'];
    	        }
    	        
    	        
    	        $result_json = $this->api_model->apiCall($url, $data, 'GET', '');
    	    }
    	    
    	    
    	    
    	    
    	     
    	   // log_message('debug',print_r($result,TRUE));
    	    $master_data['display']['display_first_name'] = '';
    	    $master_data['display']['display_last_name'] = '';
    	    $master_data['display']['display_date_of_birth'] = '';
    	    $master_data['display']['display_small_url'] = '';
    	    
    	    
    	    
	    }
	    
	    $master_data['mega_header'] = json_decode($result_json, TRUE);
	    log_message('debug', print_r('---------------------Printing result data-------------------',TRUE));
	    log_message('debug', print_r($master_data,TRUE));
	    $this->load->view('home_page', $master_data);
	}
}
