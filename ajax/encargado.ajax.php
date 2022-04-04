<?php 

require_once "../controladores/encargado.controlador.php";
require_once "../modelos/encargado.modelo.php";

class ajaxEncargados{

	public $id;
	public $nombre;
	

	public function MostrarEncargados(){

		$respuesta = ControladorEncargados::ctrMostrarEncargados();

		echo json_encode($respuesta);
	}

	public function registrarEncargados(){
		
		$respuesta = ControladorEncargados::ctrRegistrarEncargados($this->nombre);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function eliminarEncargados(){
		
		$respuesta = ControladorEncargados::ctrEliminarEncargados($this->id);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function actualizarEncargados(){
		
		$respuesta = ControladorEncargados::ctrActualizarEncargados($this->id,$this->nombre);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}
	
}

if(!isset($_POST["accion"])){
	$respuesta = new ajaxEncargados();
	$respuesta -> MostrarEncargados();
}else{

	if($_POST["accion"] == "registrar"){
		$insertar = new ajaxEncargados();
		$insertar->nombre = $_POST["nombre"];
		
		$insertar->registrarEncargados();
	}

	if($_POST["accion"] == "eliminar"){
		$eliminar = new ajaxEncargados();

		$eliminar->id = $_POST["id"];
		
		$eliminar->eliminarEncargados();
	}

	if($_POST["accion"] == "actualizar"){
		$actualizar = new ajaxEncargados();

		$actualizar->id = $_POST["id"];
		$actualizar->nombre = $_POST["nombre"];
	
		
		$actualizar->actualizarEncargados();
	}

}