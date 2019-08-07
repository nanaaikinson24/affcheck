<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
  public function storeSearch($data)
  {
    $this->db->cache_on();
    $this->db->insert('searches', $data);
    return $this->db->insert_id();
  }

  public function searchCount()
  {
    $this->db->cache_on();
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
    $this->db->cache_on();
    $sql = 'SELECT `query` AS staff_id FROM	searches GROUP BY	id ORDER BY	COUNT( * ) DESC';
    $query = $this->db->query($sql);
    return $query->row();
  }
}

/* End of file Search_model.php */
/* Location: ./application/models/Search_model.php */
