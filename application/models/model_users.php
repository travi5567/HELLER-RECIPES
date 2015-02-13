<?php

class Model_users extends CI_Model{

	public function can_log_in($email, $password){ 
		$this->db->where('email', $email); 
		$this->db->where('password', md5($password)); 
		$query = $this->db->get('users'); 
		if($query->num_rows() == 1){ 
		return true; 
		} 
	} 

	public function getDataForSession($email){ 
		$this->db->select('firstname'); 
		$this->db->where('email', $email); 
		return $this->db->get('users')->row(); 
		}

	public function add_temp_users($key){
		$data = array(
			'firstname' => $this->input->post('firstname'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'key' => $key
		);
		$query = $this->db->insert('temp_users', $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function is_key_valid($key){
		$this->db->where('key', $key);
		$query = $this->db->get('temp_users');

		if($query->num_rows() == 1){
			return true;
		}else return false;
	}

	public function view_user($table){
        return $this->db->get($table);
    }

    public function show_comment_user($data){
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('author', $data);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function add_user($key){
	    $this->db->where('key', $key);
	    $temp_user = $this->db->get('temp_users');

	    if($temp_user){
	        $row = $temp_user->row();
	        $data = array(
	            'firstname' => $row->firstname,
	            'email' => $row->email,
	            'password' => $row->password
	        );

	       $this->db->insert('users', $data);

	       if( $this->db->affected_rows() > 0 ){

	          $this->db->where('key', $key);
	          $this->db->delete('temp_users');

	          return (object)array(
	            'email' => $data['email'],
	            'firstname' => $data['firstname']  
	         );
	      } 

	    }
	    return false;
	}


	public function get_info($key){
	    $this->db->where('email', $key);
	    $user = $this->db->get('users');

	    if($user){
	        $row = $user->row();
	        $data = array(
	            'firstname' => $row->firstname,
	            'email' => $row->email,
	            'password' => $row->password
	        );

	       $this->db->get('users', $data);
	       return (object)array(
	            'email' => $data['email'],
	            'firstname' => $data['firstname']  
	         );
	    }
	    return false;
	}









}