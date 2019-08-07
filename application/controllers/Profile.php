<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->library('session');
  }

  public function index()
  {
    $user = $this->session->userdata('user');
    if ($user) {
      $user = $this->users_model->show($user->id);
      $data = array('user' => $user);

      $this->load->view('templates/header', $data);
      $this->load->view('pages/profile', $data);
      $this->load->view('templates/footer');
    } else {
      redirect('/');
    }
  }

  public function updateData()
  {
    $this->form_validation->set_rules("firstName", 'first name', 'trim|required');
    $this->form_validation->set_rules("lastName", 'last name', 'trim|required');
    $this->form_validation->set_rules("phone", 'phone', 'trim|min_length[10]|numeric');

    if ($this->form_validation->run() === FALSE) {
      $errors = array();
      foreach ($this->input->post() as $key => $v) {
        $errors[$key] = form_error($key, '<span class="text-danger d-block s-v-e">', '</span>');
      }
      $response = array('status' => 400, 'errors' => array_filter($errors));
      exit(json_encode($response));
    } else {
      $user = $this->session->userdata("user");

      if ($user) {
        $data = array(
          'first_name' => $this->input->post('firstName'),
          'last_name' => $this->input->post('lastName'),
          'phone' => $this->input->post('phone'),
        );

        $update = $this->users_model->updateMask($data, $user->mask_id);
        if ($update) {
          $u = $this->users_model->show($user->id);
          $this->session->unset_userdata('user');
          $this->session->set_userdata('user', $u);

          $response = array('status' => 200, 'msg' => 'Deatils updated successfully');
        } else {
          $response = array('status' => 401, 'msg' => 'An error occured in updating your password');
        }
      } else {
        $response = array('status' => 401, 'msg' => "You don't have permission to perform this action");
      }

      echo json_encode($response);
    }
  }

  public function updatePassword()
  {
    $this->form_validation->set_rules("opassword", 'old password', 'trim|required');
    $this->form_validation->set_rules("password", 'new password', 'trim|required|min_length[8]|max_length[20]');
    $this->form_validation->set_rules("cpassword", 'confirm password', 'trim|required|matches[password]');

    if ($this->form_validation->run() === FALSE) {
      $errors = array();
      foreach ($this->input->post() as $key => $v) {
        $errors[$key] = form_error($key, '<span class="text-danger d-block s-v-e">', '</span>');
      }
      $response = array('status' => 400, 'errors' => array_filter($errors));
      exit(json_encode($response));
    } else {
      $user = $this->session->userdata("user");

      if ($user) {
        $password = $this->input->post('password');
        $opassword = $this->input->post('opassword');
        if (password_verify($opassword, $user->password)) {
          $update = $this->users_model->updateMask([
            'password' => password_hash($password, PASSWORD_DEFAULT)
          ], $user->mask_id);

          if ($update) {
            $response = array('status' => 200, 'msg' => 'Password changed successfully. Logging you out. Login with your new password');
          } else {
            $response = array('status' => 401, 'msg' => 'An error occured in updating your password');
          }
        } else {
          $response = array('status' => 400, 'errors' => [
            'opassword' => '<span class="text-danger d-block s-v-e">The old password is incorrect</span>'
          ]);
        }
      } else {
        $response = array('status' => 401, 'msg' => "You don't have permission to perform this action");
      }

      echo json_encode($response);
    }
  }
}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
