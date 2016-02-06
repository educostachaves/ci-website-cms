<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Novidades_model');
    if(!$this->session->userdata('is_logged_in')){
      redirect('admin/login');
    }
  }

  public function index() {
    $data['total_novidades'] = $this->Novidades_model->count_novidades();
    $data['main_content'] = 'admin/panel/index';
    $this->load->view('includes/admin_template', $data);
  }
}
