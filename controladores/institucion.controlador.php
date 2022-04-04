<?php 

class ControladorInstituciones{

	static public function ctrMostrarInstituciones(){
		
		$respuesta = ModeloInstituciones::mdlMostrarInstituciones();

		return $respuesta;
	}

	static public function ctrRegistrarInstituciones($nombre){

		$respuesta = ModeloInstituciones::mdlRegistrarInstituciones($nombre);

		return $respuesta;
	}

	static public function ctrEliminarInstituciones($id){

		$respuesta = ModeloInstituciones::mdlEliminarInstituciones($id);

		return $respuesta;
	}

	static public function ctrActualizarInstituciones($id,$nombre){

		$respuesta = ModeloInstituciones::mdlActualizarInstituciones($id,$nombre);

		return $respuesta;
	}

}