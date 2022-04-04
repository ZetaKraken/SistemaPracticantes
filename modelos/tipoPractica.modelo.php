<?php 

require_once "conexion.php";

class ModeloTipoPracticas{

	static public function mdlMostrarTipoPracticas(){

		$stmt = Conexion::conectar()-> prepare("SELECT ID_TIPO_PRACTICA, NOMBRE, 'X' as acciones FROM tipo_practicas");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarTipoPracticas($nombre){

		$stmt = Conexion::conectar()->prepare("INSERT INTO tipo_practicas(nombre) VALUES (:nombre)");

		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "El tipo de practica se registró correctamente";
        }else{
            return "Error, no se pudo registrar el tipo de practica";
        }        

        $stmt = null;

	}

	static public function mdlEliminarTipoPracticas($id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM tipo_practicas WHERE ID_TIPO_PRACTICA = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
            return "El tipo de practica se eliminó correctamente";
        }else{
            return "Error, no se pudo eliminar el tipo de practica";
        }        

        $stmt = null;

	}

	static public function mdlActualizarTipoPracticas($id,$nombre){

		$stmt = Conexion::conectar()->prepare("UPDATE tipo_practicas
											   SET NOMBRE = :nombre
											   WHERE ID_TIPO_PRACTICA = :id");

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