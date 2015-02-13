<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class upload_model extends CI_Model {

	function insert_images($image_data = array()){
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
     	$this->db->insert('recipes', $data);
	}

	function get_recipe($id) {
        $this->db->select('id','title','description','stars','directions','genre','posted','image','imagePath');
        $this->db->where('id', $id);
        $query = $this->db->get('recipes');

        return $query->row_array();
    }

    function row_delete($id) {    
      $this->db->where('id', $id);   
      $this->db->delete('recipes');
    }
    function comment_delete($id) {    
      $this->db->where('recipeId', $id);   
      $this->db->delete('comments');
    }


    function update_recipe_form($id, $data){
        $this->db->where('id', $id);
        $this->db->update('recipes', $data);
        return true;
    }

    function delete_recipe_form($id, $data){
        $this->db->where('id', $id);
        $this->db->delete('recipes', $data);
        return true;
    }
}
