<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("users_model");
		$this->load->library('mailer');
	}

	public function index()
	{
		$this->load->library('session');
		$user = $user = $this->session->userdata('user');

		if($user){
			if ($user->role == 'admin') {
				$users = $this->users_model->getUsers();
				$data = array(
					'user' => $user,
					'users' => $users
				);
				$this->load->view('templates/header', $data);
				$this->load->view('pages/users', $data);
				$this->load->view('templates/footer');
			}
			else {
				redirect('aff-check');
			}
		}
		else{
			redirect('/');
		}
	}

	public function store()
	{
		$this->form_validation->set_rules('firstName', 'first name', 'trim|required');
		$this->form_validation->set_rules('lastName', 'last name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]');

		if ($this->form_validation->run() === FALSE) {
			$errors = array();
			foreach ($this->input->post() as $key => $value) {
				$errors[$key] = form_error($key, '<span class="text-danger d-block s-v-e">', '</span>');
			}

			$response = array('status' => 400, 'errors' => array_filter($errors));
			exit(json_encode($response));
		}
		else {
			$password = rand(11111111, 99999999);
			$hashed = password_hash($password, PASSWORD_DEFAULT);

			$data = array(
				'first_name' => $this->input->post('firstName'),
				'last_name' => $this->input->post('lastName'),
				'email' => $this->input->post('email'),
				'password' => $hashed,
				'role' => $this->input->post('role'),
				'status' => $this->input->post('status'),
				'mask_id' => rand(11111111, 99999999).uniqid()
			);

			$insert = $this->users_model->store($data);

			if ($insert) {
				$data['password'] = $password;
				$userData = $data;
				$mail_results = $this->mailer
					->to($data['email'])
					->subject("Amazing Market Consult: AFF Check Login Credentials")
					->send("new_user.php", compact('userData'));

				$user = $this->users_model->show($insert);
				$response = array('status' => 200, 'message' => 'User created successfully', 'data' => $user);
			}
			else {
				$response = array('status' => 401, 'message' => 'There was an error in saving this user');
			}

			echo json_encode($response);
		}
	}

	public function update($id)
	{
		$user = $this->users_model->showMask((string)$id);
		if ($user) {
			$this->form_validation->set_rules('firstName', 'first name', 'trim|required');
			$this->form_validation->set_rules('lastName', 'last name', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required');

			if ($this->form_validation->run() === FALSE) {
				$errors = array();
				foreach ($this->input->post() as $key => $value) {
					$errors[$key] = form_error($key, '<span class="text-danger d-block s-v-e">', '</span>');
				}

				$response = array('status' => 400, 'errors' => array_filter($errors));
				exit(json_encode($response));
			}
			else {
				$data = array(
					'first_name' => $this->input->post('firstName'),
					'last_name' => $this->input->post('lastName'),
					'email' => $this->input->post('email'),
					'role' => $this->input->post('role'),
					'status' => $this->input->post('status'),
				);

				$update = $this->users_model->updateMask($data, $id);

				if ($update) {
					$user = $this->users_model->showMask((string)$id);
					$response = array('status' => 200, 'message' => 'User updated successfully', 'data' => $user);
				}
				else {
					$response = array('status' => 401, 'message' => 'There was an error in saving this user');
				}
			}
		}
		else {
			$response = array('status' => 401, 'message' => 'No data found for this record');
		}

		echo json_encode($response);
	}

	public function show($id)
	{
		$user = $this->users_model->showMask((string)$id);

		if ($user) {
			$response = array('status' => 200, 'data' => $user);
		}
		else {
			$response = array('status' => 401, 'message' => 'No data found for this record');
		}
		echo json_encode($response);
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */