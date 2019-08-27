<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
  public function storeSearch($data)
  {
    $this->db->insert('searches', $data);
    return $this->db->insert_id();
  }

  public function searchCount()
  {
    return $this->db->count_all('searches');
  }

  public function searchCountNow($date)
  {
    $sql = "SELECT COUNT(*) as `count` FROM searches WHERE DATE(created_at) = '$date'";
    $query = $this->db->query($sql);
    return $query->row();
  }

  public function mostOccurredSearch()
  {
    $sql = 'SELECT `query` AS staff_id FROM	searches GROUP BY	id ORDER BY	COUNT( * ) DESC';
    $query = $this->db->query($sql);
    return $query->row();
  }

  public function searchResults()
  {
    $sql = "SELECT s.*, CONCAT(u.first_name, ' ', u.last_name) as user FROM searches as s LEFT JOIN users as u ON s.search_by = u.id";
    $query = $this->db->query($sql);
    return $query->result();
  }
}

/* End of file Search_model.php */
/* Location: ./application/models/Search_model.php */
