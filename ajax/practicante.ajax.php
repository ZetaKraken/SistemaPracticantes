<?php 

require_once "../controladores/practicante.controlador.php";
require_once "../modelos/practicante.modelo.php";

class ajaxPracticantes{

	public $id;
	public $nombre;
	

	public function MostrarPracticantes(){

		$respuesta = ControladorPracticantes::ctrMostrarPracticantes();

		echo json_encode($respuesta);
	}

	public function registrarPracticantes(){
		
		$respuesta = ControladorPracticantes::ctrRegistrarPracticantes($this->nombre);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function eliminarPracticantes(){
		
		$respuesta = ControladorPracticantes::ctrEliminarPracticantes($this->id);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function actualizarPracticantes(){
		
		$respuesta = ControladorPracticantes::ctrActualizarPracticantes($this->id,$this->nombre);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}
	
}

if(!isset($_POST["accion"])){
	$respuesta = new ajaxPracticantes();
	$respuesta -> MostrarPracticantes();
}else{

	if($_POST["accion"] == "registrar"){
		$insertar = new ajaxPracticantes();
		$insertar->nombre = $_POST["nombre"];
		
		$insertar->registrarPracticantes();
	}

	if($_POST["accion"] == "eliminar"){
		$eliminar = new ajaxPracticantes();

		$eliminar->id = $_POST["id"];
		
		$eliminar->eliminarPracticantes();
	}

	if($_POST["accion"] == "actualizar"){
		$actualizar = new ajaxPracticantes();

		$actualizar->id = $_POST["id"];
		$actualizar->nombre = $_POST["nombre"];
	
		
		$actualizar->actualizarPracticantes();
	}

}