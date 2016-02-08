<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->model('Configuracoes_model');
	}

	public function index() {
		if($this->session->userdata('is_logged_in')){
			redirect('admin/painel');
		}else{
			$this->load->view('admin/login');
		}
	}

	public function list_all() {
		$maximo = 20;
		$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$data_filter = array(
				'usuario_user' => $this->input->post('usuario'),
				'email_user' => $this->input->post('email'),
				'tipo_user' => $this->input->post('tipo')
			);
			$data_user = array(
				'usuario' => $this->input->post('usuario'),
				'email' => $this->input->post('email'),
				'tipo' => $this->input->post('tipo')
			);
		} else {
			$data_filter = array(
				'usuario_user' => $this->session->userdata('usuario_user'),
				'email_user' => $this->session->userdata('email_user'),
				'tipo_user' => $this->session->userdata('tipo_user')
			);
			$data_user = array(
				'usuario' => $this->session->userdata('usuario_user'),
				'email' => $this->session->userdata('email_user'),
				'tipo' => $this->session->userdata('tipo_user')
			);
		}
		$this->session->set_userdata($data_filter);
		$config['base_url'] = base_url().'admin/usuarios';
		$config['total_rows'] = $this->Users_model->countUsuarios($data_user);
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
		$data["lista_tipo_usuario"] = $this->Users_model->getTipoUsuario();
		$data["paginacao"] =  $this->pagination->create_links();
		$data["usuarios"] = $this->Users_model->getUsuarios($maximo, $inicio, $data_user);
		$data['main_content'] = 'admin/usuarios/list';
		$data['filter'] = $this->session->all_userdata();
		$this->load->view('includes/admin_template', $data);
	}

	public function validate_credentials() {
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$is_valid = $this->Users_model->validate($email, $password);
		if($is_valid) {
			$data = array(
				'id_login' => $is_valid->id,
				'usuario_login' => $is_valid->nome,
				'email_login' => $email,
				'tipo_usuario_login' => $is_valid->tipo,
				'is_logged_in' => true,
				'page_name' => $this->Configuracoes_model->get_configuracoes_nome()
			);
			$this->session->set_userdata($data);
			redirect('admin/painel');
		} else {
			$data['message_error'] = "Login ou senha inválidos";
			$this->load->view('admin/login', $data);
		}
	}

	public function create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			// field name, error message, validation rules
			$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('password2', 'Confirmar Senha', 'trim|required|matches[password]');
			$this->form_validation->set_rules('tipo', 'Tipo', 'trim|required');
			$this->form_validation->set_error_delimiters('<span>', '</span>');
			if($this->form_validation->run() != FALSE) {
				if($query = $this->Users_model->create()) {
					$data['message_error'] = "Seu usuário foi devidamente cadastrado";
				} else {
					$data['message_error'] = "Houve um erro ao criar o usuário. Por favor confira os dados cadastrados e tente novamente";
				}
			}
		}

		$data['main_content'] = 'admin/usuarios/create';
		$this->load->view('includes/admin_template', $data);
	}

	public function update() {
		$id = $this->uri->segment(4);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Senha', 'trim|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('password2', 'Confirmar Senha', 'trim|matches[password]');
			$this->form_validation->set_rules('tipo', 'Tipo', 'trim|required');
			$this->form_validation->set_error_delimiters('<span>', '</span>');
			if($this->form_validation->run() != FALSE) {
				if ( $this->input->post('password') != ''){
					$data_insert = array(
						'nome' => $this->input->post('nome'),
						'email' => $this->input->post('email'),
						'tipo' => $this->input->post('tipo'),
						'password' => md5($this->input->post('password'))
					);
				} else {
					$data_insert = array(
						'nome' => $this->input->post('nome'),
						'email' => $this->input->post('email'),
						'tipo' => $this->input->post('tipo')
					);
				}
				if($query = $this->Users_model->update($id, $data_insert)) {
					$data['message_error'] = "Usuario devidamente alterado";
				} else {
					$data['message_error'] = "Este Usuário não pode ser alterado.";
				}
			}
		}
		$data["usuarios"] = $this->Users_model->getUserById($id);
		$data['main_content'] = 'admin/usuarios/edit';
		$this->load->view('includes/admin_template', $data);
	}

	public function delete() {
		$id = $this->uri->segment(4);
		if ($this->Users_model->delete($id)) {
			$data['message_error'] = "Usuário devidamente Excluido";
			$data['main_content'] = 'admin/usuarios/list';
			$this->load->view('includes/template', $data);
		} else {
			$data['message_error'] = "houve um erro ao excluir este Usuário";
			$data['main_content'] = 'admin/usuarios/list';
			$this->load->view('includes/template', $data);
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('admin');
	}

}
