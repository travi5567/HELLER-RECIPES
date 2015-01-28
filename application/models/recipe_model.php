<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Recipe_model extends CI_Model {

	function get_recipes(){
		$this->db->order_by("stars", "desc"); 
		$q = $this->db->get('recipes');
		if($q->num_rows() > 0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}

	function add_recipe($data){
		$this->db->insert('recipes', $data);
		return;
	}

	function update_recipe($data){
		$id = $data['id'];
		if($id){
			unset($data['id']);
		    $this->db->where('id', $id);
		    $this->db->update('recipes' ,$data);
		    return true;
		}
	}

	function show_recipes(){
		$this->db->order_by("stars", "desc"); 
		$query = $this->db->get('recipes');
		$query_result = $query->result();
		return $query_result;
	}

	function show_recipe_id($data){
		$this->db->select('*');
		$this->db->from('recipes');
		$this->db->where('id', $data);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function delete_recipe(){
		$this->db->where('id', $this->uri->segement(3));
		$this->db->delete('data');
	}
        

}//END OF Recipe_model