<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("users_model");
	}

	public function index()
	{
		$this->load->library('session');
		$this->load->view('pages/login');
	}

	public function login()
	{
		//Session library
		$this->load->library('session');

		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		if ($this->form_validation->run() === FALSE) {
			$errors = array();
			foreach ($this->input->post() as $key => $value) {
				$errors[$key] = form_error($key, '<span class="text-danger d-block s-v-e">', '</span>');
			}

			$response = array('status' => 400, 'errors' => array_filter($errors));
			exit(json_encode($response));
		}
		else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			// User
			$user = $this->users_model->getUserEmail((string)$email);

			if ($user) {
				if (password_verify($password, $user->password)) {
					if ($user->status === 'active') {
						$link = base_url('/dashboard');

						$this->session->set_userdata('user', $user);
						$this->session->set_userdata('logged_in', true);

						$response = array(
							'status' => 200,
							'link' => $link,
							'message' => 'Authentication successful. Redirecting...'
						);
					}
					else {
						$response = array(
							'status' => 401,
							'message' => 'Your account is inactive. Kindly contact your administrator concerning your account'
						);
					}
				}
				else {
					$response = array('status' => 401, 'message' => 'Incorrect email or password');
				}
			}
			else {
				$response = array('status' => 401, 'message' => 'Incorrect email or password');
			}

			echo json_encode($response);
		}
	}

	public function logout()
	{
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('logged_in');
		redirect('/');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */