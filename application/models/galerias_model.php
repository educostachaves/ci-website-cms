<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galerias_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function create($data) {
		$insert = $this->db->insert('galeria', $data);
		return $insert;
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('galeria');
	}

	function update($id, $data) {
		$update = $this->db->where('id', $id);
		$update = $this->db->update('galeria', $data);
		return $update;
	}

	function get_galerias($maximo, $inicio) {
		$query = $this->db->get('galeria', $maximo, $inicio);
		return $query->result();
	}

	function get_galerias_site() {
		$query = $this->db->get('galeria');
		return $query->result();
	}

	function get_galeria_by_id($id)	{
		$this->db->where('id', $id);
		$query = $this->db->get('galeria');
		return $query->result();
	}

	function get_imagens_by_galeria_id($id)	{
		$this->db->select('*');
		$this->db->where('galeria', $id);
		$query = $this->db->get('galeria_imagem');
		return $query->result();
	}

	function get_galeria_titulo_by_id($id)	{
		$this->db->select('titulo');
		$this->db->where('id', $id);
		$query = $this->db->get('galeria');
		if ($query->num_rows() > 0) {
		   $row = $query->row();
		   return $row->titulo;
		}
	}

	function get_galeria_by_url($url)	{
		$this->db->select('galeria.url, galeria_imagem.*');
		$this->db->from('galeria');
		$this->db->join('galeria_imagem', 'galeria_imagem.galeria = galeria.id');
		$this->db->where('galeria.url', $url);
		$query = $this->db->get();
		return $query->result();
	}

	function get_galeria_imagem_by_id($id)	{
		$this->db->select('url');
		$this->db->where('id', $id);
		$query = $this->db->get('galeria_imagem');
		if ($query->num_rows() > 0) {
		   $row = $query->row();
		   return $row->url;
		}
	}

	function get_imagem_by_id($id) {
		$this->db->select('imagem');
		$this->db->where('id', $id);
		$query = $this->db->get('galeria');
		if ($query->num_rows() > 0) {
		   $row = $query->row();
		   return $row->imagem;
		}
	}

	function get_galeria_id_by_galeria_imagem_id($id) {
		$this->db->select('galeria');
		$this->db->where('id', $id);
		$query = $this->db->get('galeria_imagem');
		if ($query->num_rows() > 0) {
		   $row = $query->row();
		   return $row->galeria;
		}
	}

	function insert_imagens($data)	{
		$insert = $this->db->insert('galeria_imagem', $data);
		return $insert;
	}

	function delete_image($id){
		$this->db->where('id', $id);
		$this->db->delete('galeria_imagem');
	}

	function count_galerias() {
		return $this->db->count_all_results('galeria');
	}

}
