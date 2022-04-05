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

        <table id="tablapracticantes" class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead class="bg-info">
                <tr>
                    <td style="width:5%;">Id</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td style="width:15%;">RUT</td>
                    <td style="width:10%;">Institucion</td>
                    <td style="width:10%;">Carrera</td>
                    <td style="width:10%;">Tipo de Practica</td>
                    <td style="width:10%;">Fecha Inicio</td>
                    <td style="width:10%;">Fecha Termino</td>
                    <td style="width:10%;">Foto</td>
                    <td style="width:10%;">Encargado</td>
                    <td style="width:5%;">Acciones</td>
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
               <div class="row">
                   <div class="col-sm-4">
                        <div class="form-group">
                            <input type="hidden" id ="idpracticante" name ="practicante" value ="">
                            <label for="txtnombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="txtnonbres" placeholder="Ingrese el nombre">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtapellido">Apellidos</label>
                            <input type="text" class="form-control" name="apellido" id="txtapellido" placeholder="Ingrese el apellido">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtrut">Rut</label>
                            <input type="text" class="form-control" name="rut"  required oninput="checkRut(this)"  id="txtrut" placeholder="Ingrese el rut">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="fechainicio">Fecha Inicio</label>
	                    <input type="date" class="form-control" id="fechainicio" name="fechainicio" placeholder="aaaa-mm-dd">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                       
                        <label for="fechafin">Fecha Fin</label>
                        <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="aaaa-mm-dd">
                        </div>
                   </div>
                   <div class="col-sm-4">
                        <div class="form-group">
                        <label for="carrera">Seleccione Carrera:</label>
                        <select class="form-control" >
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
                        <select class="form-control" >
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
                        <select class="form-control" >
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
                        <select class="form-control" >
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





                   



               </div>
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
<!-- ./ VENTANA MODAL PARA REGISTRO Y ACTUALIZACION -->

<script>

	$(document).ready(function(){

        var accion = "";

        var Toast = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  showConfirmButton: false,
                                  timer: 3000
                                });

  		var table = $("#tablapracticantes").DataTable({
  			"ajax":{
				"url": "ajax/practicante.ajax.php",
				"type":"POST",
				"dataSrc":""
			},  			
            "columnDefs":[ 
	            	// {
	            	// 	"targets": 4,
	            	// 	"sortable": false,
	            	// 	"render": function (data, type, full, meta){

	            	// 		if(data == 1){
					// 			return "<div class='bg-primary color-palette text-center'>ACTIVO</div> " 
	            	// 		}else{
					// 			return "<div class='bg-danger color-palette text-center'>INACTIVO</div> " 
	            	// 		}
	            			
	            	// 	}
	            	// },
            		{
	            		"targets": 11,
	            		"sortable": false,
	            		"render": function (data, type, full, meta){
	            			return "<center>" +
	                                    "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-gestionar-practicantes'> " +
	            						  "<i class='fas fa-pencil-alt'></i> " +
	            					    "</button> " + 
	            					    "<button type='button' class='btn btn-danger btn-sm btnEliminar'> " +
	            						  "<i class='fas fa-trash'> </i> " +
	            					    "</button>" +
	                                "</center>";
	                    }
            		}
            	],
            "columns":[
                    {"data": "ID_PRACTICANTE"},
                    {"data": "NOMBRES"},
                    {"data": "APELLIDOS"},
                    {"data": "RUT"},
                    {"data": "INSTITUCION_ID"},
                    {"data": "CARRERA_ID"},
                    {"data": "TIPO_PRACTICA_ID"},
                    {"data": "FECHA_INICIO"},
                    {"data": "FECHA_TERMINO"},
                    {"data": "FOTO"},
                    {"data": "ENCARGADO_ID"},

                    {"data": "acciones"}
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

        $(".btn-agregar-practicantes").on('click',function(){
            accion = "registrar";
        });

        $('#tablapracticantess tbody').on('click','.btnEliminar',function(){
            var data = table.row($(this).parents('tr')).data();
            
            var id = data["id"];

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
                        url: "ajax/practicantess.ajax.php",
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

        $('#tablapracticantess tbody').on('click','.btnEditar',function(){
            
            var data = table.row($(this).parents('tr')).data();
            accion = "actualizar";

            $("#idpracticantes").val(data["id"])
            $("#txtpracticantes").val(data["practicantes"]);
            $("#txtRuta").val(data["ruta"]);
            $("#txtFecha").val(data["fecha"]);
            $("#ddlEstado").val(data["estado"]);
            

        })

        // GUARDAR LA INFORMACION DE practicantes DESDE LA VENTANA MODAL
        $("#btnGuardar").on('click',function(){

            var id = $("#idpracticantes").val(),
                practicantes = $("#txtpracticantes").val(),
                ruta = $("#txtRuta").val(),
                estado = $("#ddlEstado").val(),
                fecha = new Date().toISOString().replace(/T/, ' ').replace(/\..+/, '');
            
            var datos = new FormData();

            datos.append('id',id)
            datos.append('practicantes',practicantes)
            datos.append('ruta',ruta);
            datos.append('estado',estado);
            datos.append('fecha',fecha);
            datos.append('accion',accion);

            swal.fire({
                title: "¡CONFIRMAR!",
                text: "¿Está seguro que desea registrar la categoría?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Si, deseo registrar",
                cancelButtonText: "Cancelar"
            
            }).then(resultado => {

                if(resultado.value)  {
            
                    

                    $.ajax({
                        url: "ajax/practicantess.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta){
                            console.log(respuesta);

                            $("#modal-gestionar-practicantes").modal('hide');
                            
                            table.ajax.reload(null,false);

                            $("#idpracticantes").val("");
                            $("#txtpracticantes").val("");
                            $("#txtRuta").val("");
                            $("#ddlEstado").val([1]);

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