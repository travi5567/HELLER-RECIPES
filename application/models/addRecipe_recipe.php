<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Recipe_model extends CI_Model {

	public function add_recipe(){
	    $recipe_name = $this->input->post('recipe_name');
        $rating = $this->input->post('rating');
        $ingredient = $this->input->post('ingredient');
        $amount = $this->input->post('amount');
        $directions = $this->input->post('directions');


        $sql = "INSERT INTO recipes ( title, description) 
        		  VALUES(" . $this->db->escape($recipe_name) . ",
        		  	     " . $this->db->escape($directions) . ")";
        $result = $this-db->query($sql);
        return $result;
        
	}

	public function index(){
		$query = $this->db->get('recipes');
		if($q->num_rows() > 0){
			foreach($q ->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}


}