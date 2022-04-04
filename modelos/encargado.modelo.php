<?php 

require_once "conexion.php";

class ModeloEncargados{

	static public function mdlMostrarEncargados(){

		$stmt = Conexion::conectar()-> prepare("SELECT id,nombre,'X' as acciones FROM encargados");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarEncargados($nombre){

		$stmt = Conexion::conectar()->prepare("INSERT INTO encargados(nombre) VALUES (:nombre)");

		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "El encargado se registró correctamente";
        }else{
            return "Error, no se pudo registrar el encargado";
        }        

        $stmt = null;

	}

	static public function mdlEliminarEncargados($id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM encargados WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
            return "El encargado se eliminó correctamente";
        }else{
            return "Error, no se pudo eliminar el encargado";
        }        

        $stmt = null;

	}

	static public function mdlActualizarEncargados($id,$nombre){

		$stmt = Conexion::conectar()->prepare("UPDATE encargados
											   SET nombre = :nombre
											   WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "El encargado se actualizó correctamente";
        }else{
            return "Error, no se pudo actualizar el encargado";
        }        

        $stmt = null;
	}
	

}