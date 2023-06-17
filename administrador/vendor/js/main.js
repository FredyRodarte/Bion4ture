$(document).ready(function(){
    console.log("cargamos documento");

    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar' title='Editar'><i class='fa-solid fa-pencil'></i></button><button class='btn btn-danger btnBorrar' title='Borrar'><i class='fa-solid fa-trash-can'></i></button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
    $("#btnNuevo").click(function(){
        $("#formPersonas").trigger("reset");
        $(".modal-header").css("background-color", "#3A61D0");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Usuario");            
        $("#modalCRUD").modal("show");        
        id=null;
        opcion = 1; //alta
    });

    var fila;

    //boton Editar
    $(document).on("click", ".btnEditar", function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        paterno = fila.find('td:eq(2)').text();
        
        $("#nombre").val(nombre);
        //$("#apPat").val(aPat);

        $(".modal-header").css("background-color", "#3A61D0");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar usuario");            
        $("#modalCRUD").modal("show");
    });
});