$(document).ready(function(){
    //console.log("cargamos documento");

    tablaPersonas = $("#tablaProductos").DataTable({
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
        $("#formProductos").trigger("reset");
        $(".modal-header").css("background-color", "#3A61D0");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Producto");            
        $("#modalCRUD").modal("show");        
        id=null;
        opcion = 1; //alta
    });

    var fila; //capturar la fial para editar o borrar el registro

    //boton Editar
    $(document).on("click", ".btnEditar", function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        sku = fila.find('td:eq(1)').text();
        nombre = fila.find('td:eq(2)').text();
        descripcion = fila.find('td:eq(3)').text();
        cantidad = fila.find('td:eq(4)').text();
        precio = fila.find('td:eq(5)').text();
        


        $("#sku").val(sku);
        $("#nombre").val(nombre);
        $("#descripcion").val(descripcion);
        $("#cantidad").val(cantidad);
        $("#precio").val(precio);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#3A61D0");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar producto");            
        $("#modalCRUD").modal("show");
    });

    //boton Borrar
    $(document).on("click",".btnBorrar",function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        sku = fila.find('td:eq(1)').text();
        nombre = fila.find('td:eq(2)').text();
        opcion = 3 //borrar
        var respuesta = confirm("¿Estas seguro de eliminar el registro de: "+sku+" "+nombre+"?");

        if(respuesta){
            $.ajax({
                url:"bd/crudProductos.php",
                type:"POST",
                dataType:"json",
                data:{opcion:opcion, id:id},
                success: function(){
                    tablaProductos.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    //Enviar datos nuevo usuario y editar usuario
    $("#formProductos").submit(function(e){
        e.preventDefault();
        sku = $.trim($("#sku").val());
        nombre = $.trim($("#nombre").val());
        descripcion = $.trim($("#descripcion").val());
        cantidad = $.trim($("#cantidad").val());
        precio = $.trim($("#precio").val());
        

        $.ajax({
            url: "bd/crudProductos.php",
            type: "POST",
            dataType: "json",
            data: {sku:sku,nombre:nombre,descripcion:descripcion,cantidad:cantidad,precio:precio,id:id,opcion:opcion},
            succes: function(data){
                console.log(data);
                sku = data[0].sku;
                nombre = data[0].nombre;
                descripcion = data[0].descripcion;
                cantidad = data[0].cantidad;
                precio = data[0].precio;
                                
                if(opcion == 1){tablaProductos.row.add([id,sku,nombre,descripcion,cantidad,precio]).draw();}
                else{tablaProductos.row(fila).data([id,sku,nombre,descripcion,cantidad,precio]).draw();}
            }
        });
        $("#modalCRUD").modal("hide");
    });
});