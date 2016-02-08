<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuracoes_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function update($id, $data) {
		$update = $this->db->where('id', $id);
		$update = $this->db->update('configuracoes', $data);
		return $update;
	}

	function get_configuracoes_by_id($id) {
		$update = $this->db->where('id', $id);
		$query = $this->db->get('configuracoes');
		return $query->result();
	}

	function get_configuracoes_nome($id = 1) {
		$this->db->select('nome');
		$this->db->where('id', $id);
		$query = $this->db->get('configuracoes');
		if ($query->num_rows() > 0) {
		   $row = $query->row();
		   return $row->nome;
		}
	}

}
