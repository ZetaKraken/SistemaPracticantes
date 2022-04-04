<?php 

class ControladorTipoPracticas{

	static public function ctrMostrarTipoPracticas(){
		
		$respuesta = ModeloTipoPracticas::mdlMostrarTipoPracticas();

		return $respuesta;
	}

	static public function ctrRegistrarTipoPracticas($nombre){

		$respuesta = ModeloTipoPracticas::mdlRegistrarTipoPracticas($nombre);

		return $respuesta;
	}

	static public function ctrEliminarTipoPracticas($id){

		$respuesta = ModeloTipoPracticas::mdlEliminarTipoPracticas($id);

		return $respuesta;
	}

	static public function ctrActualizarTipoPracticas($id,$nombre){

		$respuesta = ModeloTipoPracticas::mdlActualizarTipoPracticas($id,$nombre);

		return $respuesta;
	}

}