<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Novidades_model');
    $this->load->model('Configuracoes_model');
    $this->load->model('Paginas_model');
    $this->load->model('Galerias_model');

    $data_social = array();
    foreach ($this->Configuracoes_model->get_social_links() as $social) {
      $data_website = array(
        'titulo_pagina' => $social->nome,
        'facebook_link' => $social->facebook,
        'twitter_link' => $social->twitter,
        'instagram_link' => $social->instagram,
        'linkedin_link' => $social->linkedin
      );
    }
    $this->session->set_userdata($data_website);
  }

  public function index() {
    $data['carousel_home'] = $this->Galerias_model->get_galeria_by_url('carousel-home');
    $data['main_content'] = 'site/index';
    $data['contents'] = $this->Paginas_model->get_pagina_by_url('home');
    foreach ($data['contents'] as $content) {
      $data['meta']['title'] = $content->titulo_br;
      $data['meta']['description'] = $content->descricao;
      $data['meta']['keywords'] = $content->palavras_chave;
    }
    $this->load->view('includes/site_template', $data);
  }

  public function change_language() {
    $data_website = array(
      'language' => $this->input->post('language')
    );
    $this->session->set_userdata($data_website);
    redirect('/');
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
      $data['meta']['title'] = $novidade->titulo_br;
      $data['meta']['description'] = $novidade->descricao;
      $data['meta']['keywords'] = $novidade->palavras_chave;
    }
    $this->load->view('includes/site_template', $data);
  }

  public function sobre() {
    $data['contents'] = $this->Paginas_model->get_pagina_by_url('sobre');
    foreach ($data["contents"] as $content) {
      $data['meta']['title'] = $content->titulo_br;
      $data['meta']['description'] = $content->descricao;
      $data['meta']['keywords'] = $content->palavras_chave;
    }
    $data['main_content'] = 'site/simple_page';
    $this->load->view('includes/site_template', $data);
  }

  public function contato() {
    $data['configuracoes'] = $this->Configuracoes_model->get_social_links();
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
      $titulo = 'Contato do Site';
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
