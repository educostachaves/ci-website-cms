<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Slide_model');
    $this->load->model('Paginas_model');

    if(!$this->session->userdata('is_logged_in')){
      redirect('admin/login');
    }
  }

  public function index() {
		$data["slides"] = $this->Slide_model->get_slides();
    $data['main_content'] = 'admin/slides/list';
    $this->load->view('includes/admin_template', $data);
  }

  public function create() {
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('titulo_br', 'Título', 'trim|required|min_length[4]|max_length[30]');
      $this->form_validation->set_rules('descricao_br', 'Descrição', 'trim|required|min_length[4]|max_length[140]');
			$this->form_validation->set_error_delimiters('<span>', '</span>');
			if($this->form_validation->run() != FALSE) {
        $config = array(
          'upload_path' => "./uploads/",
          'file_name' => date('YmdHms').rand(000000,999999).'.'.pathinfo($_FILES["imagem"]['name'], PATHINFO_EXTENSION),
          'allowed_types' => "jpg|png|jpeg",
          'overwrite' => TRUE,
          'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('imagem')) {
          $data['message_error'] = $this->upload->display_errors();
        } else {
          $file_data = $this->upload->data();
          $data_insert = array(
            'titulo_br' => $this->input->post('titulo_br'),
            'titulo_en' => $this->input->post('titulo_en'),
            'titulo_es' => $this->input->post('titulo_es'),
            'imagem' => $file_data['file_name'],
            'link' => $this->input->post('link'),
            'descricao_br' => $this->input->post('descricao_br'),
            'descricao_en' => $this->input->post('descricao_en'),
            'descricao_es' => $this->input->post('descricao_es'),
          );
          if($query = $this->Slide_model->create($data_insert)) {
  					$data['message_error'] = "Cadastro realizado com sucesso";
  				} else {
  					$data['message_error'] = "Houve um erro ao cadastrar. Por favor confira os dados cadastrados e tente novamente";
  				}
        }
      }
		}
    $data['lista_paginas'] = $this->Paginas_model->get_paginas_site();
    $data['main_content'] = 'admin/slides/create';
    $this->load->view('includes/admin_template', $data);
  }

  public function update() {
    $id = $this->uri->segment(4);
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('titulo_br', 'Título', 'trim|required|min_length[4]|max_length[140]');
			$this->form_validation->set_rules('palavras_chave', 'Palavras chave', 'trim|required|min_length[4]|max_length[140]');
      $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[4]|max_length[300]');
			$this->form_validation->set_rules('texto_br', 'Texto', 'trim|required');
			$this->form_validation->set_error_delimiters('<span>', '</span>');
			if($this->form_validation->run() != FALSE) {
        if (!empty($_FILES["imagem"]['name'])) {
          $config = array(
            'upload_path' => "./uploads/",
            'file_name' => date('YmdHms').rand(000000,999999).'.'.pathinfo($_FILES["imagem"]['name'], PATHINFO_EXTENSION),
            'allowed_types' => "jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
          );
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('imagem')) {
            $data['message_error'] = $this->upload->display_errors();
          } else {
            unlink("./uploads/".$this->Novidades_model->get_imagem_by_id($id));
            $file_data = $this->upload->data();
            $data_update = array(
              'titulo_br' => $this->input->post('titulo_br'),
              'titulo_en' => $this->input->post('titulo_en'),
              'titulo_es' => $this->input->post('titulo_es'),
              'imagem' => $file_data['file_name'],
              'link' => $this->input->post('link'),
              'descricao_br' => $this->input->post('descricao_br'),
              'descricao_en' => $this->input->post('descricao_en'),
              'descricao_es' => $this->input->post('descricao_es'),
            );
          }
        } else {
          $data_update = array(
            'titulo_br' => $this->input->post('titulo_br'),
            'titulo_en' => $this->input->post('titulo_en'),
            'titulo_es' => $this->input->post('titulo_es'),
            'link' => $this->input->post('link'),
            'descricao_br' => $this->input->post('descricao_br'),
            'descricao_en' => $this->input->post('descricao_en'),
            'descricao_es' => $this->input->post('descricao_es'),
          );
        }
				if($query = $this->Slide_model->update($id,$data_update)) {
					$data['message_error'] = "Alteração realizada com sucesso";
				} else {
					$data['message_error'] = "Houve um erro ao Alterar. Por favor confira os dados cadastrados e tente novamente";
				}
			}
		}
    $data['lista_paginas'] = $this->Paginas_model->get_paginas_site();
    $data['slides'] = $this->Slide_model->get_slide_by_id($id);
    $data['main_content'] = 'admin/slides/edit';
    $this->load->view('includes/admin_template', $data);
  }

  public function delete() {
		$id = $this->uri->segment(4);
    unlink("./uploads/".$this->Slide_model->get_slide_image_by_id($id));
		if ($this->Slide_model->delete($id)) {
			$data['message_error'] = "Exclusão realizada com sucesso";
			$data['main_content'] = 'admin/slides/list';
			$this->load->view('includes/admin_template', $data);
		} else {
			$data['message_error'] = "Houve um erro ao excluir";
			$data['main_content'] = 'admin/slides/list';
			$this->load->view('includes/admin_template', $data);
		}
	}

}
