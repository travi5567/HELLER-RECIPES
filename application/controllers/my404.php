<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My404 extends CI_Controller {
	
	public function __construct(){
        parent::__construct(); 
    } 

	public function index(){
		if($this->session->userdata('is_logged_in')){
			$this->output->set_status_header('404'); 
			$this->load->model('model_users');
			$userdata['user_info'] = $this->model_users->view_user('users')->result();
			$this->load->view('includes/header');
			$this->load->view('member_404');
			$this->load->view('includes/footer');
		}else {
			$this->output->set_status_header('404'); 
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header');
			$this->load->view('404');
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		}
		
	}
	
}