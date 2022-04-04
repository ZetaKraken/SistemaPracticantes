<?php 

require_once "conexion.php";

class ModeloInstituciones{

	static public function mdlMostrarInstituciones(){

		$stmt = Conexion::conectar()-> prepare("SELECT ID_INSTITUCION, NOMBRE, 'X' as acciones FROM instituciones");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarInstituciones($nombre){

		$stmt = Conexion::conectar()->prepare("INSERT INTO instituciones(nombre) VALUES (:nombre)");

		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "La institucion se registró correctamente";
        }else{
            return "Error, no se pudo registrar la institucion";
        }        

        $stmt = null;

	}

	static public function mdlEliminarInstituciones($id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM Instituciones WHERE ID_INSTITUCION = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
            return "La institucion se eliminó correctamente";
        }else{
            return "Error, no se pudo eliminar la institucion";
        }        

        $stmt = null;

	}

	static public function mdlActualizarInstituciones($id,$nombre){

		$stmt = Conexion::conectar()->prepare("UPDATE instituciones
											   SET NOMBRE = :nombre
											   WHERE ID_INSTITUCION = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "La institucion se actualizó correctamente";
        }else{
            return "Error, no se pudo actualizar la institucion";
        }        

        $stmt = null;
	}
	

}