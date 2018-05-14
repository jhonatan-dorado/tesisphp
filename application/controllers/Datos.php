<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends CI_Controller{
	function __construct(){
	parent::__construct();
	$this->load->model('Datos_model');

	
	
}
public function index()
	{
		$this->load->view('welcome_message');
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
 function insertarPos(){

 	$post=$this->input->post();
 	 $postdata=file_get_contents(("php://input"));
        $datos=json_decode($postdata);
 	$this->Datos_model->insertarPos($datos);
 		
 }
 function listarArduinos(){
     header("Access-Control-Allow-Origin: *");
     $respuesta=$this->Datos_model->listarArduinos();
     echo json_encode($respuesta);
 }

}
?>