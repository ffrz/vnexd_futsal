<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Base extends CI_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_superadmin() && !$this->ion_auth->is_admin()) {
            redirect(base_url());
        }
    }

    public function flashMessage($type, $message)
    {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-' . $type . '"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> ' . $message .
            '</div>');
    }
}
