<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linguagens extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Linguagens_model');
    $this->load->library('pagination');

    if(!$this->session->userdata('is_logged_in')){
      redirect('admin/login');
    }
  }

  public function index() {
    $maximo = 20;
    $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

    $config['base_url'] = base_url().'admin/linguagens';
		$config['total_rows'] = $this->Linguagens_model->count_linguagens();
		$config['per_page'] = $maximo;
		$config['num_links'] = 9;

		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';

		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['first_link'] = '<i class="fa fa-arrow-left"></i>';

		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = '<i class="fa fa-arrow-right"></i>';

		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['next_link'] = '<i class="fa fa-chevron-right"></i>';

		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-chevron-left"></i>';

		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$data["paginacao"] =  $this->pagination->create_links();
		$data["linguagens"] = $this->Linguagens_model->get_linguagens($maximo,$inicio);
    $data['main_content'] = 'admin/linguagens/list';
    $this->load->view('includes/admin_template', $data);
  }

  public function create() {
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('sigla', 'Sigla', 'trim|required|min_length[2]|max_length[2]');
      $this->form_validation->set_error_delimiters('<span>', '</span>');
			if($this->form_validation->run() != FALSE) {
        $data_insert = array(
          'titulo' => $this->input->post('titulo'),
          'sigla' => $this->input->post('sigla')
        );
        if($query = $this->Linguagens_model->create($data_insert)) {
					$data['message_error'] = "Cadastro realizado com sucesso";
				} else {
					$data['message_error'] = "Houve um erro ao cadastrar. Por favor confira os dados cadastrados e tente novamente";
				}
      }
		}
    $data['main_content'] = 'admin/linguagens/create';
    $this->load->view('includes/admin_template', $data);
  }

  public function update() {
    $id = $this->uri->segment(4);
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
      $this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('sigla', 'Sigla', 'trim|required|min_length[2]|max_length[2]');
      $this->form_validation->set_error_delimiters('<span>', '</span>');
			if($this->form_validation->run() != FALSE) {
        $data_update = array(
          'titulo' => $this->input->post('titulo'),
          'sigla' => $this->input->post('sigla')
        );
				if($query = $this->Linguagens_model->update($id,$data_update)) {
					$data['message_error'] = "Alteração realizada com sucesso";
				} else {
					$data['message_error'] = "Houve um erro ao Alterar. Por favor confira os dados cadastrados e tente novamente";
				}
			}
		}
    $data['linguagens'] = $this->Linguagens_model->get_linguagem_by_id($id);
    $data['main_content'] = 'admin/linguagens/edit';
    $this->load->view('includes/admin_template', $data);
  }

  public function delete() {
		$id = $this->uri->segment(4);
		if ($this->Linguagens_model->delete($id)) {
			$data['message_error'] = "Exclusão realizada com sucesso";
			$data['main_content'] = 'admin/linguagens/list';
			$this->load->view('includes/admin_template', $data);
		} else {
			$data['message_error'] = "Houve um erro ao excluir";
			$data['main_content'] = 'admin/linguagens/list';
			$this->load->view('includes/admin_template', $data);
		}
	}

}