function habilitar_botones() {
    document.getElementById("Agregar").disabled = true;
    document.getElementById("Eliminar").disabled = false;
    document.getElementById("Editar").disabled = false;
    document.getElementById("Codigo_Producto").disabled =true;
}

function desabilitar_botones() {
    document.getElementById("Agregar").disabled = false;
    document.getElementById("Eliminar").disabled = true;
    document.getElementById("Editar").disabled = true;
    document.getElementById("Codigo_Producto").disabled =false;

}

function agregar() {
    var Codigo_Producto = $("#Codigo_Producto").val().trim();
    var Nombre_Producto = $("#Nombre_Producto").val()
    var Precio_Producto = $("#Precio_Producto").val()
    var Codigo_Categoria = $("#Codigo_Categoria").val()
    

    if (Codigo_Producto == '' || Nombre_Producto == '' || Precio_Producto == '' || Codigo_Categoria == '') {
        Swal.fire('Faltan Datos');
    } else {
        $.ajax({
            type: "POST",
            url: "../ajax/Producto.php?op=guardar",
            data: {
                Codigo_Producto:Codigo_Producto,
                Nombre_Producto:Nombre_Producto,
                Precio_Producto:Precio_Producto,
                Codigo_Categoria:Codigo_Categoria
            },
            success: function(response) {
                Swal.fire(response);
                limpiar();
                listar();
            }
        });
    }
}


function eliminar() {
    var Codigo_Producto = $("#Codigo_Producto").val().trim();
    $.ajax({
        type: "POST",
        url: "../ajax/Producto.php?op=eliminar",
        data: {
            Codigo_Producto:Codigo_Producto
        },
        success: function(response) {
            Swal.fire(response);
            limpiar();
            listar();
        }
    });
}

function editar() {
    var Codigo_Producto = $("#Codigo_Producto").val().trim();
    var Nombre_Producto = $("#Nombre_Producto").val()
    var Precio_Producto = $("#Precio_Producto").val()
    var Codigo_Categoria = $("#Codigo_Categoria").val()
    
    $.ajax({
        type: "POST",
        url: "../ajax/Producto.php?op=editar",
        data: {
          
                Codigo_Producto:Codigo_Producto,
                Nombre_Producto:Nombre_Producto,
                Precio_Producto:Precio_Producto,
                Codigo_Categoria:Codigo_Categoria
        },
        success: function(response) {
            Swal.fire(response);
        }
    }).done(function() {
        listar();
    });
}

function buscar() {
    var Codigo_Producto = $("#Codigo_Producto").val().trim();
    $.ajax({
        type: "POST",
        url: "../ajax/Producto.php?op=mostrar",
        data: {
            Codigo_Producto:Codigo_Producto
        },
        success: function(response) {
            var resultado = JSON.parse(response);
            document.getElementById("Codigo_Producto").value = resultado['Codigo_Producto'];
            document.getElementById("Nombre_Producto").value = resultado['Nombre_Producto'];
            document.getElementById("Precio_Producto").value = resultado['Precio_Producto'];
            document.getElementById("Codigo_Categoria").value = resultado['Codigo_Categoria'];

        }
    });
}

function mostrar_producto(Codigo_Producto) {
    habilitar_botones();
    document.getElementById("listadoregistros").style.display = "none";
    $.ajax({
        type: "POST",
        url: "../ajax/Producto.php?op=mostrar",
        data: {
            Codigo_Producto:Codigo_Producto
        },
        success: function(response) {
            var resultado = JSON.parse(response);

            document.getElementById("Codigo_Producto").value = resultado['Codigo_Producto'];
            document.getElementById("Nombre_Producto").value = resultado['Nombre_Producto'];
            document.getElementById("Precio_Producto").value = resultado['Precio_Producto'];
            document.getElementById("Codigo_Categoria").value = resultado['Codigo_Categoria'];
            document.getElementById("Nombre_Categoria").value = resultado['Nombre_Categoria'];

        }
    });
}

function limpiar() {
            document.getElementById("Codigo_Producto").value = "";
            document.getElementById("Nombre_Producto").value =  "";
            document.getElementById("Precio_Producto").value =  "";
            document.getElementById("Nombre_Categoria").value =  "";
            document.getElementById("Codigo_Categoria").value =  "";
    desabilitar_botones();
}

//Función Listar
function listar() {
document.getElementById("listadoregistrosCategoria").style.display = "none";
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
    url: "../ajax/Producto.php?op=listar",
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

//Added only for product

function listarCategoria() {
    document.getElementById("listadoregistros").style.display = "none";
    document.getElementById("listadoregistrosCategoria").style.display = "block";
    tabla = $('#tbllistadoCategoria').dataTable({
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
            url: "../ajax/Categoria.php?op=listar",
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
