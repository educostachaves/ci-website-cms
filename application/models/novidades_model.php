<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Novidades_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function create($data) {
		$insert = $this->db->insert('novidade', $data);
		return $insert;
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('novidade');
	}

	function update($id, $data) {
		$update = $this->db->where('id', $id);
		$update = $this->db->update('novidade', $data);
		return $update;
	}

	function get_novidades($maximo, $inicio) {
		$query = $this->db->get('novidade', $maximo, $inicio);
		return $query->result();
	}

	function get_novidades_site() {
		$query = $this->db->get('novidade');
		return $query->result();
	}

	function get_novidade_by_id($id)	{
		$this->db->where('id', $id);
		$query = $this->db->get('novidade');
		return $query->result();
	}

	function get_imagem_by_id($id)	{
		$this->db->select('imagem');
		$this->db->where('id', $id);
		$query = $this->db->get('novidade');
		if ($query->num_rows() > 0) {
		   $row = $query->row();
		   return $row->imagem;
		}
	}

	function get_novidade_by_url($url)	{
		$this->db->like('url', $url);
		$query = $this->db->get('novidade');
		return $query->result();
	}

	function count_novidades() {
		return $this->db->count_all_results('novidade');
	}

}
