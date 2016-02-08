<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function validate($email, $password) {
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('usuario');
		if($query->num_rows() == 1)
		{
			foreach ($query->result() as $row) {
				return $row;
			}
		}
		return false;
	}

	function create() {
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('usuario');

		if($query->num_rows() > 0){
			return false;
		} else {

			$new_usuario = array(
				'nome' => $this->input->post('nome'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'tipo' => $this->input->post('tipo'),
			);
			$insert = $this->db->insert('usuario', $new_usuario);
			return $insert;
		}
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('usuario');
	}

	function update($id, $data) {
		$update = $this->db->where('id', $id);
		$update = $this->db->update('usuario', $data);
		return $update;
	}

	function getUsuarios($maximo, $inicio, $data = array()) {
		if (!empty($data["usuario"])) {
			$query = $this->db->like('nome',$data["usuario"]);
		}
		if (!empty($data["tipo"])) {
			$query = $this->db->where('tipo',$data["tipo"]);
		}
		if (!empty($data["email"])) {
			$query = $this->db->like('email',$data["email"]);
		}
		$query = $this->db->get('usuario', $maximo, $inicio);
		return $query->result();
	}

	function getUserById($id)	{
		$this->db->where('id', $id);
		$query = $this->db->get('usuario');
		return $query->result();
	}

	function getUserByEmail($email)	{
		$query = $this->db->like('email', $email);
		$query = $this->db->get('usuario');

		if($query->num_rows() == 1)
		{
			foreach ($query->result() as $row) {
				return $row;
			}
		}
	}

	function getTipoUsuario()	{
		$query = $this->db->get('tipo_usuario');
		return $query->result();
	}

	function countUsuarios($data = array()) {
		if (!empty($data["usuario"])) {
			$query = $this->db->like('nome',$data["usuario"]);
		}
		if (!empty($data["tipo"])) {
			$query = $this->db->where('tipo',$data["tipo"]);
		}
		if (!empty($data["email"])) {
			$query = $this->db->like('email',$data["email"]);
		}
		return $this->db->count_all_results('usuario');
	}

	function count_users() {
		return $this->db->count_all_results('usuario');
	}

}
