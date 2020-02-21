<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Methods extends CI_Controller {

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
  
	public function user_login(){
		//header('Content-Type: application/json');
		
		//print_r("inside user_login");
		
	    $data = array();
		
	    $data['username'] = $this->input->post('email_id');
	    $data['password'] = $this->input->post('password');
	    
	    $data['client_id'] = $this->config->item('client_id');
	    $data['client_secret'] = $this->config->item('client_secret');
	    
	    
	    $url = $this->config->item('user_login');
	    $data['grant_type'] = $this->config->item('login_grant_type');
		
	   // $data['call_from'] = 'user_login'; //for debugging purpose
	    
		$this->load->model('api_model');
		//log_message('debug',print_r('about to call apicall',TRUE));
		$result_json = $this->api_model->apiCall($url, $data, 'POST', '');
		//log_message('debug',print_r('after calling apicall',TRUE));
		
		$response_data = $this->api_model->set_session_data($result_json, $data, 'LOGIN');
		
		log_message('debug', print_r($response_data, TRUE));
		echo json_encode($response_data);
		
	}

	public function user_logout(){
	    //header('Content-Type: application/json');
	    
	    log_message('debug',print_r('inside user logout',TRUE));
	    //print_r("inside user_login");

	    $response_data = $this->user_logout_local();
	    
	    log_message('debug', print_r($response_data, TRUE));
	    echo json_encode($response_data);
	    
	}
	
	public function user_logout_local(){
	    
	    log_message('debug',print_r('inside user_logout_local',TRUE));
	    //print_r("inside user_login");
	    
	    
	    $this->load->library('session');
	    $data = array();
	    
	    
	    $url = $this->config->item('user_logout');
	    
	    // $data['call_from'] = 'user_login'; //for debugging purpose
	    
	    $data['token'] = $this->session->userdata('access_token');
	    
	    $this->load->model('api_model');
	    log_message('debug',print_r('about to call apicall for logout',TRUE));
	    $result_json = $this->api_model->apiCall($url, $data, 'POST', 'LOGOUT');
	    //log_message('debug',print_r('after calling apicall',TRUE));
	    
	    $response_data = $this->api_model->unset_session_data($result_json);
	    
	    log_message('debug', print_r($response_data, TRUE));
	    
	    return $response_data;
	    
	}
	
	
	
	public function user_signup(){
	    
	    $data = array();
	    $user = array();
	    
	    //log_message('debug',print_r($_POST,TRUE));
	    //print_r($_FILES);exit;
	    $user['first_name'] = $this->input->post('first_name');
	    $user['last_name'] = $this->input->post('last_name');
	    $user['email'] = $this->input->post('signup_email_id');
	    $user['password'] = $this->input->post('signup_password');
	    
	    if(is_array($_FILES)) {
            if(is_uploaded_file($_FILES['image_url']['tmp_name'])) {
                $sourcePath = $_FILES['image_url']['tmp_name'];
                $targetPath = "./assets/image/".$_FILES['image_url']['name'];
                if(move_uploaded_file($sourcePath,$targetPath)) {
                    $user['image_url'] = $targetPath;
                }
            }
	    }

	    $data['client_id'] = $this->config->item('client_id');
	    $data['client_secret'] = $this->config->item('client_secret');
	    $data['user'] = $user;
	    
	    $url = $this->config->item('user_signup');
	    
	    $this->load->model('api_model');
	    $result_json = $this->api_model->apiCall($url, $data, 'POST', '');

	    log_message('debug',print_r($result_json,TRUE));
	    
	  //  echo json_encode($result);
	    echo $result_json;
	    
	}
	
	public function user_reset_password(){
	    
	    $data = array();
	    $user = array();
	    
	    $user['email'] = $this->input->post('reset_email_id');
	    
	    $data['client_id'] = $this->config->item('client_id');
	    $data['client_secret'] = $this->config->item('client_secret');
	    $data['user'] = $user;
	    
	    $url = $this->config->item('reset_password');
	    
	    $this->load->model('api_model');
	    $result_json = $this->api_model->apiCall($url, $data, 'POST', '');
	    
	    log_message('debug', print_r($result_json, TRUE));
	    
	    //echo json_encode($result);
	    echo $result_json;
	    
	}

	public function change_password(){
	    
	    $data = array();
	    $user = array();
	    
	    $user['current_password'] = $this->input->post('current_password');
	    $user['new_password'] = $this->input->post('new_password');
	    
	    $data['user'] = $user;
	    
	    $url = $this->config->item('change_password');
	    
	    $this->load->model('api_model');
	    $result_json = $this->api_model->apiCall($url, $data, 'POST', 'BEARER');
	    
	    $result = json_decode($result_json, true);
	    
	    $response_data = array();
	    if ($result['code'] == 0){ //logout the user, unset the variable, popup the login screen
	        $response_data = $this->api_model->set_session_data($result_json, $data, 'CHANGE_PASSWORD');
	    }
	    
	    log_message('debug', print_r($result_json, TRUE));
	    
	    echo json_encode($response_data);
	     
	}
	
	public function create_widget(){
	    
	    $data = array();
	    $widget = array();
	    
	    $widget['name'] = $this->input->post('widget_name');
	    $widget['description'] = $this->input->post('widget_desc');
	    $widget['kind'] = $this->input->post('widget_kind');
	    
	    $data['widget'] = $widget;
	    
	    $url = $this->config->item('create_widget');
	    
	    $this->load->model('api_model');
	    $result_json = $this->api_model->apiCall($url, $data, 'POST', 'BEARER');
	    
	    
	    log_message('debug', print_r($result_json, TRUE));
	    
	    echo $result_json;
	    
	}
	
	public function update_widget(){
	    
	    $data = array();
	    $widget = array();
	    
	    $widget['name'] = $this->input->post('widget_name');
	    $widget['description'] = $this->input->post('widget_desc');
	    $widget_id = $this->input->post('widget_id');

	    $data['widget'] = $widget;
	    
	    $url = $this->config->item('amend_widget').$widget_id;
	    
	    $this->load->model('api_model');
	    $result_json = $this->api_model->apiCall($url, $data, 'PUT', 'BEARER');
	    
	    
	    log_message('debug', print_r($result_json, TRUE));
	    
	    echo $result_json;
	    
	}
	
	public function destroy_widget(){
	    
	    $data = array();
	    
	    $widget_id = $this->input->post('widget_id');
	    
	    $url = $this->config->item('amend_widget').$widget_id;
	    
	    $this->load->model('api_model');
	    $result_json = $this->api_model->apiCall($url, $data, 'DEL', 'BEARER');
	    
	    log_message('debug', print_r($result_json, TRUE));
	    
	    echo $result_json;
	    
	}

	public function update_profile(){
	    
	    $data = array();
	    $user = array();
	    
	    
	    //print_r($_SERVER['DOCUMENT_ROOT']);exit;
	    $user['first_name'] = $this->input->post('up_first_name');
	    $user['last_name'] = $this->input->post('up_last_name');
	    
	    $dob_input = $this->input->post('up_date_of_birth');
	    
	    $user['date_of_birth'] = date(strtotime(date($dob_input)));
	    
	    if(is_array($_FILES)) {
	        if(is_uploaded_file($_FILES['up_image_url']['tmp_name'])) {
	            $sourcePath = $_FILES['up_image_url']['tmp_name'];
	            $targetPath = "./assets/image/".$_FILES['up_image_url']['name'];
	            if(move_uploaded_file($sourcePath,$targetPath)) {
	                $user['image_url'] = $targetPath;
	            }
	        }
	    }
	    $data['user'] = $user;
	    $url = $this->config->item('user_update');
	    
	    $this->load->model('api_model');
	    $result_json = $this->api_model->apiCall($url, $data, 'PUT', 'BEARER');
	    
	    $result = json_decode($result_json, true);
	    
	    log_message('debug', print_r($result, TRUE));
	    
	    $response_data = array();
	    if ($result['code'] == 0){ //
	        $response_data = $this->api_model->set_session_data($result_json, $data, 'UPDATE_PROFILE');
	    }
	    
	    
	    
	    echo $result_json;
	    
	}
	
	public function search_widget(){
	    
	    $data = array();
	    
	    $data['client_id'] = $this->config->item('client_id');
	    $data['client_secret'] = $this->config->item('client_secret');
	    
	    $user['search_term'] = $this->input->post('search_term');
	    
	    $url = $this->config->item('visible_widgets');
	    
	    $this->load->model('api_model');
	    
	    $result_json = $this->api_model->apiCall($url, $data, 'GET', '');
	    
	    $result = json_decode($result_json, true);
	    
	    log_message('debug', print_r($result, TRUE));
	    
	    
	    echo $result_json;
	    
	}
	public function view_user(){
	    
	    $data = array();
	    
	    $data['client_id'] = $this->config->item('client_id');
	    $data['client_secret'] = $this->config->item('client_secret');
	    
	    $user_id = $this->input->post('user_id');
	    
	    $url = $this->config->item('user_details'). $user_id;
	    
	    $this->load->model('api_model');
	    
	    $result_json = $this->api_model->apiCall($url, $data, 'GET', '');
	    
	    $result = json_decode($result_json, true);
	    
	    log_message('debug', print_r($result, TRUE));
	    
	    
	    echo $result_json;
	    
	}
	
}
