<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {
	
	public function index(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('model_comments');
			$data['comments'] = $this->model_comments->view_comments('comments')->result;
			$data['user_info'] = $this->model_users->view_user('users')->result();
			$this->load->model('model_comments');
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('comments', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		}else{
			redirect('login/restricted');
		}
		
	}

	public function show_comment_id(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('model_comments');
			$id = $this->uri->segment(3);
			$data['recipes'] = $this->recipe_model->show_recipe_id($id);
			$data['comments'] = $this->model_comments->show_comment_id($id);
			$data['user_info'] = $this->model_users->view_user('users')->result();
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('comments', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		}else{
			redirect('login/restricted');
		}
	}

	public function add_comment(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('model_comments');
			$this->load->library('form_validation'); 
			$this->form_validation->set_rules('comment', 'Comment', 'required'); 
			$this->form_validation->set_rules('author', 'Author', 'required');
			$this->form_validation->set_rules('rating', 'Rating', 'required');
			$validated = $this->form_validation->run();
			if($validated){
				$data = array(
	            'comment' => $this->input->post('comment'),
	            'author' => strtolower($this->input->post('author')),
	            'rating' => $this->input->post('rating'),
	            'date' =>  date('Y-m-d'),
	            'recipeTitle' => strtolower($this->input->post('recipeTitle')),
	            'recipeId' => $this->input->post('recipeId'),
				);
				$this->model_comments->add_comment($data);
				$id = $this->uri->segment(3);
				$this->show_comment_id($id);
			}else{
				$id = $this->uri->segment(3);
				$this->show_comment_id($id);
			}
		}else{
			redirect('login/restricted');
		}
	}


}