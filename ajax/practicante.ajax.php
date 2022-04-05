<?php 

require_once "../controladores/practicante.controlador.php";
require_once "../modelos/practicante.modelo.php";

class ajaxPracticantes{

	public $id;
	public $nombres;
	public $apellidos;
	public $rut;
	public $institucion_id;
	public $carrera_id;
	public $tipo_practica_id;
	public $fecha_inicio;
	public $fecha_termino;
	public $foto;
	public $encargado_id;

	public function MostrarPracticantes(){

		$respuesta = ControladorPracticantes::ctrMostrarPracticantes();

		echo json_encode($respuesta);
	}

	public function registrarPracticantes(){
		
		$respuesta = ControladorPracticantes::ctrRegistrarPracticantes($this->nombres, $this->apellidos, $this->rut, $this->institucion_id, $this->carrera_id, $this->tipo_practica_id, $this->fecha_inicio, $this->fecha_termino, $this->foto, $this->encargado_id);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function eliminarPracticantes(){
		
		$respuesta = ControladorPracticantes::ctrEliminarPracticantes($this->id);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function actualizarPracticantes(){
		
		$respuesta = ControladorPracticantes::ctrActualizarPracticantes($this->id, $this->nombres, $this->apellidos, $this->rut, $this->institucion_id, $this->carrera_id, $this->tipo_practica_id, $this->fecha_inicio, $this->fecha_termino, $this->foto, $this->encargado_id);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}
	
}

if(!isset($_POST["accion"])){
	$respuesta = new ajaxPracticantes();
	$respuesta -> MostrarPracticantes();
}else{

	if($_POST["accion"] == "registrar"){
		$insertar = new ajaxPracticantes();
		$insertar->Practicantes = $_POST["Practicantes"];
		$insertar->ruta = $_POST["ruta"];
		$insertar->estado = $_POST["estado"];
		$insertar->fecha = $_POST["fecha"];
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
		$actualizar->Practicantes = $_POST["Practicantes"];
		$actualizar->ruta = $_POST["ruta"];
		$actualizar->estado = $_POST["estado"];
		$actualizar->fecha = $_POST["fecha"];
		
		$actualizar->actualizarPracticantes();
	}

}






