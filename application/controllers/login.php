<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index(){
		$this->signin();
	}

	public function signin(){
		$userdata['user_info'] = $this->model_users->view_user('users')->result();
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header', $userdata);
		$this->load->view('view_signin');
		$this->load->view('includes/bottom-nav');
		$this->load->view('includes/footer');
	}

	public function restricted(){
		$userdata['user_info'] = $this->model_users->view_user('users')->result();
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header', $userdata);
		$this->load->view('restricted');
		$this->load->view('includes/bottom-nav');
		$this->load->view('includes/footer');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	public function view_users(){
		if($this->session->userdata('is_logged_in')){
			$data['user_info'] = $this->model_users->view_user('users')->result();			
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('view_users', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		}else {
			redirect('login/restricted');
		}
	}

	public function members(){
		// test if user is travis
		if($this->session->userdata('is_logged_in')){
			$data['user_info'] = $this->model_users->view_user('users')->result();			
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header', $data);
			$this->load->view('members', $data);
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		}else {
			redirect('login/restricted');
		}
	}

	public function signup(){
		$data['user_info'] = $this->model_users->view_user('users')->result();
		$this->load->view('includes/header');
		$this->load->view('includes/navigation-header', $data);
		$this->load->view('signup');
		$this->load->view('includes/bottom-nav');
		$this->load->view('includes/footer');
	}

	public function register_user($key){
	    if($this->model_users->is_key_valid($key)){
	        if($res = $this->model_users->add_user($key)){ //here
	            $data = array(
	                'firstname' => $res->firstname,
	                'email' =>  $res->email,
	                'admin' =>  $res->admin,
	                'is_logged_in' => 1
	            );
	            $this->session->set_userdata($data);
	            redirect('login/members');
	        }else echo "Failed to add user, please try again.";
	    }else echo "invalid Key";
	} 

	public function signup_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password', 'required|trim|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('cpassword','Confirm Password', 'required|trim|matches[password]');
		$this->form_validation->set_message('is_unique', 'That email address already exist.');
		if($this->form_validation->run()){
			$key = md5(uniqid());
			$this->load->library('email', array('mailtype'=>'html'));
			$this->email->from('theller5567@gmail.com', 'HellerRecipes-login-confirmation');
			$this->email->to($this->input->post('email'));
			$this->email->subject("confirm your account");

			$message = "<h1>Thank you for signing up!</h1>";
			$message.= "<p><a href='".base_url()."login/register_user/$key'>Click here</a> to confirm your account.</p>";
			$this->email->message($message);

			if($this->model_users->add_temp_users($key)){
				//Send a email to the user
				if($this->email->send()){
					$this->load->view('includes/header');
					$this->load->view('includes/navigation-header');
					$this->load->view('email_sent');
					$this->load->view('includes/bottom-nav');
					$this->load->view('includes/footer');
				} else echo "Could not send the email";
			} else echo "Problem adding to database";
		} else {
			$this->load->view('includes/header');
			$this->load->view('includes/navigation-header');
			$this->load->view('signup');
			$this->load->view('includes/bottom-nav');
			$this->load->view('includes/footer');
		}
	}

	public function validate_credentials(){
		$email = $this->input->post('email'); 
		$password = $this->input->post('password'); 
		if($this->model_users->can_log_in($email, $password)){
			return true;
		}else {
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password.');
			return false;
		}
	}

	public function login_validation(){ 
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean|callback_validate_credentials'); 
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim|callback_validate_credentials'); 
		$email = $this->input->post('email'); 
		$password = $this->input->post('password'); 
		$admin = $this->input->post('admin'); 
		$validated = $this->form_validation->run();
		if($validated){ 
			if($this->model_users->can_log_in($email, $password)) { 
				$userData = $this->model_users->getDataForSession($email); 
				$data = array( 
					"firstname" => $userData->firstname, 
					"email" => $email,
					"admin" => $admin,
					"is_logged_in" => 1, 
					); 
				$this->session->set_userdata($data); 
				redirect('login/members', $data); 
			}else{
				$this->signin();
			} 
		} 
		else{ 
		$this->signin(); 
		} 
	}

	
}