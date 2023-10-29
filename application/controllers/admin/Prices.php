<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

require_once __DIR__ . '/Base.php';

class Prices extends Base
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Price_model');
    $this->data['module'] = 'Tarif Sewa';
  }

  public function index()
  {
    $this->data['title'] = 'Data ' . $this->data['module'];
    $this->data['prices'] = $this->Price_model->get_all();

    $this->load->view('back/prices/index', $this->data);
  }

  public function save()
  {
    $prices = $this->input->post('prices');
    $this->db->trans_start();
    foreach ($prices as $hour => $price) {
      $this->Price_model->update($hour, ['price' => $price]);
    }
    $this->db->trans_complete();
    $this->flashMessage('success', 'Data berhasil disimpan');

    redirect(site_url('admin/prices'));
  }
}
