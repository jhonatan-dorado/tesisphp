<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends CI_Controller{
	function __construct(){
	parent::__construct();
	$this->load->model('Datos_model');

	
	
}
 function listar(){
	 header("Access-Control-Allow-Origin: *");
	$drio=$this->Datos_model->listar();
	echo json_encode($drio);
}

 function insertar(){

 	$post=$this->input->post();
 	if(isset($post['profundidad']) && isset($post['temperatura']) && isset($post['caudal']) && isset($post['turbidez'])){
 	$this->Datos_model->insertar($this->input->post());
 		}else{
 			echo json_encode("inserte todo los datos");
 		}
 }

}
?>