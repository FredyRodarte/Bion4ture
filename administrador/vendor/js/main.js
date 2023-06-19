$(document).ready(function(){
    //console.log("cargamos documento");

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

    var fila; //capturar la fial para editar o borrar el registro

    //boton Editar
    $(document).on("click", ".btnEditar", function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        paterno = fila.find('td:eq(2)').text();
        materno = fila.find('td:eq(3)').text();
        fecha = fila.find('td:eq(4)').text();
        seguro = fila.find('td:eq(5)').text();
        usuario = fila.find('td:eq(6)').text();
        pass = fila.find('td:eq(7)').text();
        userTipo = fila.find('td:eq(8)').text();


        $("#nombre").val(nombre);
        $("#apPat").val(paterno);
        $("#apMat").val(materno);
        $("#nacimiento").val(fecha);
        $("#nss").val(seguro);
        $("#usuario").val(usuario);
        $("#contraseña").val(pass);
        $("#tipo").val(userTipo);
        opcion = 2; //editar

        $(".modal-header").css("background-color", "#3A61D0");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar usuario");            
        $("#modalCRUD").modal("show");
    });

    //boton Borrar
    $(document).on("click",".btnBorrar",function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        paterno = fila.find('td:eq(2)').text();
        opcion = 3 //borrar
        var respuesta = confirm("¿Estas seguro de eliminar el registro de: "+nombre+" "+paterno+"?");

        if(respuesta){
            $.ajax({
                url:"bd/crudUsuario.php",
                type:"POST",
                dataType:"json",
                data:{opcion:opcion, id:id},
                success: function(){
                    tablaPersonas.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    //Enviar datos nuevo usuario y editar usuario
    $("#formPersonas").submit(function(e){
        e.preventDefault();
        nombre = $.trim($("#nombre").val());
        paterno = $.trim($("#apPat").val());
        materno = $.trim($("#apPat").val());
        fecha = $.trim($("#nacimiento").val());
        seguro = $.trim($("#nss").val());
        user = $.trim($("#usuario").val());
        pass = $.trim($("#contraseña").val());
        userTipo = $.trim($("#tipo").val());

        $.ajax({
            url: "bd/crudUsuario.php",
            type: "POST",
            dataType: "json",
            data: {nombre:nombre,paterno:paterno,materno:materno,fecha:fecha,seguro:seguro,usuario:user,pass:pass,userTipo:userTipo,id:id,opcion:opcion},
            succes: function(data){
                console.log(data);
                nombre = data[0].nombre;
                paterno = data[0].paterno;
                materno = data[0].materno;
                fecha = data[0].fecha;
                seguro = data[0].seguro;
                user = data[0].user;
                pass = data[0].pass;
                userTipo = data[0].userTipo;
                
                if(opcion == 1){tablaPersonas.row.add([id,nombre,paterno,materno,fecha,seguro,user,pass,userTipo]).draw();}
                else{tablaPersonas.row(fila).data([id,nombre,paterno,materno,fecha,seguro,user,pass,userTipo]).draw();}
            }
        });
        $("#modalCRUD").modal("hide");
    });
});