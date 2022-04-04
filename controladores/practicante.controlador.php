<?php 

class ControladorPracticantes{

	static public function ctrMostrarPracticantes(){
		
		$respuesta = ModeloPracticantes::mdlMostrarPracticantes();

		return $respuesta;
	}

	static public function ctrRegistrarPracticantes($nombre){

		$respuesta = ModeloPracticantes::mdlRegistrarPracticantes($nombre);

		return $respuesta;
	}

	static public function ctrEliminarPracticantes($id){

		$respuesta = ModeloPracticantes::mdlEliminarPracticantes($id);

		return $respuesta;
	}

	static public function ctrActualizarPracticantes($id,$nombre){

		$respuesta = ModeloPracticantes::mdlActualizarPracticantes($id,$nombre);

		return $respuesta;
	}

}