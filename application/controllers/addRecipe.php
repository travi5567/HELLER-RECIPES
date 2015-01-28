<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addrecipe extends CI_Controller {
	
	public function index(){
		if($this->session->userdata('is_logged_in')){
			$data['recipes'] = $this->recipe_model->get_recipes();
			$data['user_info'] = $this->model_users->view_user('users')->result();
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('addRecipe', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		} else {
			redirect('login/restricted');
		}
		
	}
	function search(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('model_search');
			$data['user_info'] = $this->model_users->view_user('users')->result();	
			$data['query'] = $this->model_search->get_search();
			if($data['query'] = $this->model_search->get_search()){
				$this->load->view('includes/header');
				$this->load->view('includes/navigation-header', $data);
				$this->load->view('search_recipes', $data);
				$this->load->view('includes/bottom-nav');
				$this->load->view('includes/footer');
			}else{
				$data['message'] = "No results found with search";
				$this->load->view('includes/header');
				$this->load->view('includes/navigation-header', $data);
				$this->load->view('search_recipes', $data);
				$this->load->view('includes/bottom-nav');
				$this->load->view('includes/footer');
			}
			
		} else {
			redirect('login/restricted');
		}
	}

	public function show_recipe_id(){
	if($this->session->userdata('is_logged_in')){
		$id = $this->uri->segment(3);
		$data['recipes'] = $this->recipe_model->show_recipes();
		$data['recipes'] = $this->recipe_model->show_recipe_id($id);
		$data['user_info'] = $this->model_users->view_user('users')->result();			
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header', $data);
		$this->load->view('update_recipes', $data);
		$this->load->view('includes/bottom-nav');
		$this->load->view('includes/footer');
		}else {
			redirect('login/restricted');
		}
	}

	public function update_recipes(){
		if($this->session->userdata('is_logged_in')){
			$data['recipes'] = $this->recipe_model-> show_recipe_id($id);
			$userinfo['user_info'] = $this->model_users->view_user('users')->result();			
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $userinfo);
			$this->load->view('update_recipes', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		}else {
			redirect('login/restricted');
		}
	}

	public function recipes(){
		if($this->session->userdata('is_logged_in')){
			$data['recipes'] = $this->recipe_model->get_recipes();
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('recipes', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		} else {
			redirect('login/restricted');
		}
	}

	public function stopwatch(){
		if($this->session->userdata('is_logged_in')){
			$data['user_info'] = $this->model_users->view_user('users')->result();
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('stopwatch');
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		} else {
			redirect('login/restricted');
		}
		
	}

	public function create(){
		$data = array(
            'title' => $this->input->post('recipe_name'),
            'description' => $this->input->post('recipe_description'),
            'stars' => $this->input->post('rating'),
            'directions' => $this->input->post('recipe_directions'),
            'link' => $this->input->post('recipe_link'),
            'genre' => $this->input->post('recipe_genre'),
            'posted' =>  date('Y-m-d')
		);
		$this->recipe_model->add_recipe($data);
		$this->recipes();
	}

	public function update(){
		$data = array(
			'id'  => $this->input->post('recipe_id'),
            'title' => $this->input->post('recipe_name'),
            'description' => $this->input->post('recipe_description'),
            'stars' => $this->input->post('rating'),
            'directions' => $this->input->post('recipe_directions'),
            'link' => $this->input->post('recipe_link'),
            'genre' => $this->input->post('recipe_genre'),
            'posted' =>  date('Y-m-d')
		);
		$this->recipe_model->update_recipe($data);
		$this->recipes();
	}

	

	
}