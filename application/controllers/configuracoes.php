<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Configuracoes_model');

    if(!$this->session->userdata('is_logged_in')){
      redirect('admin/login');
    }
  }

  public function index() {
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[4]|max_length[100]');
			$this->form_validation->set_rules('endereco', 'Endereços', 'trim|required|min_length[4]|max_length[100]');
      $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required|min_length[4]|max_length[50]');
      $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required|min_length[4]|max_length[50]');
      $this->form_validation->set_rules('estado', 'Estado', 'trim|required|min_length[2]|max_length[2]');
      $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required|min_length[4]|max_length[15]');
      $this->form_validation->set_rules('celular', 'Celular', 'trim|required|min_length[4]|max_length[15]');
      $this->form_validation->set_rules('email', 'E-mail', 'trim|required|email|min_length[4]|max_length[50]');
      $this->form_validation->set_rules('maps', 'Maps', 'trim|required|min_length[4]|');
			$this->form_validation->set_error_delimiters('<span>', '</span>');
			if($this->form_validation->run() != FALSE) {
        $data_update = array(
          'nome' => $this->input->post('nome'),
          'endereco' => $this->input->post('endereco'),
          'bairro' => $this->input->post('bairro'),
          'cidade' => $this->input->post('cidade'),
          'estado' => $this->input->post('estado'),
          'telefone' => $this->input->post('telefone'),
          'celular' => $this->input->post('celular'),
          'email' => $this->input->post('email'),
          'maps' => $this->input->post('maps'),
          'facebook' => $this->input->post('facebook'),
          'twitter' => $this->input->post('twitter'),
          'instagram' => $this->input->post('instagram'),
          'linkedin' => $this->input->post('linkedin')
        );
				if($query = $this->Configuracoes_model->update(1,$data_update)) {
					$data['message_error'] = "Alteração realizada com sucesso";
				} else {
					$data['message_error'] = "Houve um erro ao Alterar. Por favor confira os dados cadastrados e tente novamente";
				}
			}
		}
    $data['configuracoes'] = $this->Configuracoes_model->get_configuracoes_by_id(1);
    $data['main_content'] = 'admin/configuracoes/index';
    $this->load->view('includes/admin_template', $data);
  }
}
