<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("data_model");
  }

  public function index()
  {
    $this->load->library('session');
    $user = $user = $this->session->userdata('user');

    if ($user) {
      if ($user->role == 'admin') {
        $results = $this->data_model->searchResults();
        $data = array(
          'results' => $results,
          'user' => $user
        );
        $this->load->view('templates/header', $data);
        $this->load->view('pages/search', $data);
        $this->load->view('templates/footer');
      } else {
        redirect('aff-check');
      }
    } else {
      redirect('/');
    }
  }

  public function serachResults()
  { }
}

/* End of file Search.php */
/* Location: ./application/controllers/Search.php */
