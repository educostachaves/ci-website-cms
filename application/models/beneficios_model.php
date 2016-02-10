<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beneficios_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function create($data) {
		$insert = $this->db->insert('beneficio', $data);
		return $insert;
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('beneficio');
	}

	function update($id, $data) {
		$update = $this->db->where('id', $id);
		$update = $this->db->update('beneficio', $data);
		return $update;
	}

	function get_beneficios() {
		$query = $this->db->get('beneficio');
		return $query->result();
	}

	function get_beneficio_by_id($id)	{
		$this->db->where('id', $id);
		$query = $this->db->get('beneficio');
		return $query->result();
	}

	function get_beneficio_image_by_id($id)	{
		$this->db->select('imagem');
		$this->db->where('id', $id);
		$query = $this->db->get('beneficio');
		if ($query->num_rows() > 0) {
		   $row = $query->row();
		   return $row->imagem;
		}
	}

	function count_beneficios() {
		return $this->db->count_all_results('beneficio');
	}

}
