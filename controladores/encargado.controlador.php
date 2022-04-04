<?php 

class ControladorEncargados{

	static public function ctrMostrarEncargados(){
		
		$respuesta = ModeloEncargados::mdlMostrarEncargados();

		return $respuesta;
	}

	static public function ctrRegistrarEncargados($nombre){

		$respuesta = ModeloEncargados::mdlRegistrarEncargados($nombre);

		return $respuesta;
	}

	static public function ctrEliminarEncargados($id){

		$respuesta = ModeloEncargados::mdlEliminarEncargados($id);

		return $respuesta;
	}

	static public function ctrActualizarEncargados($id,$nombre){

		$respuesta = ModeloEncargados::mdlActualizarEncargados($id,$nombre);

		return $respuesta;
	}

}