<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('users_model');
		$this->load->model('data_model');
	}

	public function index()
	{
		$user = $this->session->userdata('user');

		if ($user) {
			if ($user->role == 'admin') {
				$staff_id = $this->data_model->mostOccurredSearch();
				$data = array(
					'user' => $user,
					'user_count' => $this->users_model->countAll(),
					'search_count' => $this->data_model->searchCount(),
					'search_count_now' => ($this->data_model->searchCountNow(gmdate('Y-m-d')))->count,
					'staff_id' => ($staff_id) ? $staff_id->staff_id : '',
				);
				$this->load->view('templates/header', $data);
				$this->load->view('pages/dashboard', $data);
				$this->load->view('templates/footer');
			} else {
				redirect('aff-check');
			}
		} else {
			redirect('/');
		}
	}

	public function check()
	{
		if ($this->session->userdata('user')) {
			$data = array(
				'user' => $this->session->userdata('user')
			);
			$this->load->view('templates/header', $data);
			$this->load->view('pages/affcheck', $data);
			$this->load->view('templates/footer');
		} else {
			redirect('/');
		}
	}

	public function affCheck()
	{ }
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
