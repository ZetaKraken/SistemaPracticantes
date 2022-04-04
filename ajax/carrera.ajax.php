<?php 

require_once "../controladores/carrera.controlador.php";
require_once "../modelos/carrera.modelo.php";

class ajaxCarreras{

	public $id;
	public $nombre;
	

	public function MostrarCarreras(){

		$respuesta = ControladorCarreras::ctrMostrarCarreras();

		echo json_encode($respuesta);
	}

	public function registrarCarreras(){
		
		$respuesta = ControladorCarreras::ctrRegistrarCarreras($this->nombre);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function eliminarCarreras(){
		
		$respuesta = ControladorCarreras::ctrEliminarCarreras($this->id);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function actualizarCarreras(){
		
		$respuesta = ControladorCarreras::ctrActualizarCarreras($this->id,$this->nombre);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}
	
}

if(!isset($_POST["accion"])){
	$respuesta = new ajaxCarreras();
	$respuesta -> MostrarCarreras();
}else{

	if($_POST["accion"] == "registrar"){
		$insertar = new ajaxCarreras();
		$insertar->nombre = $_POST["nombre"];
		
		$insertar->registrarCarreras();
	}

	if($_POST["accion"] == "eliminar"){
		$eliminar = new ajaxCarreras();

		$eliminar->id = $_POST["id"];
		
		$eliminar->eliminarCarreras();
	}

	if($_POST["accion"] == "actualizar"){
		$actualizar = new ajaxCarreras();

		$actualizar->id = $_POST["id"];
		$actualizar->nombre = $_POST["nombre"];
	
		
		$actualizar->actualizarCarreras();
	}

}
