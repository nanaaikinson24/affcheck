<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		$user = $this->session->userdata('user');

		if($user){
			if ($user->role == 'admin') {
				$data = array(
					'user' => $user
				);
				$this->load->view('templates/header', $data);
				$this->load->view('pages/dashboard', $data);
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

	public function check()
	{
		$this->load->library('session');

		if($this->session->userdata('user')){
			$data = array(
				'user' => $this->session->userdata('user')
			);
			$this->load->view('templates/header', $data);
			$this->load->view('pages/affcheck', $data);
			$this->load->view('templates/footer');
		}
		else{
			redirect('/');
		}
	}

	public function affCheck()
	{

	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */