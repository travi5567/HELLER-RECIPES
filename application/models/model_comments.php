<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_comments extends CI_Model {

	function get_comments(){
		$this->db->order_by("rating", "desc"); 
		$q = $this->db->get('comments');
		if($q->num_rows() > 0){
			foreach($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	function view_comments($table){
        return $this->db->get($table);
    }

    function add_comment($data){
		$this->db->insert('comments', $data);
		return;
	}

    function show_comment_id($data){
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('recipeId', $data);
		$this->db->order_by("rating", "desc"); 
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	function show_recipe_id($data){
		$this->db->select('*');
		$this->db->from('recipes');
		$this->db->where('id', $data);
		$this->db->order_by("rating", "desc"); 
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

}