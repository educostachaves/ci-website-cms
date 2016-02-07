<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Novidades extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Novidades_model');
    $this->load->model('Linguagens_model');
    $this->load->library('pagination');
  }

  public function index() {
    $maximo = 20;
    $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

    $config['base_url'] = base_url().'admin/novidades';
		$config['total_rows'] = $this->Novidades_model->count_novidades();
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
    $data["lista_linguagens"] = $this->Linguagens_model->get_all_linguagens();
		$data["novidades"] = $this->Novidades_model->get_novidades($maximo,$inicio);
    $data['main_content'] = 'admin/novidades/list';
    $this->load->view('includes/admin_template', $data);
  }

  public function create() {
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[4]|max_length[140]');
			$this->form_validation->set_rules('palavras_chave', 'Palavras chave', 'trim|required|min_length[4]|max_length[140]');
      $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[4]|max_length[300]');
			$this->form_validation->set_rules('texto', 'Texto', 'trim|required');
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
            'titulo' => $this->input->post('titulo'),
            'lingua' => $this->input->post('lingua'),
            'imagem' => $file_data['file_name'],
            'descricao' => $this->input->post('descricao'),
            'autor' => $this->input->post('autor'),
            'palavras_chave' => $this->input->post('palavras_chave'),
            'texto' => $this->input->post('texto'),
            'url' => strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('titulo'))),
            'data' => date("Y-m-d H:i:s")
          );
          if($query = $this->Novidades_model->create($data_insert)) {
  					$data['message_error'] = "Cadastro realizado com sucesso";
  				} else {
  					$data['message_error'] = "Houve um erro ao cadastrar. Por favor confira os dados cadastrados e tente novamente";
  				}
        }
      }
		}
    $data["lista_linguagens"] = $this->Linguagens_model->get_all_linguagens();
    $data['main_content'] = 'admin/novidades/create';
    $this->load->view('includes/admin_template', $data);
  }

  public function update() {
    $id = $this->uri->segment(4);
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[4]|max_length[140]');
			$this->form_validation->set_rules('palavras_chave', 'Palavras chave', 'trim|required|min_length[4]|max_length[140]');
      $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[4]|max_length[300]');
			$this->form_validation->set_rules('texto', 'Texto', 'trim|required');
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
              'titulo' => $this->input->post('titulo'),
              'imagem' => $file_data['file_name'],
              'descricao' => $this->input->post('descricao'),
              'autor' => $this->input->post('autor'),
              'palavras_chave' => $this->input->post('palavras_chave'),
              'texto' => $this->input->post('texto'),
              'url' => strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('titulo'))),
              'data' => date("Y-m-d H:i:s")
            );
          }
        } else {
          $data_update = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'autor' => $this->input->post('autor'),
            'palavras_chave' => $this->input->post('palavras_chave'),
            'texto' => $this->input->post('texto'),
            'url' => preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('titulo')),
            'data' => date("Y-m-d H:i:s")
          );
        }
				if($query = $this->Novidades_model->update($id,$data_update)) {
					$data['message_error'] = "Alteração realizada com sucesso";
				} else {
					$data['message_error'] = "Houve um erro ao Alterar. Por favor confira os dados cadastrados e tente novamente";
				}
			}
		}
    $data['novidades'] = $this->Novidades_model->get_novidade_by_id($id);
    $data['main_content'] = 'admin/novidades/edit';
    $this->load->view('includes/admin_template', $data);
  }

  public function delete() {
		$id = $this->uri->segment(4);
    unlink("./uploads/".$this->Novidades_model->get_imagem_by_id($id));
		if ($this->Novidades_model->delete($id)) {
			$data['message_error'] = "Exclusão realizada com sucesso";
			$data['main_content'] = 'admin/novidades/list';
			$this->load->view('includes/admin_template', $data);
		} else {
			$data['message_error'] = "Houve um erro ao excluir";
			$data['main_content'] = 'admin/novidades/list';
			$this->load->view('includes/admin_template', $data);
		}
	}

}
