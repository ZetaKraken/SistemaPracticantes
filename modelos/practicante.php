<?php 

require_once "conexion.php";

class ModeloPracticantes{

	static public function mdlMostrarPracticantes(){

		$stmt = Conexion::conectar()-> prepare("SELECT ID_PRACTICANTES, NOMBRES, APELLIDOS, RUT, INSTITUCION_ID, CARRERA_ID, TIPO_PRACTICA_ID, FECHA_INICIO, FECHA_TERMINO, FOTO, ENCARGADO_ID,'X' as acciones FROM practicantes");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarPracticantes($Practicantes, $ruta, $estado, $fecha){

		$stmt = Conexion::conectar()->prepare("INSERT INTO Practicantes(Practicantes,ruta,estado,fecha) VALUES (:Practicantes,:ruta,:estado,:fecha)");

		$stmt -> bindParam(":Practicantes", $Practicantes, PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "La categoría se registró correctamente";
        }else{
            return "Error, no se pudo registrar la categoría";
        }        

        $stmt = null;

	}

	static public function mdlEliminarPracticantes($id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM Practicantes WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
            return "La categoría se eliminó correctamente";
        }else{
            return "Error, no se pudo eliminar la categoría";
        }        

        $stmt = null;

	}

	static public function mdlActualizarPracticantes($id,$Practicantes, $ruta, $estado, $fecha){

		$stmt = Conexion::conectar()->prepare("UPDATE Practicantes
											   SET Practicantes = :Practicantes,
											   	   ruta = :ruta,
												   estado = :estado,
												   fecha = :fecha
											   WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> bindParam(":Practicantes", $Practicantes, PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "La categoría se actualizó correctamente";
        }else{
            return "Error, no se pudo actualizar la categoría";
        }        

        $stmt = null;
	}
	

}