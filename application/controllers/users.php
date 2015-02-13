<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function index(){
		$this->view_users();
	}

	public function view_users(){
		if($this->session->userdata('is_logged_in')){
			$data['user_info'] = $this->model_users->view_user('users')->result();			
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('view_users', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		}else {
			redirect('login/restricted');
		}
	}

	public function view_user(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('model_comments');
			$id = $this->uri->segment(3);
			$data['recipes'] = $this->recipe_model->show_recipe_id($id);
			$data['comments'] = $this->model_comments->show_comment_id($id);
			$data['user_info'] = $this->model_users->view_user('users')->result();			
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('user', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		}else {
			redirect('login/restricted');
		}
	}

	public function show_comment_user(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('model_comments');
			$id = $this->uri->segment(3);
			$data['author'] = $id;
			$data['recipes'] = $this->recipe_model->show_recipe_id($id);
			$data['comments'] = $this->model_users->show_comment_user($id);
			$data['user_info'] = $this->model_users->view_user('users')->result();
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('user', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		}else{
			redirect('login/restricted');
		}
	}


}