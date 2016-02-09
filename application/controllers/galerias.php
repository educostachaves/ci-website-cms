<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galerias extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Galerias_model');
    $this->load->library('pagination');

    if(!$this->session->userdata('is_logged_in')){
      redirect('admin/login');
    }
  }

  public function index() {
    $maximo = 20;
    $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

    $config['base_url'] = base_url().'admin/galerias';
		$config['total_rows'] = $this->Galerias_model->count_galerias();
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
		$data["galerias"] = $this->Galerias_model->get_galerias($maximo,$inicio);
    $data['main_content'] = 'admin/galerias/list';
    $this->load->view('includes/admin_template', $data);
  }

  public function create() {
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[4]|max_length[40]');
      $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[4]|max_length[300]');
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
            'imagem' => $file_data['file_name'],
            'url' => 'url' => strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('titulo'))),
            'descricao' => $this->input->post('descricao')
          );
          if($query = $this->Galerias_model->create($data_insert)) {
  					$data['message_error'] = "Cadastro realizado com sucesso";
  				} else {
  					$data['message_error'] = "Houve um erro ao cadastrar. Por favor confira os dados cadastrados e tente novamente";
  				}
        }
      }
		}
    $data['main_content'] = 'admin/galerias/create';
    $this->load->view('includes/admin_template', $data);
  }

  public function update() {
    $id = $this->uri->segment(4);
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
      $this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[4]|max_length[40]');
      $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[4]|max_length[300]');
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
            unlink("./uploads/".$this->Galerias_model->get_imagem_by_id($id));
            $file_data = $this->upload->data();
            $data_update = array(
              'titulo' => $this->input->post('titulo'),
              'imagem' => $file_data['file_name'],
              'url' => 'url' => strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('titulo'))),
              'descricao' => $this->input->post('descricao')
            );
          }
        } else {
          $data_update = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'data' => date("Y-m-d H:i:s")
          );
        }
				if($query = $this->Galerias_model->update($id,$data_update)) {
					$data['message_error'] = "Alteração realizada com sucesso";
				} else {
					$data['message_error'] = "Houve um erro ao Alterar. Por favor confira os dados cadastrados e tente novamente";
				}
			}
		}
    $data['galerias'] = $this->Galerias_model->get_galeria_by_id($id);
    $data['main_content'] = 'admin/galerias/edit';
    $this->load->view('includes/admin_template', $data);
  }

  public function delete() {
		$id = $this->uri->segment(4);
    unlink("./uploads/".$this->Galerias_model->get_imagem_by_id($id));
		if ($this->Galerias_model->delete($id)) {
			$data['message_error'] = "Exclusão realizada com sucesso";
			$data['main_content'] = 'admin/galerias/list';
			$this->load->view('includes/admin_template', $data);
		} else {
			$data['message_error'] = "Houve um erro ao excluir";
			$data['main_content'] = 'admin/galerias/list';
			$this->load->view('includes/admin_template', $data);
		}
	}

  public function list_images() {
    $id = $this->uri->segment(4);

    $data['titulo_galeria'] = $this->Galerias_model->get_galeria_titulo_by_id($id);
		$data['imagens'] = $this->Galerias_model->get_imagens_by_galeria_id($id);
    $data['main_content'] = 'admin/galerias/list_images';
    $this->load->view('includes/admin_template', $data);
  }

  public function add_images() {
    $id = $this->uri->segment(5);

    $data['titulo_galeria'] = $this->Galerias_model->get_galeria_titulo_by_id($id);
    $data['main_content'] = 'admin/galerias/add_images';
    $this->load->view('includes/admin_template', $data);
  }

  public function upload() {
    $id = $this->uri->segment(5);

    $name_array = array();
    $count = count($_FILES['userfile']['size']);

    foreach($_FILES as $key=>$value){
      for($s = 0; $s <= $count - 1; $s++) {

        $_FILES['userfile']['name'] = date('YmdHms').rand(000000,999999).'.'.end(explode('.', $value['name'][$s]));
        $_FILES['userfile']['type'] = $value['type'][$s];
        $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
        $_FILES['userfile']['error'] = $value['error'][$s];
        $_FILES['userfile']['size'] = $value['size'][$s];

        $config = array(
          'upload_path' => "./uploads/",
          'allowed_types' => "jpg|png|jpeg",
          'overwrite' => TRUE,
          'max_size' => "2048000"
        );
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
          $data['message_error'] = $this->upload->display_errors();
        } else {
          $data = $this->upload->data();
          $data_insert = array(
            'galeria' => $id,
            'url' => $data['file_name']
          );

          if($query = $this->Galerias_model->insert_imagens($data_insert)) {
            $data['message_error'] = "Cadastro realizado com sucesso";
          } else {
            $data['message_error'] = "Houve um erro ao cadastrar. Por favor confira os dados cadastrados e tente novamente";
            $data['main_content'] = 'admin/galerias/add_images';
            $this->load->view('includes/admin_template', $data);
          }
        }
      }
    }

    $data['titulo_galeria'] = $this->Galerias_model->get_galeria_titulo_by_id($id);
    $data['main_content'] = 'admin/galerias/add_images';
    $this->load->view('includes/admin_template', $data);
  }

  public function delete_image() {
		$id = $this->uri->segment(5);
    unlink("./uploads/".$this->Galerias_model->get_galeria_imagem_by_id($id));
    $id_galeria = $this->Galerias_model->get_galeria_id_by_galeria_imagem_id($id);
		if ($this->Galerias_model->delete_image($id)) {
      redirect('admin/galerias/imagens/'.$id_galeria);
		} else {
			redirect('admin/galerias/imagens/'.$id_galeria);
		}
	}

}
