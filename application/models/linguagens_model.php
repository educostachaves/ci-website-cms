<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linguagens_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function create($data) {
		$insert = $this->db->insert('linguagem', $data);
		return $insert;
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('linguagem');
	}

	function update($id, $data) {
		$update = $this->db->where('id', $id);
		$update = $this->db->update('linguagem', $data);
		return $update;
	}

	function get_linguagens($maximo,$inicio) {
		$query = $this->db->get('linguagem', $maximo, $inicio);
		return $query->result();
	}

	function get_all_linguagens() {
		$query = $this->db->get('linguagem');
		return $query->result();
	}

	function get_linguagem_by_id($id)	{
		$this->db->where('id', $id);
		$query = $this->db->get('linguagem');
		return $query->result();
	}

	function count_linguagens() {
		return $this->db->count_all_results('linguagem');
	}

}
