<?php 

class ControladorPracticantes{

	static public function ctrMostrarPracticantes(){
		
		$respuesta = ModeloPracticantes::mdlMostrarPracticantes();

		return $respuesta;
	}

	static public function ctrRegistrarPracticantes($nombres, $apellidos, $rut, $institucion_id, $carrera_id, $tipo_practica_id, $fecha_inicio, $fecha_termino, $foto, $encargado_id){

		$respuesta = ModeloPracticantes::mdlRegistrarPracticantes($nombres, $apellidos, $rut, $institucion_id, $carrera_id, $tipo_practica_id, $fecha_inicio, $fecha_termino, $foto, $encargado_id);

		return $respuesta;
	}

	static public function ctrEliminarPracticantes($id){

		$respuesta = ModeloPracticantes::mdlEliminarPracticantes($id);

		return $respuesta;
	}

	// static public function ctrActualizarPracticantes($id, $nombres, $apellidos, $rut, $institucion_id, $carrera_id, $tipo_practica_id, $fecha_inicio, $fecha_termino, $foto, $encargado_id){

	// 	$respuesta = ModeloPracticantes::mdlActualizarPracticantes($id, $nombres, $apellidos, $rut, $institucion_id, $carrera_id, $tipo_practica_id, $fecha_inicio, $fecha_termino, $foto, $encargado_id);

	// 	return $respuesta;
	// }

}