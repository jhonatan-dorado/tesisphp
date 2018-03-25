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
function insertar($datos){
	$this->db->set('profundidad',$datos['profundidad']);
	$this->db->set('temperatura',$datos['temperatura']);
	$this->db->set('caudal',$datos['caudal']);
	$this->db->set('turbidez',$datos['turbidez']);
	$this->db->set('creationDate',Date('Y-m-d H:i:s'));
	$this->db->insert('variables_rio');

	//$this->db->set('profundidad')
	//return $this->input->post();
}
function insertarPos($datos){
	$this->db->set('latitud',$datos['latitud']);
	$this->db->set('longitud',$datos['longitud']);
	$this->db->set('fecha',Date('Y-m-d H:i:s'));
	$this->db->insert('prueba');

	//$this->db->set('profundidad')
	//return $this->input->post();
}
}
?>