<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
	public function getUserEmail($email)
	{
		return $this->db->where("email", $email)->get("users")->row();
	}

	public function show($id)
	{
		return $this->db->where("id", $id)->get("users")->row();
	}

	public function showMask($id)
	{
		return $this->db->where("mask_id", $id)->get("users")->row();
	}

	public function getUsers()
	{
		return $this->db->get('users')->result();
	}

	public function store($data)
	{
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	public function updateMask($data, $id)
	{
		return $this->db
			->where('mask_id', $id)
			->update('users', $data);
	}

	public function countAll()
	{
		return $this->db->count_all('users');
	}
}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
