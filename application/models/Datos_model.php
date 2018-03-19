<?php

class Datos_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

function listar(){
	$data = $this->db->get('variables_rio');
	return $data->result_array();
}
function insertar(){
	return $this->input->post();
}
}
?>