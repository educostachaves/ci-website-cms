<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginas_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function create($data) {
		$insert = $this->db->insert('pagina', $data);
		return $insert;
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('pagina');
	}

	function update($id, $data) {
		$update = $this->db->where('id', $id);
		$update = $this->db->update('pagina', $data);
		return $update;
	}

	function get_paginas($maximo, $inicio) {
		$query = $this->db->get('pagina', $maximo, $inicio);
		return $query->result();
	}

	function get_paginas_site() {
		$query = $this->db->get('pagina');
		return $query->result();
	}

	function get_pagina_by_id($id)	{
		$this->db->where('id', $id);
		$query = $this->db->get('pagina');
		return $query->result();
	}

	function get_imagem_by_id($id)	{
		$this->db->select('imagem');
		$this->db->where('id', $id);
		$query = $this->db->get('pagina');
		if ($query->num_rows() > 0) {
		   $row = $query->row();
		   return $row->imagem;
		}
	}

	function get_pagina_by_url($url)	{
		$this->db->like('url', $url);
		$query = $this->db->get('pagina');
		return $query->result();
	}

	function count_paginas() {
		return $this->db->count_all_results('pagina');
	}

}
