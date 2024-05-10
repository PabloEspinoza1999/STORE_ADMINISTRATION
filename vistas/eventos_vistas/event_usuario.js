
    listar();

    function habilitar_botones() {
        document.getElementById("Agregar").disabled = true;
        document.getElementById("Eliminar").disabled = false;
        document.getElementById("Editar").disabled = false;
    }

    function desabilitar_botones() {
        document.getElementById("Agregar").disabled = false;
        document.getElementById("Eliminar").disabled = true;
        document.getElementById("Editar").disabled = true;
    }

    function agregar() {
        var Nombre_Usuario = $("#Nombre_Usuario").val();
        var Apellido_Usuario = $("#Apellido_Usuario").val();
        var Email_Usuario = $("#Email_Usuario").val();
        var Password_Usuario = $("#Password_Usuario").val();
        var  Rol_Usuario = $("#Rol_Usuario").val();
        if (Nombre_Usuario == '' || Apellido_Usuario == ''  || Email_Usuario == ''
         || Password_Usuario == ''  || Rol_Usuario == '' ) {
            Swal.fire('Faltan Datos');
        } else {
            $.ajax({
                type: "POST",
                url: "../ajax/Usuario.php?op=guardar",
                data: {
                    Nombre_Usuario:Nombre_Usuario,
                    Apellido_Usuario:Apellido_Usuario,
                    Email_Usuario:Email_Usuario,
                    Password_Usuario:Password_Usuario,
                    Rol_Usuario:Rol_Usuario
                },
                success: function(response) {
                    Swal.fire(response);
                    //limpiar();
                }
            });
        }
    }

    function eliminar() {
        var id = $("#id").val();
        $.ajax({
            type: "POST",
            url: "../ajax/Usuario.php?op=eliminar",
            data: {
                id:id
            },
            success: function(response) {
                Swal.fire(response);
                limpiar();
            }
        });
    }

    function editar() {
        var id = $("#id").val();
        var Nombre_Usuario = $("#Nombre_Usuario").val();
        var Apellido_Usuario = $("#Apellido_Usuario").val();
        var Email_Usuario = $("#Email_Usuario").val();
        var Password_Usuario = $("#Password_Usuario").val();
        var  Rol_Usuario = $("#Rol_Usuario").find('option:selected').text();
        $.ajax({
            type: "POST",
            url: "../ajax/Usuario.php?op=editar",
            data: {
                    id:id,
                    Nombre_Usuario:Nombre_Usuario,
                    Apellido_Usuario:Apellido_Usuario,
                    Email_Usuario:Email_Usuario,
                    Password_Usuario:Password_Usuario,
                    Rol_Usuario:Rol_Usuario
            },
            success: function(response) {
                Swal.fire(response);
            }
        }).done(function() {
            listar();
        });
    }

    function buscar() {
        var id = $("#id").val();
        $.ajax({
            type: "POST",
            url: "../ajax/Usuario.php?op=mostrar",
            data: {
                id:id
            },
            success: function(response) {
                alert(response);
                var resultado = JSON.parse(response);
                document.getElementById("id").value = resultado['id'];
                document.getElementById("Nombre_Usuario").value = resultado['nombre'];
                document.getElementById("Apellido_Usuario").value = resultado['apellido'];
                document.getElementById("Email_Usuario").value = resultado['email'];
                document.getElementById("Password_Usuario").value = resultado['password'];
                document.getElementById("Rol_Usuario").value = resultado['rol'];

            }
        });
    }

    function mostrar(id) {
        habilitar_botones();
        document.getElementById("listadoregistros").style.display = "none";
        $.ajax({
            type: "POST",
            url: "../ajax/Usuario.php?op=mostrar",
            data: {
                id: id
            },
            success: function(response) {
                alert(response);
                var resultado = JSON.parse(response);
                document.getElementById("id").value = resultado['id'];
                document.getElementById("Nombre_Usuario").value = resultado['nombre'];
                document.getElementById("Apellido_Usuario").value = resultado['apellido'];
                document.getElementById("Email_Usuario").value = resultado['email'];
                document.getElementById("Password_Usuario").value = resultado['password'];
                document.getElementById("Rol_Usuario").value = resultado['rol'];
            }
        });
    }

    function limpiar() {
                document.getElementById("id").value ="";
                document.getElementById("Nombre_Usuario").value = "";
                document.getElementById("Apellido_Usuario").value = "";
                document.getElementById("Email_Usuario").value = "";
                document.getElementById("Password_Usuario").value = "";
                document.getElementById("Rol_Usuario").selectedIndex =0;
        desabilitar_botones();
    }

    //Función Listar
    function listar() {

        document.getElementById("listadoregistros").style.display = "block";
        tabla = $('#tbllistado').dataTable({
            "aProcessing": true, //Activamos el procesamiento del datatables
            "aServerSide": true, //Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip', //Definimos los elementos del control de tabla
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "ajax": {
                url: "../ajax/Usuario.php?op=listar",
                type: "get",
                dataType: "json",
                error: function(e) {
                    console.log(e.responseText);
                }
            },
            "bDestroy": true,
            "iDisplayLength": 5, //Paginación
            "order": [
                [0, "asc"]
            ] //Ordenar (columna,orden)
        }).DataTable();
    }
