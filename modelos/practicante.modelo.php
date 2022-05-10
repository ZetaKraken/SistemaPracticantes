<?php 

require_once "conexion.php";
require_once "../ajax/practicante.ajax.php";

class ModeloPracticantes{

	static public function mdlMostrarPracticantes(){

		$stmt = Conexion::conectar()-> prepare("SELECT ID_PRACTICANTES, NOMBRES, APELLIDOS, RUT, INSTITUCION_ID, instituciones.NOMBRE, CARRERA_ID, carreras.NOMBRE, TIPO_PRACTICA_ID , tipo_practicas.NOMBRE, FECHA_INICIO, FECHA_TERMINO, FOTO, ENCARGADO_ID ,encargados.NOMBRE ,'X' as acciones FROM practicantes INNER JOIN instituciones ON practicantes.INSTITUCION_ID = instituciones.ID_INSTITUCION INNER JOIN carreras on practicantes.CARRERA_ID = carreras.ID_CARRERA INNER JOIN tipo_practicas on practicantes.TIPO_PRACTICA_ID = tipo_practicas.ID_TIPO_PRACTICA INNER JOIN encargados on practicantes.ENCARGADO_ID = encargados.ID_ENCARGADO");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarPracticantes($nombres, $apellidos, $rut, $institucion_id, $carrera_id, $tipo_practica_id, $fecha_inicio, $fecha_termino, $foto ,  $encargado_id){
		
		
		
			if(!empty($_FILES) && isset($_FILES['foto'])){
				//print_r("paso por aca".$_FILES);
				$img = $_FILES['foto']['name'];
				$ruta = $_FILES['foto']['tmp_name'];
				$destino = "./img/".$img;
					if (move_uploaded_file($_FILES["foto"]["tmp_name"], "../img/".$_FILES['foto']['name'])) {
						//more code here...
						print("aqui voy");
						echo "./img/".$_FILES['foto']['name'];
					} else {
						echo 0;
					}
				}else{
					print("error en la imagen bb");
				}



		$stmt = Conexion::conectar()->prepare("INSERT INTO practicantes(NOMBRES, APELLIDOS, RUT, INSTITUCION_ID, CARRERA_ID, TIPO_PRACTICA_ID, FECHA_INICIO, FECHA_TERMINO, FOTO, ENCARGADO_ID) VALUES (:nombres, :apellidos, :rut, :institucion_id, :carrera_id, :tipo_practica_id, :fecha_inicio, :fecha_termino, :destino ,:encargado_id)");
		
		$stmt -> bindParam(":nombres", $nombres, PDO::PARAM_STR);
		$stmt -> bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
		$stmt -> bindParam(":rut", $rut, PDO::PARAM_STR);
		$stmt -> bindParam(":institucion_id", $institucion_id, PDO::PARAM_INT);
		$stmt -> bindParam(":carrera_id", $carrera_id, PDO::PARAM_INT);
		$stmt -> bindParam(":tipo_practica_id", $tipo_practica_id, PDO::PARAM_INT);
		$stmt -> bindParam(":fecha_inicio", $fecha_inicio, PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_termino", $fecha_termino, PDO::PARAM_STR);
		$stmt -> bindParam(":destino", $destino, PDO::PARAM_STR);
		$stmt -> bindParam(":encargado_id", $encargado_id, PDO::PARAM_INT);
		
		if($stmt -> execute()){
			//$foto = str_replace( "\\", '/', $foto );
			//move_uploaded_file($foto, $ruta);
            return "El practicante se registró correctamente";
        }else{
            return "Error, no se pudo registrar el practicante";
        }        

        $stmt = null;

	}

	static public function mdlEliminarPracticantes($id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM practicantes WHERE ID_PRACTICANTES = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
            return "El practicante se eliminó correctamente";
        }else{
            return "Error, no se pudo eliminar el practicante";
        }        

        $stmt = null;

	}

	static public function mdlActualizarPracticantes($id,$nombres, $apellidos, $rut, $institucion_id, $carrera_id, $tipo_practica_id, $fecha_inicio, $fecha_termino, $foto, $encargado_id){
		if(!empty($_FILES) && isset($_FILES['foto'])){
			//print_r("paso por aca".$_FILES);
			$img = $_FILES['foto']['name'];
			$ruta = $_FILES['foto']['tmp_name'];
			$destino = "./img/".$img;
				if (move_uploaded_file($_FILES["foto"]["tmp_name"], "../img/".$_FILES['foto']['name'])) {
					//more code here...
					print("aqui voy");
					echo "./img/".$_FILES['foto']['name'];
				} else {
					echo 0;
				}
			}else{
				print("error en la imagen bb");
			}
		$stmt = Conexion::conectar()->prepare("UPDATE practicantes
											   SET NOMBRES = :nombres,
											   	   APELLIDOS = :apellidos,
												   RUT = :rut,
												   INSTITUCION_ID = :institucion_id,
												   CARRERA_ID = :carrera_id,
												   TIPO_PRACTICA_ID = :tipo_practica_id,
												   FECHA_INICIO = :fecha_inicio,
												   FECHA_TERMINO = :fecha_termino,
												   FOTO = :destino,
												   ENCARGADO_ID = :encargado_id
											   WHERE ID_PRACTICANTES = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> bindParam(":nombres", $nombres, PDO::PARAM_STR);
		$stmt -> bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
		$stmt -> bindParam(":rut", $rut, PDO::PARAM_STR);
		$stmt -> bindParam(":institucion_id", $institucion_id, PDO::PARAM_INT);
		$stmt -> bindParam(":carrera_id", $carrera_id, PDO::PARAM_INT);
		$stmt -> bindParam(":tipo_practica_id", $tipo_practica_id, PDO::PARAM_INT);
		$stmt -> bindParam(":fecha_inicio", $fecha_inicio, PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_termino", $fecha_termino, PDO::PARAM_STR);
		$stmt -> bindParam(":destino", $destino, PDO::PARAM_STR);
		$stmt -> bindParam(":encargado_id", $encargado_id, PDO::PARAM_INT);

		if($stmt -> execute()){
            return "El practicante se actualizó correctamente";
        }else{
            return "Error, no se pudo actualizar el practicante";
        }        

        $stmt = null;
	}
	

}