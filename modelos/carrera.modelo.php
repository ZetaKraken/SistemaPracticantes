<?php 

require_once "conexion.php";

class ModeloCarreras{

	static public function mdlMostrarCarreras(){

		$stmt = Conexion::conectar()-> prepare("SELECT id,nombre,'X' as acciones FROM Carreras");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarCarreras($nombre){

		$stmt = Conexion::conectar()->prepare("INSERT INTO carreras(nombre) VALUES (:nombre)");

		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "La carrera se registró correctamente";
        }else{
            return "Error, no se pudo registrar la carrera";
        }        

        $stmt = null;

	}

	static public function mdlEliminarCarreras($id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM carreras WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
            return "La carrera se eliminó correctamente";
        }else{
            return "Error, no se pudo eliminar la carrera";
        }        

        $stmt = null;

	}

	static public function mdlActualizarCarreras($id,$nombre){

		$stmt = Conexion::conectar()->prepare("UPDATE carreras
											   SET nombre = :nombre
											   WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "La carrera se actualizó correctamente";
        }else{
            return "Error, no se pudo actualizar la carrera";
        }        

        $stmt = null;
	}
	

}