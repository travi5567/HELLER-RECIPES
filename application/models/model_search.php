<?php

class Model_search extends CI_Model{

	 function get_search() {
	  $match = $this->input->post('search');
	  $this->db->like('title',$match);
	  $this->db->or_like('description',$match);
	  $this->db->or_like('link',$match);
	  $query = $this->db->get('recipes');
	  return $query->result();
	}
}