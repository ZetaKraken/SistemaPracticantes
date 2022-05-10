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
		$insertar->nombres = $_POST["nombres"];
		$insertar->apellidos = $_POST["apellidos"];
		$insertar->rut = $_POST["rut"];
		$insertar->institucion_id = $_POST["institucion_id"];
		$insertar->carrera_id = $_POST["carrera_id"];
		$insertar->tipo_practica_id = $_POST["tipo_practica_id"];
		$insertar->fecha_inicio = $_POST["fecha_inicio"];
		$insertar->fecha_termino = $_POST["fecha_termino"];
		$insertar->foto = $_FILES["foto"];
		$insertar->encargado_id = $_POST["encargado_id"];

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
		$actualizar->nombres = $_POST["nombres"];
		$actualizar->apellidos = $_POST["apellidos"];
		$actualizar->rut = $_POST["rut"];
		$actualizar->institucion_id = $_POST["institucion_id"];
		$actualizar->carrera_id = $_POST["carrera_id"];
		$actualizar->tipo_practica_id = $_POST["tipo_practica_id"];
		$actualizar->fecha_inicio = $_POST["fecha_inicio"];
		$actualizar->fecha_termino = $_POST["fecha_termino"];
		$actualizar->foto = $_FILES["foto"];
		$actualizar->encargado_id = $_POST["encargado_id"];
		
		$actualizar->actualizarPracticantes();
	}

}






