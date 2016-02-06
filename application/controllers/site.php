<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Novidades_model');
  }

  public function index() {
    $data['main_content'] = 'site/index';
    $this->load->view('includes/site_template', $data);
  }

  public function novidades() {
    $data['main_content'] = 'site/novidades';
    $data["novidades"] = $this->Novidades_model->get_novidades_site();
    $this->load->view('includes/site_template', $data);
  }

  public function novidade_url() {
    $url = $this->uri->segment(3);
    $data['main_content'] = 'site/novidade';
    $data["novidades"] = $this->Novidades_model->get_novidade_by_url($url);
    foreach ($data["novidades"] as $novidade) {
      $data['meta']['title'] = $novidade->titulo;
      $data['meta']['description'] = $novidade->descricao;
      $data['meta']['keywords'] = $novidade->palavras_chave;
    }
    $this->load->view('includes/site_template', $data);
  }

  public function quem_sou() {
    $data['main_content'] = 'site/quem-sou';
    $this->load->view('includes/site_template', $data);
  }

  public function o_que_faco() {
    $data['main_content'] = 'site/o-que-faco';
    $this->load->view('includes/site_template', $data);
  }

  public function contato() {
    $data['main_content'] = 'site/contato';
    $this->load->view('includes/site_template', $data);
  }

  public function not_found() {
    $data['main_content'] = 'site/404';
    $this->load->view('includes/site_template', $data);
  }

  public function termos_de_uso() {
    $data['main_content'] = 'site/termos-de-uso';
    $this->load->view('includes/site_template', $data);
  }

  public function politicas_de_privacidade() {
    $data['main_content'] = 'site/politicas-de-privacidade';
    $this->load->view('includes/site_template', $data);
  }

  public function enviar_mensagem() {
    $this->form_validation->set_rules('nome', 'Nome', 'trim|required|xss_clean');
    $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
    $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required|xss_clean');
    $this->form_validation->set_rules('endereco', 'Endereco', 'trim|required|xss_clean');
    $this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required|xss_clean');

    if ($this->form_validation->run() == FALSE) {
      $data['main_content'] = 'site/contato';
      $this->load->view('includes/site_template', $data);
    } else {
      $nome = $this->input->post('nome');
      $from_email = $this->input->post('email');
      $telefone = $this->input->post('telefone');
      $endereco = $this->input->post('endereco');
      $titulo = 'Contato do Site André Dourado';
      $mensagem = 'Contato de telefone: '.$telefone.'<br/>Contato de endereco: '.$endereco.'<br/>Mensagem: '.$this->input->post('mensagem');

      $to_email = 'andredourado@ig.com.br';

      $config['protocol'] = 'smtp';
      $config['smtp_host'] = 'ssl://smtp.gmail.com';
      $config['smtp_port'] = '465';
      $config['smtp_user'] = 'user@gmail.com';
      $config['smtp_pass'] = 'password';
      $config['mailtype'] = 'html';
      $config['charset'] = 'iso-8859-1';
      $config['wordwrap'] = TRUE;
      $config['newline'] = "\r\n";

      $this->email->initialize($config);

      $this->email->from($from_email, $nome);
      $this->email->to($to_email);
      $this->email->subject($titulo);
      $this->email->message($mensagem);

      if ($this->email->send()) {
        $data['message_error'] = "E-mail devidamente enviado";
        $data['main_content'] = 'site/contato';
        $this->load->view('includes/site_template', $data);
      } else {
        $data['message_error'] = "Houve um erro ao enviar o e-mail. Tente novamente mais tarde";
        $data['main_content'] = 'site/contato';
        $this->load->view('includes/site_template', $data);
      }
    }
  }
}
