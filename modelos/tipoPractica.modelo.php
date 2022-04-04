<?php 

require_once "conexion.php";

class ModeloTipoPractica{

	static public function mdlMostrarTipoPractica(){

		$stmt = Conexion::conectar()-> prepare("SELECT id,nombre,'X' as acciones FROM tipo_Practica");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarTipoPractica($nombre){

		$stmt = Conexion::conectar()->prepare("INSERT INTO tipo_Practica(nombre) VALUES (:nombre)");

		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "El tipo de practica se registró correctamente";
        }else{
            return "Error, no se pudo registrar el tipo de practica";
        }        

        $stmt = null;

	}

	static public function mdlEliminarTipoPractica($id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM tipo_Practica WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
            return "El tipo de practica se eliminó correctamente";
        }else{
            return "Error, no se pudo eliminar el tipo de practica";
        }        

        $stmt = null;

	}

	static public function mdlActualizarTipoPractica($id,$nombre){

		$stmt = Conexion::conectar()->prepare("UPDATE tipo_Practica
											   SET nombre = :nombre
											   WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "El tipo de practica se actualizó correctamente";
        }else{
            return "Error, no se pudo actualizar el tipo de practica";
        }        

        $stmt = null;
	}
	

}