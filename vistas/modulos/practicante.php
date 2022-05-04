<!-- CONTENT-HEADER -->
<section class="content-header">

	<div class="container-fluid">

		<div class="row mb-2">

			<div class="col-sm-6">
				<h1>Administrar Estudiantes en Practica</h1>
			</div>

			<div class="col-sm-6">
				
				<ol class="breadcrumb float-sm-right">

					<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>

                	<li class="breadcrumb-item active">Gestor Practicantes</li>						
				</ol>

			</div>
		</div>	
	</div>	

</section>
<!-- /. CONTENT HEADER -->

<!-- CONTENT -->
<section class="content">
    
    <div class="container-fluid">   

        <div class="btn-agregar-practicantes btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#modal-gestionar-practicantes" data-dismiss="modal"> <i class="fas fa-plus-square"></i> Agregar practicante</button>
        </div>

        <table id="tablaPracticante" class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead class="bg-info">
                <tr>
                    <td style="width:1%;">Id</td>
                    <td style="width:1%;">Nombres</td>
                    <td style="width:1%;">Apellidos</td>
                    <!-- <td style="width:1%;">RUT</td> -->
                    <td style="width:1%;">Institucion</td>
                    <td style="width:1%;">Carrera</td>
                    <td style="width:1%;">Tipo de Practica</td>
                    <td style="width:1%;">Inicio</td>
                    <td style="width:1%;">Termino</td>
                    <!-- <td style="width:1%;">Foto</td>
                    <td style="width:1%;">Encargado</td> -->
                    <td style="width:1%;">Acciones</td>
                </tr>

            </thead>
            <tbody>
            </tbody>
        </table>    

    </div>  

</section>
<!-- ./ CONTENT -->

<!-- VENTANA MODAL PARA REGISTRO Y ACTUALIZACION -->
<div class="modal fade" id="modal-gestionar-practicantes">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <!-- ============================================================
            =MODAL HEADER
            ===============================================================-->
            <div class="modal-header bg-info">
                <h4 class="modal-title">Gestionar Estudiante en Practica</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- ============================================================
            =MODAL BODY
            ===============================================================-->
            <div class="modal-body">
            <form action="" method="post" enctype="multipart/from-data" >
            <div class="row">

                   <div class="col-sm-4">
                        <div class="form-group">
                            <input type="hidden" id ="idpracticantes" name ="practicantes" value ="" >

                            <label for="txtnombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="txtnonbres" placeholder="Ingrese el nombre">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtapellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="txtapellidos" placeholder="Ingrese el apellido">
                        </div>
                   </div>
                   <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtrut">Rut</label>
                            <input type="text" class="form-control" name="rut"    id="txtrut" placeholder="Ingrese el rut">
                        </div>
                   </div> -->
                   <div class="col-sm-4">
                        <div class="form-group">
                        <form>
                        <button type="submit">Validador RUT</button>
                           
                            <input type="text" class="form-control" id="rut" name="rut" required oninput="checkRut(this)" placeholder="Ingrese RUT">
                              
                         <!-- <script src="validarRUT.js"></script> -->
                </form>
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="fecha_inicio">Fecha Inicio</label>
	                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="aaaa-mm-dd">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                       
                        <label for="fecha_termino">Fecha Termino</label>
                        <input type="date" class="form-control" id="fecha_termino" name="fecha_termino" placeholder="aaaa-mm-dd">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="carrera">Seleccione Carrera:</label>
                        <select class="form-control" id="Scarrera">
                        <option value="">Ninguna</option>
                        <?php
                        $usuario = 'root';
                        $password = '';
                        $db = new PDO('mysql:host=localhost;dbname=db_practicantes', $usuario, $password,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                        $query = $db->prepare("SELECT * FROM carreras");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["ID_CARRERA"].'">'.$valores["NOMBRE"].'</option>';
                        endforeach;
                        ?>
                        </select>
                    
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="carrera">Seleccione Institucion:</label>
                        <select class="form-control" id="Sinstitucion" >
                        <option value="">Ninguna</option>
                        <?php
                        $usuario = 'root';
                        $password = '';
                        $db = new PDO('mysql:host=localhost;dbname=db_practicantes', $usuario, $password,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                        $query = $db->prepare("SELECT * FROM instituciones");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["ID_INSTITUCION"].'">'.$valores["NOMBRE"].'</option>';
                        endforeach;
                        ?>
                        </select>
                    
                        </div>
                   </div>

                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="carrera">Seleccione Encargado:</label>
                        <select class="form-control" id="Sencargado" >
                        <option value="">Ninguna</option>
                        <?php
                        $usuario = 'root';
                        $password = '';
                        $db = new PDO('mysql:host=localhost;dbname=db_practicantes', $usuario, $password,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                        $query = $db->prepare("SELECT * FROM encargados");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["ID_ENCARGADO"].'">'.$valores["NOMBRE"].'</option>';
                        endforeach;
                        ?>
                        </select>
                    
                        </div>
                   </div>

                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="carrera">Seleccione Tipo de Practica:</label>
                        <select class="form-control" name="Stipo_practica" id="Stipo_practica">
                        <option value="">Ninguna</option>
                        <?php
                        $usuario = 'root';
                        $password = '';
                        $db = new PDO('mysql:host=localhost;dbname=db_practicantes', $usuario, $password,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                        $query = $db->prepare("SELECT * FROM tipo_practicaS");
                        $query->execute();
                        $data = $query->fetchAll();
                        
                        foreach ($data as $valores):
                        echo '<option value="'.$valores["ID_TIPO_PRACTICA"].'">'.$valores["NOMBRE"].'</option>';
                        endforeach;
                        
                        ?>
                        </select>
                    
                        </div>
                       
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                            
                            <div class="file-field input-field">
                            <span>Eligue una imagen </span>
                            <input type="file" name="foto" id="foto" >
                            </div>
                            <div class="file-path-wrapper">
                            <input type="text" class="file-path validated" >
                            </div>
                            
                        



                            <!-- <label for="txtfoto">Foto</label>
                            <input type="file" class="form-control" name="foto"    id="txtfoto" placeholder="Ingrese la foto"> -->
                        </div>
                   </div>





                   



               </div>
            
            
               </form>
         
            
            
            
            
            </div>
            <!-- ============================================================
            =MODAL FOOTER
            ===============================================================-->
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
            </div>

        </div>

    </div>

</div>
<!-- VENTANA MODAL VISUALIZAR -->
<div class="modal fade" id="modal-gestionar-pver">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <!-- ============================================================
            =MODAL HEADER
            ===============================================================-->
            <div class="modal-header bg-info">
                <h4 class="modal-title">Visualizacion de Datos del Practicante</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- ============================================================
            =MODAL BODY
            ===============================================================-->
            <div class="modal-body">
               <div class="row">
                   <div class="col-sm-4">
                        <div class="form-group">
                            <input type="hidden" id ="idpracticante" name ="practicantes" value ="">

                            <label for="txtnombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="txtnonbre" placeholder="Ingrese el nombre">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtapellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="txtapellido" placeholder="Ingrese el apellido">
                        </div>
                   </div>
                
                   <div class="col-sm-4">
                        <div class="form-group">
                        <form>
                        <button type="submit">Validador RUT</button>
                           
                            <input type="text" class="form-control" id="ru" name="rut" required oninput="checkRut(this)" placeholder="Ingrese RUT">
                    
                </form>
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="fecha_inicio">Fecha Inicio</label>
	                    <input type="date" class="form-control" id="fecha_inici" name="fecha_inicio" placeholder="aaaa-mm-dd">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                       
                        <label for="fecha_termino">Fecha Termino</label>
                        <input type="date" class="form-control" id="fecha_termin" name="fecha_termino" placeholder="aaaa-mm-dd">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="carrera">Seleccione Carrera:</label>
                        <select class="form-control" id="Scarrer">
                        <option value="">Ninguna</option>
                        <?php
                        $usuario = 'root';
                        $password = '';
                        $db = new PDO('mysql:host=localhost;dbname=db_practicantes', $usuario, $password,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                        $query = $db->prepare("SELECT * FROM carreras");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["ID_CARRERA"].'">'.$valores["NOMBRE"].'</option>';
                        endforeach;
                        ?>
                        </select>
                    
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="carrera">Seleccione Institucion:</label>
                        <select class="form-control" id="Sinstitucio" >
                        <option value="">Ninguna</option>
                        <?php
                        $usuario = 'root';
                        $password = '';
                        $db = new PDO('mysql:host=localhost;dbname=db_practicantes', $usuario, $password,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                        $query = $db->prepare("SELECT * FROM instituciones");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["ID_INSTITUCION"].'">'.$valores["NOMBRE"].'</option>';
                        endforeach;
                        ?>
                        </select>
                    
                        </div>
                   </div>

                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="carrera">Seleccione Encargado:</label>
                        <select class="form-control" id="Sencargad" >
                        <option value="">Ninguna</option>
                        <?php
                        $usuario = 'root';
                        $password = '';
                        $db = new PDO('mysql:host=localhost;dbname=db_practicantes', $usuario, $password,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                        $query = $db->prepare("SELECT * FROM encargados");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["ID_ENCARGADO"].'">'.$valores["NOMBRE"].'</option>';
                        endforeach;
                        ?>
                        </select>
                    
                        </div>
                   </div>

                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="carrera">Seleccione Tipo de Practica:</label>
                        <select class="form-control" name="Stipo_practica" id="Stipo_practic">
                        <option value="">Ninguna</option>
                        <?php
                        $usuario = 'root';
                        $password = '';
                        $db = new PDO('mysql:host=localhost;dbname=db_practicantes', $usuario, $password,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                        $query = $db->prepare("SELECT * FROM tipo_practicaS");
                        $query->execute();
                        $data = $query->fetchAll();
                        
                        foreach ($data as $valores):
                        echo '<option value="'.$valores["ID_TIPO_PRACTICA"].'">'.$valores["NOMBRE"].'</option>';
                        endforeach;
                        
                        ?>
                        </select>
                    
                        </div>
                       
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtfoto">Foto</label>
                            <input type="file" class="form-control" name="foto"    id="txtfot" placeholder="Ingrese la foto">
                        </div>
                   </div>





                   



               </div>
            </div>
            <!-- ============================================================
            =MODAL FOOTER
            ===============================================================-->
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Dejar de Ver</button>
             
            </div>

        </div>

    </div>

</div>

<!-- SUBIR IMAGENES -->




<!-- ./ VENTANA VERIFICAR RUT -->
<script>
        function checkRut(rut) {
            // Despejar Puntos
            var valor = rut.value.replace('.','');
            // Despejar Guión
            valor = valor.replace('-','');
            
            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0,-1);
            dv = valor.slice(-1).toUpperCase();
            
            // Formatear RUN
            rut.value = cuerpo + '-'+ dv
            
            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
            
            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;
            
            // Para cada dígito del Cuerpo
            for(i=1;i<=cuerpo.length;i++) {
            
                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);
                
                // Sumar al Contador General
                suma = suma + index;
                
                // Consolidar Múltiplo dentro del rango [2,7]
                if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
        
            }
            
            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);
            
            // Casos Especiales (0 y K)
            dv = (dv == 'K')?10:dv;
            v = (dv == 0)?11:dv;
            
            // Validar que el Cuerpo coincide con su Dígito Verificador
            if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
            
            // Si todo sale bien, eliminar errores (decretar que es válido)
            rut.setCustomValidity("RUT válido");
            //rut.setCustomValidity('');
        }

</script>

<!-- ./ VENTANA MODAL PARA REGISTRO Y ACTUALIZACION -->
<script>

	$(document).ready(function(){

        // $.ajax({
        //     url: "ajax/practicante.ajax.php",
        //                 method: "GET",
        //                 cache: false,
        //                 contentType: false,
        //                 processData: false,
        //                 success: function(respuesta){
        //                     console.log("Datos"+respuesta+"Fin de DAtos");
        //                 }
        // });

        var accion = "";

        var Toast = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  showConfirmButton: false,
                                  timer: 3000
                                });

  		var table = $("#tablaPracticante").DataTable({
  			"ajax":{
				"url": "ajax/practicante.ajax.php",
				"type":"POST",
				"dataSrc":""
			},  			
            "columnDefs":[ 
	           
            		{
	            		"targets": 8,
	            		"sortable": false,
	            		"render": function (data, type, full, meta){
	            			return "<center>" +
	                                    "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-gestionar-practicantes'> " +
	            						  "<i class='fas fa-pencil-alt'></i> " +
	            					    "</button> " + 
	            					    "<button type='button' class='btn btn-danger btn-sm btnEliminar'> " +
	            						  "<i class='fas fa-trash'> </i> " +
	            					    "</button>" + "<b> "+""+"</b> " +
                                        "<button type='button' class='btn btn-secondary btn-sm btnVer'  data-toggle='modal' data-target='#modal-gestionar-pver'> " +
	            						  "<i class='fas fa-eye'> </i> " +
	            					    "</button>" +
	                                "</center>";
	                    }
            		}
            	],
            "columns":[
                    {"data": "ID_PRACTICANTES"},
                    {"data": "NOMBRES"},
                    {"data": "APELLIDOS"},
                    // {"data": "RUT"},
                    {"data": "5"},
                    {"data": "7"},
                    {"data": "9"},
                    {"data": "FECHA_INICIO"},
                    {"data": "FECHA_TERMINO"},
                    // {"data": "FOTO"},
                    // {"data": "14"},
                    {"data": "acciones"},
                ],

            "language":{
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colección",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %d fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "1": "Mostrar 1 fila",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Rellene todas las celdas con <i>%d<\/i>",
                        "fillHorizontal": "Rellenar celdas horizontalmente",
                        "fillVertical": "Rellenar celdas verticalmentemente"
                    },
                    "decimal": ",",
                    "searchBuilder": {
                        "add": "Añadir condición",
                        "button": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condición",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vacío",
                                "equals": "Igual a",
                                "notBetween": "No entre",
                                "notEmpty": "No Vacio",
                                "not": "Diferente de"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vacio",
                                "equals": "Igual a",
                                "gt": "Mayor a",
                                "gte": "Mayor o igual a",
                                "lt": "Menor que",
                                "lte": "Menor o igual que",
                                "notBetween": "No entre",
                                "notEmpty": "No vacío",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vacío",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vacío",
                                "contains": "Contiene",
                                "notEmpty": "No Vacío",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangría",
                        "title": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de búsqueda",
                            "_": "Paneles de búsqueda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de búsqueda",
                        "loadMessage": "Cargando paneles de búsqueda",
                        "title": "Filtros Activos - %d"
                    },
                    "select": {
                        "1": "%d fila seleccionada",
                        "_": "%d filas seleccionadas",
                        "cells": {
                            "1": "1 celda seleccionada",
                            "_": "$d celdas seleccionadas"
                        },
                        "columns": {
                            "1": "1 columna seleccionada",
                            "_": "%d columnas seleccionadas"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "next": "Proximo",
                        "hours": "Horas",
                        "minutes": "Minutos",
                        "seconds": "Segundos",
                        "unknown": "-",
                        "amPm": [
                            "am",
                            "pm"
                        ]
                    },
                    "editor": {
                        "close": "Cerrar",
                        "create": {
                            "button": "Nuevo",
                            "title": "Crear Nuevo Registro",
                            "submit": "Crear"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar Registro",
                            "submit": "Actualizar"
                        },
                        "remove": {
                            "button": "Eliminar",
                            "title": "Eliminar Registro",
                            "submit": "Eliminar",
                            "confirm": {
                                "_": "¿Está seguro que desea eliminar %d filas?",
                                "1": "¿Está seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "Múltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                        }
                    },
                    "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
            },
  		});

          $('#tablaPracticante tbody').on('click','.btnVer',function(){
            
            var data = table.row($(this).parents('tr')).data();
            accion = "actualizar";

                            $("#idpracticante").val(data["ID_PRACTICANTES"]),
                            $("#txtnonbre").val(data["NOMBRES"]),
                            $("#txtapellido").val(data["APELLIDOS"]),
                            $("#ru").val(data["RUT"]),
                            $("#Sinstitucio").val(data["4"]),
                            $("#Scarrer").val(data["6"]),
                            $("#Stipo_practic").val(data["8"]),
                            $("#fecha_inici").val(data["FECHA_INICIO"]),
                            $("#fecha_termin").val(data["FECHA_TERMINO"]),
                            $("#txtfot").val(data["FOTO"]),
                            $("#Sencargad").val(data["13"]);
                            console.log("Imprimiendo "+data["NOMBRES"]);

        })

        $(".btn-agregar-practicantes").on('click',function(){
            accion = "registrar";
        });





        $('#tablaPracticante tbody').on('click','.btnEliminar',function(){
            var data = table.row($(this).parents('tr')).data();
            
            var id = data["ID_PRACTICANTES"];

            var datos = new FormData();
            datos.append('accion',"eliminar")
            datos.append('id',id);

            swal.fire({

                title: "¡CONFIRMACION!",
                text: "Seguro que desea eliminar la practicantes?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Sí, Eliminar",
                cancelButtonText: "Cancelar"

            }).then(resultado => {

                if(resultado.value)  {                    

                    //LLAMADO AJAX
                    $.ajax({
                        url: "ajax/practicante.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta){

                            console.log(respuesta);
                        
                            table.ajax.reload( null, false );                            

                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            });
                        
                        }
                    })
                }
                else{
                    // alert("no se modifico la practicantes");
                }

            })
        })

        $('#tablaPracticante tbody').on('click','.btnEditar',function(){
            
            var data = table.row($(this).parents('tr')).data();
            accion = "actualizar";

                            $("#idpracticantes").val(data["ID_PRACTICANTES"]),
                            $("#txtnonbres").val(data["NOMBRES"]),
                            $("#txtapellidos").val(data["APELLIDOS"]),
                            $("#rut").val(data["RUT"]),
                            $("#Sinstitucion").val(data["4"]),
                            $("#Scarrera").val(data["6"]),
                            $("#Stipo_practica").val(data["8"]),
                            $("#fecha_inicio").val(data["FECHA_INICIO"]),
                            $("#fecha_termino").val(data["FECHA_TERMINO"]),
                            $("#txtfoto").val(data["FOTO"]),
                            $("#Sencargado").val(data["13"]);
                            //console.log("Imprimiendo "+data["4"]);

        })

        // GUARDAR LA INFORMACION DE practicantes DESDE LA VENTANA MODAL
        $("#btnGuardar").on('click',function(){

            var id = $("#idpracticantes").val(),
                nombres = $("#txtnonbres").val(),
                apellidos = $("#txtapellidos").val(),
                rut = $("#rut").val(),
                institucion_id = $("#Sinstitucion").val(),
                carrera_id = $("#Scarrera").val(),
                tipo_practica_id = $("#Stipo_practica").val(),
                fecha_inicio = $("#fecha_inicio").val(),
                fecha_termino = $("#fecha_termino").val(),
                foto = $("#foto").val(),
                encargado_id = $("#Sencargado").val();

                console.warn("Imprimiendo "+foto);

                //fecha = new Date().toISOString().replace(/T/, ' ').replace(/\..+/, '');
             
            
            var datos = new FormData();


            datos.append('id',id);
            datos.append('nombres',nombres);
            datos.append('apellidos',apellidos);
            datos.append('rut',rut);
            datos.append('institucion_id',institucion_id);
            datos.append('carrera_id',carrera_id);
            datos.append('tipo_practica_id',tipo_practica_id);
            datos.append('fecha_inicio',fecha_inicio);
            datos.append('fecha_termino',fecha_termino);
            
            datos.append('foto',foto);
            datos.append('encargado_id',encargado_id);
            datos.append('accion',accion);

          
            

            swal.fire({
                title: "¡CONFIRMAR!",
                text: "¿Está seguro que desea registrar el pracicante?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Si, deseo registrar",
                cancelButtonText: "Cancelar"
            
            }).then(resultado => {

                if(resultado.value)  {
            
                    

                    $.ajax({
                        url: "ajax/practicante.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta){
                            console.log(respuesta);

                            $("#modal-gestionar-practicantes").modal('hide');
                            
                            table.ajax.reload(null,false);

                            

                            $("#idpracticantes").val(""),
                            $("#txtnonbres").val(""),
                            $("#txtapellidos").val(""),
                            $("#rut").val(""),
                            $("#Sinstitucion").val(""),
                            $("#Scarrera").val(""),
                            $("#Stipo_practica").val(""),
                            $("#fecha_inicio").val(""),
                            $("#fecha_termino").val(""),
                            $("#txtfoto").val(""),
                            $("#Sencargado").val("");

                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            })

                        }
                    });
                }
                else{
            
                }

            })

            

            
        })

    
	})

    
	
	

</script>