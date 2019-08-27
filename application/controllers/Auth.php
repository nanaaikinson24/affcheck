<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("users_model");
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('pages/login');
	}

	public function forgotPassword()
	{
		$this->load->view('pages/forgot');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run() === FALSE) {
			$errors = array();
			foreach ($this->input->post() as $key => $value) {
				$errors[$key] = form_error($key, '<span class="text-danger d-block s-v-e">', '</span>');
			}

			$response = array('status' => 400, 'errors' => array_filter($errors));
			exit(json_encode($response));
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			// User
			$user = $this->users_model->getUserEmail((string) $email);

			if ($user) {
				if (password_verify($password, $user->password)) {
					if ($user->status === 'active') {
						$link = base_url('dashboard');

						// Log user activity
						// TODO: time of login, 

						$this->session->set_userdata('user', $user);
						$this->session->set_userdata('logged_in', true);

						$response = array(
							'status' => 200,
							'link' => $link,
							'message' => 'Authentication successful. Redirecting...'
						);
					} else {
						$response = array(
							'status' => 401,
							'message' => 'Your account is inactive. Kindly contact your administrator concerning your account'
						);
					}
				} else {
					$response = array('status' => 401, 'message' => 'Incorrect email or password');
				}
			} else {
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

	public function resetPassword()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

		if ($this->form_validation->run() === FALSE) {
			$errors = array();
			foreach ($this->input->post() as $key => $value) {
				$errors[$key] = form_error($key, '<span class="text-danger d-block s-v-e">', '</span>');
			}

			$response = array('status' => 400, 'errors' => array_filter($errors));
			exit(json_encode($response));
		} else {
			$email = $this->input->post('email');

			// User
			$user = $this->users_model->getUserEmail((string) $email);
			if ($user) {
				$password = rand(11111111, 99999999);
				$hashed = password_hash($password, PASSWORD_DEFAULT);

				$data = array('password' => $hashed);
				$update = $this->users_model->updateMask($data, $user->mask_id);

				if ($update) {
					$data['password'] = $password;
					$data['first_name'] = $user->first_name;
					$data['last_name'] = $user->last_name;

					$userData = $data;
					$mail_results = $this->mailer
						->to($email)
						->subject("Amazing Market Consult: Password Reset")
						->send("forgot_password.php", compact('userData'));

					$response = array('status' => 200, 'message' => 'Password reset request sent successfully. An email has been sent to the email you entered for further instructions');
				} else {
					$response = array('status' => 401, 'message' => 'There was an error in resetting your password');
				}
			} else {
				$response = array('status' => 401, 'message' => 'This email is not associated with any account');
			}
			echo json_encode($response);
		}
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
