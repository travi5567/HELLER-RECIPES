<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploadimage extends CI_Controller {
	
	public function do_upload(){
		$this->load->model('upload_model');
	    $config['upload_path'] = './assets/uploads/';
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config['max_size'] = '';
	    $config['max_width']  = '';
	    $config['max_height']  = '';
	    $config['overwrite'] = TRUE;
	    $config['remove_spaces'] = TRUE;

	    $this->load->library('upload', $config);

	    if(!$this->upload->do_upload()){
	    	$this->load->library('form_validation'); 
			$this->form_validation->set_rules('recipe_name', 'Title', 'required');  
			$this->form_validation->set_rules('recipe_description', 'Recipe Description', 'required');  
			$this->form_validation->set_rules('recipe_directions', 'Recipe Directions', 'required');  
			$this->form_validation->set_rules('rating', 'Rating', 'required');  
			$this->form_validation->set_rules('recipe_genre', 'Genre', 'required');  
			$this->form_validation->run();
	    	$error = array('error' => $this->upload->display_errors('<p class="error">- ', '</p>'));
	    	$this->load->view('form-error', $error);
	    }else{
	    	$this->load->library('form_validation'); 
			$this->form_validation->set_rules('recipe_name', 'Title', 'required');  
			$this->form_validation->set_rules('recipe_description', 'Recipe Description', 'required');  
			$this->form_validation->set_rules('recipe_directions', 'Recipe Directions', 'required');  
			$this->form_validation->set_rules('rating', 'Rating', 'required');  
			$this->form_validation->set_rules('recipe_genre', 'Genre', 'required');  
			$validated = $this->form_validation->run();
			if(!$validated){
				$error = array('error' => $this->upload->display_errors());
	    		$this->load->view('form-error', $error);
			}else{
				$data['user_info'] = $this->model_users->view_user('users')->result();
			    $this->upload_model->insert_images($this->upload->data());
			    $data = array('upload_data' => $this->upload->data());	
				$data['recipes'] = $this->recipe_model->get_recipes();
			    $this->load->view('includes/header');
				$this->load->view('includes/navigation-header', $data);
				$this->load->view('recipes', $data);
				$this->load->view('includes/bottom-nav');
				$this->load->view('includes/footer');
			}
	    	
		}
	}

	public function view_image(){
		$data['user_info'] = $this->model_users->view_user('users')->result();
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header', $data);
		$this->load->view('upload_image', $data);
		$this->load->view('includes/bottom-nav');
		$this->load->view('includes/footer');
	}

	function delete_recipe(){
		$id = $this->uri->segment(3);
		$this->load->model('upload_model');
    	$this->upload_model->row_delete($id);
    	$data['success'] = '<h2>Your Recipe has been removed</h2>';
	    $this->load->view('delete', $data);
	}

	function update_recipe($id) {
		$this->load->model('upload_model');
	    $recipe = $this->upload_model->get_recipe($id);
	    $config['upload_path'] = './assets/uploads/';
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config['max_size'] = '';
	    $config['max_width']  = '600';
	    $config['max_height']  = '';
	    $config['overwrite'] = TRUE;
	    $config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);
		
		
	 	if($this->upload->do_upload()){//IF FILE EXIST AND NO ERRORS-GOOD-FILE
	 		$image_data = $this->upload->data();
	 		$data = array(
		        'id'  => $this->input->post('recipe_id'),
		        'title' => strtolower($this->input->post('recipe_name')),
		        'description' => $this->input->post('recipe_description'),
		        'stars' => $this->input->post('rating'),
		        'directions' => $this->input->post('recipe_directions'),
		        'genre' => $this->input->post('recipe_genre'),
		        'posted' =>  date('Y-m-d'),
		      	'image' => $image_data['file_name'],
		      	'imagePath' => $image_data['full_path']
		    );
		    $this->upload_model->update_recipe_form($id, $data);
		    redirect('addRecipe/recipes');
	 	}else{//NO FILE || BAD FILE
			$image_data = $this->upload->data();
	 		if($image_data['file_name']){
				echo "GOOD-first - ";
				print_r($image_data['file_name']);
			 	$data['error'] = $this->upload->display_errors('<p>', '</p>');
			 	$data['user_info'] = $this->model_users->view_user('users')->result();
			 	$data['recipes'] = $this->recipe_model->get_recipes();
				$this->load->view('includes/header');
				$this->load->view('includes/navigation-header', $data);
				$this->load->view('error', $data);
				$this->load->view('includes/bottom-nav');
				$this->load->view('includes/footer');

			}else{
				$data = array(
			        'id'  => $this->input->post('recipe_id'),
			        'title' => strtolower($this->input->post('recipe_name')),
			        'description' => $this->input->post('recipe_description'),
			        'stars' => $this->input->post('rating'),
			        'directions' => $this->input->post('recipe_directions'),
			        'genre' => $this->input->post('recipe_genre'),
			        'posted' =>  date('Y-m-d')
			    );
			    $this->upload_model->update_recipe_form($id, $data);
			    redirect('addRecipe/recipes');
			}
	 	}
	 	
	    
	    
	    
	    if($image_data['file_name']){
			echo "GOOD-second";
		}else{
			echo "bad-second";
		}
	    
	    
	}















}

?>