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
	    	$data['user_info'] = $this->model_users->view_user('users')->result();
	        $errors[] = array('error'=>$this->upload->display_errors());
	        print_r($config);
	    }else{
	    	print_r($config);
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

	public function view_image(){
		$data['user_info'] = $this->model_users->view_user('users')->result();
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header', $data);
		$this->load->view('upload_image', $data);
		$this->load->view('includes/bottom-nav');
		$this->load->view('includes/footer');
	}


	function update_recipe($id) {
		$this->load->model('upload_model');
	    $recipe = $this->upload_model->get_recipe($id);
	    $config['upload_path'] = './assets/uploads/';
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config['max_size'] = '';
	    $config['max_width']  = '';
	    $config['max_height']  = '';
	    $config['overwrite'] = TRUE;
	    $config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);

	 	if(!$this->upload->do_upload()){
	 		$data['error'] = $this->upload->display_errors('<p>', '</p>');
	 		$data['user_info'] = $this->model_users->view_user('users')->result();
	 		$data['recipes'] = $this->recipe_model->get_recipes();
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('error', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
	    } else {
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
	        $this->session->set_flashdata('message', "<p>Hotel updated successfully.</p>");
	        redirect('addRecipe/recipes');
	    }
	}















}

?>