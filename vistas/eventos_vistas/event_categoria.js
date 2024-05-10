function habilitar_botones_Categoria() {
    document.getElementById("AgregarCategoria").disabled = true;
    document.getElementById("EliminarCategoria").disabled = false;
    document.getElementById("EditarCategoria").disabled = false;
    document.getElementById("Codigo_Categoria").disabled =true;
}

function desabilitar_botones_Categoria() {
    document.getElementById("AgregarCategoria").disabled = false;
    document.getElementById("EliminarCategoria").disabled = true;
    document.getElementById("EditarCategoria").disabled = true;
    document.getElementById("Codigo_Categoria").disabled =false;

}

function AgregarCategoria() {
    
    var Codigo_Categoria = $("#Codigo_Categoria").val();
    var Nombre_Categoria = $("#Nombre_Categoria").val()

    if (Codigo_Categoria=='' || Nombre_Categoria=='') {
        Swal.fire('Faltan Datos');
    } else {
        $.ajax({
            type: "POST",
            url: "../ajax/Categoria.php?op=guardar",
            data: {
                Codigo_Categoria:Codigo_Categoria,
                Nombre_Categoria:Nombre_Categoria
            },
            success: function(response) {
                Swal.fire(response);
                this.ListarCategoria();
                this.LimpiarCategoria();
            }
        });
    }
}



function ListarCategoria() {
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

function EliminarCategoria() {
    var Codigo_Categoria = $("#Codigo_Categoria").val().trim();
    $.ajax({
        type: "POST",
        url: "../ajax/Categoria.php?op=eliminar",
        data: {
            Codigo_Categoria:Codigo_Categoria
        },
        success: function(response) {
            Swal.fire(response);
            ListarCategoria();
        }
    });
}




function BuscaCategoria() {
    var Codigo_Categoria = document.getElementById('Codigo_Categoria').value;
    var Nombre_Categoria = document.getElementById('Nombre_Categoria');
    if(Codigo_Categoria ==''){
        Swal.fire(" Campo Codigo Categoria Vacio");
    }else{
        $.ajax({
        type: "POST",
        url: "../ajax/Categoria.php?op=mostrar",
        data: {
            Codigo_Categoria
        },
        success: function(response) {
            var resultado = JSON.parse(response);

            if (resultado == null) {
                Swal.fire("Categoria No Existe");
            } else {
                 Nombre_Categoria.value= resultado['Nombre_Categoria'];

            }
        }
    });
    }
}


function selectCategoria(Codigo_Categoria) {
    this.habilitar_botones_Categoria();
    $.ajax({
        type: "POST",
        url: "../ajax/Categoria.php?op=mostrar",
        data: {
            Codigo_Categoria:Codigo_Categoria
        },
        success: function(response) {
            var resultado = JSON.parse(response);
            document.getElementById("Codigo_Categoria").value = resultado['Codigo_Categoria'];
            document.getElementById("Nombre_Categoria").value = resultado['Nombre_Categoria'];
        }
    });
}


function LimpiarCategoria(){
    this.desabilitar_botones_Categoria();
    document.getElementById("Nombre_Categoria").value =  "";
    document.getElementById("Codigo_Categoria").value =  ""
}