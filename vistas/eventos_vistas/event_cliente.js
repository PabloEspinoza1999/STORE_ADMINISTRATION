
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
        var Cedula_Cliente = $("#Cedula_Cliente").val();
        var Nombre_Cliente = $("#Nombre_Cliente").val();
        if (Cedula_Cliente == '' || Nombre_Cliente == '') {
            Swal.fire('Faltan Datos');
        } else {
            $.ajax({
                type: "POST",
                url: "../ajax/Cliente.php?op=guardar",
                data: {
                    Cedula_Cliente: Cedula_Cliente,
                    Nombre_Cliente: Nombre_Cliente
                },
                success: function(response) {
                    Swal.fire(response);
                    limpiar();
                }
            });
        }
    }

    function eliminar() {
        var Cedula_Cliente = $("#Cedula_Cliente").val();
        var Nombre_Cliente = $("#Nombre_Cliente").val();
        $.ajax({
            type: "POST",
            url: "../ajax/Cliente.php?op=eliminar",
            data: {
                Cedula_Cliente: Cedula_Cliente,
                Nombre_Cliente: Nombre_Cliente
            },
            success: function(response) {
                Swal.fire(response);
                limpiar();
            }
        });
    }

    function editar() {
        var Cedula_Cliente = $("#Cedula_Cliente").val();
        var Nombre_Cliente = $("#Nombre_Cliente").val();
        $.ajax({
            type: "POST",
            url: "../ajax/Cliente.php?op=editar",
            data: {
                Cedula_Cliente: Cedula_Cliente,
                Nombre_Cliente: Nombre_Cliente
            },
            success: function(response) {
                Swal.fire(response);
            }
        }).done(function() {
            listar();
        });
    }

    function buscar() {
        var Cedula_Cliente = $("#Cedula_Cliente").val();
        $.ajax({
            type: "POST",
            url: "../ajax/Cliente.php?op=mostrar",
            data: {
                Cedula_Cliente: Cedula_Cliente
            },
            success: function(response) {
                alert(response);
                var resultado = JSON.parse(response);
                document.getElementById("Cedula_Cliente").value = resultado['Cedula_Cliente'];
                document.getElementById("Nombre_Cliente").value = resultado['Nombre_Cliente'];

            }
        });
    }

    function mostrar_cliente(Cedula_Cliente) {
        habilitar_botones();
        document.getElementById("listadoregistros").style.display = "none";
        $.ajax({
            type: "POST",
            url: "../ajax/Cliente.php?op=mostrar",
            data: {
                Cedula_Cliente: Cedula_Cliente
            },
            success: function(response) {
                alert(response);
                var resultado = JSON.parse(response);
                document.getElementById("Cedula_Cliente").value = resultado['Cedula_Cliente'];
                document.getElementById("Nombre_Cliente").value = resultado['Nombre_Cliente'];
            }
        });
    }

    function limpiar() {
        document.getElementById("Nombre_Cliente").value = "";
        document.getElementById("Cedula_Cliente").value = "";
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
                url: "../ajax/Cliente.php?op=listar",
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