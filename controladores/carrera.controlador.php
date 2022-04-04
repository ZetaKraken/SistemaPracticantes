<?php 

class ControladorCarreras{

	static public function ctrMostrarCarreras(){
		
		$respuesta = ModeloCarreras::mdlMostrarCarreras();

		return $respuesta;
	}

	static public function ctrRegistrarCarreras($nombre){

		$respuesta = ModeloCarreras::mdlRegistrarCarreras($nombre);

		return $respuesta;
	}

	static public function ctrEliminarCarreras($id){

		$respuesta = ModeloCarreras::mdlEliminarCarreras($id);

		return $respuesta;
	}

	static public function ctrActualizarCarreras($id,$nombre){

		$respuesta = ModeloCarreras::mdlActualizarCarreras($id,$nombre);

		return $respuesta;
	}

}