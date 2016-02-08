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

	function get_imagem_by_id($id)	{
		$this->db->select('imagem');
		$this->db->where('id', $id);
		$query = $this->db->get('galeria');
		if ($query->num_rows() > 0) {
		   $row = $query->row();
		   return $row->imagem;
		}
	}

	function count_galerias() {
		return $this->db->count_all_results('galeria');
	}

}
