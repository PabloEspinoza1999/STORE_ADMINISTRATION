<?php
$title = 'Factura';
ob_start();
?>
<style>
    #listadoregistros{
        display: none;
    }
    .Save_All{
    display: flex; 
    justify-content: space-between; 
    align-items: center;
}
.box_factura{
    border: none;
    display: flex; 
    color:#0e76a8;
    font-weight:600 ;
    margin:20px;
    padding: 20px;
    justify-content: center; 
    align-items: center;
    font-size: 40px;
}



</style>

<h1 class="display-4" style="color:#0e76a8 ; font-weight: 600; font-size: 40px;">
<img src="https://media4.giphy.com/avatars/Walmart/UkUdnUHTol7X.png" alt="" width="80px" srcset=""><?= $title ?>
<img src="../public/img/caja-registradora.png" alt="" width="80px" >
</h1>


<div class="mb-3 card p-3">
<div class="row">
   </div>
   <h3 class="sub_titulo"><i class='bx bxs-group'></i>Cliente</h3>
    <div class="row">
        <div class="col-sm-3">
            <label for="Cedula_Cliente">Cédula:</label>
            <div class="d-flex ">
                <div class="pr-md-2">
                    <input class="form-control All_boxs" type="text" id="Cedula_Cliente" name="Cedula_Cliente"  onblur="Buscar_Cliente()" placeholder="Ingresa la Cedula">
                    <input type="hidden" name="Cedula_Cliente_Id" id="Cedula_Cliente_Id">
                    <small class="text-danger" id="cedula-feedback"></small>
                </div>
                 <a class="float-right btn btn-primary" id="" onclick="listar_clientes()"><i class='bx bx-search-alt-2' ></i>Buscar</a>
           
            </div>
        </div>
        <div class="col-sm-3">
            <label for="Nombre_Cliente">Nombre Cliente:</label>
            <input class="form-control All_boxs" type="text" id="Nombre_Cliente" name="Nombre_Cliente" >
        </div>
        <div class="col-sm-3">
            <label for="Fecha_Factura">Fecha Factura:</label>
            <input class="form-control All_boxs" type="date" id="Fecha_Factura" name="Fecha_Factura">
        </div>
        <div class="col-sm-2">
            <label for="Numero_Factura">N° Factura:</label>
            <input class="form-control All_boxs" type="text" id="Numero_Factura" name="Numero_Factura">
        </div>
    </div>
  <br>
   <h3  class="sub_titulo"><i class='bx bxs-package'></i>Producto</h3>
   <br>
    <div class="row">
        <div class="col-sm-3">
            <label for="Codigo_Producto">Código Producto:</label>
            <div class="d-flex">
                <div class="pr-md-2">
                    <input class="form-control All_boxs" type="text" id="Codigo_Producto" name="Codigo_Producto" onblur="Buscar_Producto()"  placeholder="Ingresa el codigo">
                    <input type="hidden" name="id" id="id">
                    <small class="text-danger" id="producto-feedback"></small>
                </div>

                <div class="">
                    <a class="float-right btn btn-primary" id="listar-libros" onclick="listar_productos()"><i class='bx bx-search-alt-2' ></i>Buscar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <label for="Nombre_Producto">Descripción:</label>
            <input class="form-control " style='border:none' type="text" id="Nombre_Producto" name="Nombre_Producto"  readonly >
        </div>
        <div class="col-sm-3">
            <label for="Precio_Producto">Precio Unitario:</label>
            <input class="form-control All_boxs" type="text" id="Precio_Producto" name="Precio_Producto" placeholder="₡" >
        </div>
    </div>
    <div class="row p-3">
    <div class="col-sm-1">
            <label for="Cantidad_Producto">Cantidad:</label>
            <input class="form-control All_boxs" type="number" id="Cantidad_Producto" onblur="Obtener_importe()" name="Cantidad_Producto" >
        </div>
        <div class="col-sm-3">
            <label for="Total_Producto">Importe:</label>
            <input class="form-control " style='border:none' type="text" id="Total_Producto" name="Total_Producto" placeholder="₡" readonly >
        </div>
        <div class="col-sm-3" style=" display: flex; align-items:end;" >
        <button class="btn btn-success" style="border-radius: 15px;font-size:20px;  " onclick="Agregar_Fila()"><i class='bx bx-cart-add' style=" font-size:30px;"></i>Agregar</button>
    </div> 
   
    </div>
</div>

<div class="mb-3 card p-3" id="listadoregistros">

   <div class="row table-responsive pl-3 d-none" id="lista_Cliente">
        <table id="tbllistado_Cliente" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background:#2E86C1; color:white;">
            <th scope="col">Id</th>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="row table-responsive pl-3 d-none" id="lista_Producto">
        <table id="tbllistado_Producto" class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background:#2E86C1; color:white;">
                <th>Código Producto</th>
                <th>Nombre </th>
                <th>Precio</th>
                <th>Codigo Categoria</th>
                <th>Categoria</th>
                <th>Opciones</th>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <th>Código Producto</th>
                <th>Nombre </th>
                <th>Precio</th>
                <th>Codigo Categoria</th>
                <th>Categoria</th>
                <th>Opciones</th>
            </tfoot>
        </table>
    </div>

    <div class="row table-responsive pl-3 d-none" id="lista_Factura">
        <table id="tbllistado_Factura" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background:#2E86C1; color:white;">
                <th>Producto </th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Importe</th>
                <th>Opciones</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="Save_All"  >
    <button class="btn btn-success" onclick="guardarDatos()"  style="border-radius: 15px;  padding: 10px; "><i class='bx bx-save'  style="font-size:20px;  " >Guardar Todo</i> </button>
    <div  class="box_factura "  ><p>Total:<span id="Factura_Box" style="color:#F5B041;" >₡0____</span></p></div>
    </div>
</div>


<?php
$content = ob_get_clean();
include './includes/layout.php';
?>

<script>

 var TOTAL_FACTURA=0; //Sumador
 var tabla;

 $(document).ready(function () {
 tabla = $('#tbllistado_Factura').DataTable({
        "columnDefs": [
            {
                "targets": -1,
                "data": null,
                "defaultContent": "<button class='btn btn-success' onclick='editarFila(this)'><i class='bx bxs-edit-alt'></i>Editar</button> <button class='btn btn-danger' onclick='eliminarFila(this)'><i class='bx bxs-message-square-minus'></i>Eliminar</button>"
            }
        ]
    });
 });


        function Agregar_Fila(){
            document.getElementById("listadoregistros").style.display = "block";
            document.getElementById("lista_Producto").classList.add("d-none");
            document.getElementById("lista_Cliente").classList.add("d-none");
            document.getElementById("lista_Factura").classList.remove("d-none");
           
            var Codigo_Producto = $("#Codigo_Producto").val();
            var Nombre_Producto = $("#Nombre_Producto").val();
            var Precio_Producto = $("#Precio_Producto").val();
            var Cantidad_Producto = $("#Cantidad_Producto").val();
            var Importe_Producto = $("#Total_Producto").val();
       
            if (Codigo_Producto === '' || Nombre_Producto === ''
             || Precio_Producto === '' || Cantidad_Producto === '' || Importe_Producto === '') {
                Swal.fire('Todos los campos son obligatorios.');
                return;
             }else{

            tabla = $('#tbllistado_Factura').DataTable();  
            this.tabla.row.add([Codigo_Producto , Nombre_Producto,Precio_Producto ,
            Cantidad_Producto ,Importe_Producto ]).draw();
            Swal.fire("Producto Agregado");


            this.TOTAL_FACTURA = this.TOTAL_FACTURA + parseFloat(Importe_Producto);
            document.getElementById("Factura_Box").innerHTML ='₡'+TOTAL_FACTURA;
            this.Clean_Box(); 
             }
                
        }

        function eliminarFila(btn) {
            var row = $(btn).closest('tr');
            var importe_producto = tabla.cell(row, 4).data();
            tabla.row(row).remove().draw();
            TOTAL_FACTURA = TOTAL_FACTURA - parseFloat(importe_producto);
            document.getElementById("Factura_Box").innerHTML = '₡'+TOTAL_FACTURA;
        }
       

  function editarFila(btn) {
  var fila = $(btn).closest('tr');
  var  Codigo_Producto = tabla.cell(fila, 0).data();
  var Nombre_Producto = tabla.cell(fila, 1).data();
  var Precio_Producto = tabla.cell(fila, 2).data();
  var Cantidad_Producto = tabla.cell(fila, 3).data();
  var importe_producto = tabla.cell(fila, 4).data();

  $("#Codigo_Producto").val(Codigo_Producto);
  $("#Nombre_Producto").val(Nombre_Producto);
  $("#Precio_Producto").val(Precio_Producto);
  $("#Cantidad_Producto").val(Cantidad_Producto);
  $("#Total_Producto").val(importe_producto);

  tabla.row(fila).remove().draw();
  TOTAL_FACTURA = TOTAL_FACTURA- parseFloat(importe_producto);
  document.getElementById("Factura_Box").innerHTML = '₡'+TOTAL_FACTURA;
 }



 function Clean_Box(){
    $("#Codigo_Producto").val("");
    $("#Nombre_Producto").val("");
    $("#Precio_Producto").val("");
    $("#Cantidad_Producto").val("");
    $("#Total_Producto").val("");
 }


 function Obtener_importe(){
    var Cantidad_Producto = $("#Cantidad_Producto").val();
    var Precio_Producto = $("#Precio_Producto").val();
    if(!Cantidad_Producto == "" && parseInt(Cantidad_Producto)> 0){
        if(!Precio_Producto== ""){
             var Importe_Producto = Precio_Producto*Cantidad_Producto;
             document.getElementById("Total_Producto").value = Importe_Producto;
      
         }else{
            Swal.fire("Ingresa el precio del Producto");
         }
    }else{
        Swal.fire("Se encuentran casillas vacias")
    }
 }


 function listar_clientes() {

    document.getElementById("listadoregistros").style.display = "block";
    document.getElementById("lista_Cliente").classList.remove("d-none");
    document.getElementById("lista_Producto").classList.add("d-none");
    document.getElementById("lista_Factura").classList.add("d-none");

   tabla = $('#tbllistado_Cliente').dataTable({
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


 
 function listar_productos() {
    document.getElementById("listadoregistros").style.display = "block";
    document.getElementById("lista_Producto").classList.remove("d-none");
    document.getElementById("lista_Cliente").classList.add("d-none");
    document.getElementById("lista_Factura").classList.add("d-none");
    tabla = $('#tbllistado_Producto').dataTable({
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


 function mostrar_cliente(Cedula_Cliente) {
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




    
 function mostrar_producto(Codigo_Producto) {
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
       

        }
    });
 }

 function Buscar_Cliente(){
        var Cedula_Cliente = document.getElementById('Cedula_Cliente').value;
        var $Nombre_Cliente = document.getElementById("Nombre_Cliente");
        var $feedback = document.getElementById('cedula-feedback');
        
      if(Cedula_Cliente===''){
       Swal.fire("Existen casillas vacias , rellene todas las casillas");
       $feedback.innerText = '';
       $Nombre_Cliente.value='';
      }else{
        $.ajax({
            type: "POST",
            url: "../ajax/Cliente.php?op=mostrar",
            data: {
                Cedula_Cliente
            },
            success: function(response) {
                var resultado = JSON.parse(response);

                if (resultado == null) {
                    $feedback.innerText = 'Cliente no existe'
                } else {
                    $Nombre_Cliente.value = resultado.Nombre_Cliente;
                    $feedback.innerText = '';
                }
            }
        });
      }
 }

  function Buscar_Producto(){
        var Codigo_Producto = document.getElementById('Codigo_Producto').value;
        var $Nombre_Producto = document.getElementById("Nombre_Producto");
        var $Precio_Producto   = document.getElementById("Precio_Producto");
        var $feedback = document.getElementById('producto-feedback');
        
      if(Codigo_Producto===''){
       Swal.fire("Codigo Producto se encuentra vacio");
       $feedback.innerText = '';
       $Nombre_Producto.value='';
       $Precio_Producto.value='';
      }else{
        $.ajax({
            type: "POST",
            url: "../ajax/Producto.php?op=mostrar",
            data: {
                Codigo_Producto
            },
            success: function(response) {
                var resultado = JSON.parse(response);

                if (resultado == null) {
                    $feedback.innerText = 'Ya Producto no existe'
                } else {
                    $Nombre_Producto.value = resultado.Nombre_Producto;
                    $Precio_Producto.value = resultado.Precio_Producto;
                    $feedback.innerText = '';
                }
            }
        });
      }
 }

 function guardarDatos() {
             var detalle = JSON.stringify(tabla.rows().data().toArray());
             var Cedula_Cliente = $("#Cedula_Cliente").val();
             var Nombre_Cliente = $("#Nombre_Cliente").val();
             var Fecha_Factura =  $("#Fecha_Factura").val();
             var Numero_Factura= $("#Numero_Factura").val();
             var encabezado ={"Cedula_Cliente": Cedula_Cliente,
            "Nombre_Cliente": Nombre_Cliente,"Fecha_Factura": Fecha_Factura,"Numero_Factura":Numero_Factura};
            if(Cedula_Cliente !='' && Nombre_Cliente !='' && Fecha_Factura !="" &&  Numero_Factura !=''){
                $.ajax({
                url: '../ajax/datos.php',
                type: 'POST',
                data:  {encabezado, detalle},
                dataType: 'json',
                success: function (response) {
                },
                error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Guardado");
                tabla.clear().draw();
            }
            });
            }else{
                 Swal.fire("Ingresa Un Producto");
            }
        } 

</script>
</body>

</html>