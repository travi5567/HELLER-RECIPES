<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function index(){
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header');
		$this->load->view('home');
		$this->load->view('includes/bottom-nav');
		$this->load->view('includes/footer');
	}

	public function signin(){
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header');
		$this->load->view('home');
		$this->load->view('includes/bottom-nav');
		$this->load->view('includes/footer');
	}

	public function createAccount(){
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header');
		$this->load->view('create-account');
		$this->load->view('includes/footer');
	}

	public function welcome(){
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header');
		$this->load->view('welcome');
		$this->load->view('includes/bottom-nav');
		$this->load->view('includes/footer');
	}


	public function stopwatch(){
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header');
		$this->load->view('stopwatch');
		$this->load->view('includes/bottom-nav');
		$this->load->view('includes/footer');
	}
	
}
