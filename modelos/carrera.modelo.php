<?php 

require_once "conexion.php";

class ModeloCarreras{

	static public function mdlMostrarCarreras(){

		$stmt = Conexion::conectar()-> prepare("SELECT ID_CARRERA,NOMBRE,'X' as acciones FROM carreras");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarCarreras($nombre){

		$stmt = Conexion::conectar()->prepare("INSERT INTO carreras(NOMBRE) VALUES (:nombre)");

		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "La carrera se registró correctamente";
        }else{
            return "Error, no se pudo registrar la carrera";
        }        

        $stmt = null;

	}

	static public function mdlEliminarCarreras($id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM carreras WHERE ID_CARRERA = :id");

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
											   SET NOMBRE = :nombre
											   WHERE ID_CARRERA = :id");

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