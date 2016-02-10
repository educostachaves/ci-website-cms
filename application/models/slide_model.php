<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function create($data) {
		$insert = $this->db->insert('slide', $data);
		return $insert;
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('slide');
	}

	function update($id, $data) {
		$update = $this->db->where('id', $id);
		$update = $this->db->update('slide', $data);
		return $update;
	}

	function get_slides() {
		$query = $this->db->get('slide');
		return $query->result();
	}

	function get_slide_by_id($id)	{
		$this->db->where('id', $id);
		$query = $this->db->get('slide');
		return $query->result();
	}

	function get_slide_image_by_id($id)	{
		$this->db->select('imagem');
		$this->db->where('id', $id);
		$query = $this->db->get('slide');
		if ($query->num_rows() > 0) {
		   $row = $query->row();
		   return $row->imagem;
		}
	}

	function count_slides() {
		return $this->db->count_all_results('slide');
	}

}
