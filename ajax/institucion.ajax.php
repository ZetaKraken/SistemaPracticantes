<?php 

require_once "../controladores/institucion.controlador.php";
require_once "../modelos/institucion.modelo.php";

class ajaxInstituciones{

	public $id;
	public $nombre;
	

	public function MostrarInstituciones(){

		$respuesta = ControladorInstituciones::ctrMostrarInstituciones();

		echo json_encode($respuesta);
	}

	public function registrarInstituciones(){
		
		$respuesta = ControladorInstituciones::ctrRegistrarInstituciones($this->nombre);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function eliminarInstituciones(){
		
		$respuesta = ControladorInstituciones::ctrEliminarInstituciones($this->id);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function actualizarInstituciones(){
		
		$respuesta = ControladorInstituciones::ctrActualizarInstituciones($this->id,$this->nombre);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}
	
}

if(!isset($_POST["accion"])){
	$respuesta = new ajaxInstituciones();
	$respuesta -> MostrarInstituciones();
}else{

	if($_POST["accion"] == "registrar"){
		$insertar = new ajaxInstituciones();
		$insertar->nombre = $_POST["nombre"];
		
		$insertar->registrarInstituciones();
	}

	if($_POST["accion"] == "eliminar"){
		$eliminar = new ajaxInstituciones();

		$eliminar->id = $_POST["id"];
		
		$eliminar->eliminarInstituciones();
	}

	if($_POST["accion"] == "actualizar"){
		$actualizar = new ajaxInstituciones();

		$actualizar->id = $_POST["id"];
		$actualizar->nombre = $_POST["nombre"];
	
		
		$actualizar->actualizarInstituciones();
	}

}