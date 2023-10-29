<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Price_model extends CI_Model
{
  public $table = 'prices';
  public $id    = 'hour';
  public $order = 'ASC';

  function get_all()
  {
    return $this->db->get($this->table)->result();
  }

  function update($id, $data)
  {
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
  }
}
