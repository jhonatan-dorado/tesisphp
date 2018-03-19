<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends CI_Controller{
	function __construct(){
	parent::__construct();
	$this->load->model('Datos_model');

	
	
}
public function listar(){
	
	$drio=$this->Datos_model->listar();
	echo json_encode($drio);
}

}
?>