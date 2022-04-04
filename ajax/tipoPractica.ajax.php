<?php 

require_once "../controladores/tipoPractica.controlador.php";
require_once "../modelos/tipoPractica.modelo.php";

class ajaxTipoPracticas{

	public $id;
	public $nombre;
	

	public function MostrarTipoPracticas(){

		$respuesta = ControladorTipoPracticas::ctrMostrarTipoPracticas();

		echo json_encode($respuesta);
	}

	public function registrarTipoPracticas(){
		
		$respuesta = ControladorTipoPracticas::ctrRegistrarTipoPracticas($this->nombre);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function eliminarTipoPracticas(){
		
		$respuesta = ControladorTipoPracticas::ctrEliminarTipoPracticas($this->id);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function actualizarTipoPracticas(){
		
		$respuesta = ControladorTipoPracticas::ctrActualizarTipoPracticas($this->id,$this->nombre);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}
	
}

if(!isset($_POST["accion"])){
	$respuesta = new ajaxTipoPracticas();
	$respuesta -> MostrarTipoPracticas();
}else{

	if($_POST["accion"] == "registrar"){
		$insertar = new ajaxTipoPracticas();
		$insertar->nombre = $_POST["nombre"];
		
		$insertar->registrarTipoPracticas();
	}

	if($_POST["accion"] == "eliminar"){
		$eliminar = new ajaxTipoPracticas();

		$eliminar->id = $_POST["id"];
		
		$eliminar->eliminarTipoPracticas();
	}

	if($_POST["accion"] == "actualizar"){
		$actualizar = new ajaxTipoPracticas();

		$actualizar->id = $_POST["id"];
		$actualizar->nombre = $_POST["nombre"];
	
		
		$actualizar->actualizarTipoPracticas();
	}

}