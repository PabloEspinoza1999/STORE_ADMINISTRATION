<?php
$title = 'Productos';
ob_start();
?>

<style>
    #listadoregistros, #listadoregistrosCategoria {
        display: none;
    }
</style>


<h1 class="display-4" style="color:#0e76a8 ; font-weight: 600; font-size: 40px;"><img src="https://media4.giphy.com/avatars/Walmart/UkUdnUHTol7X.png" alt="" width="80px" srcset=""><?= $title ?> <img src="https://cdn-icons-png.flaticon.com/512/1524/1524855.png"  width="80px" style="border-radius: 50px;" alt="">
</h1>
<div class="mb-3 card p-3">
    <div class="row">
        <div class="col-sm-3">
        <i class='bx bx-barcode-reader' style="font-size: 25px;"></i>
        <label for="Codigo_Producto">Código Producto:</label>
        <div class="code">
        <input class="form-control All_boxs" type="text" id="Codigo_Producto" name="Codigo_Producto">
        </div>
        </div>
        <div class="col-sm-3">
            <label for="Nombre_Producto">Nombre Producto:</label>
            <input class="form-control All_boxs" type="text" id="Nombre_Producto" name="Nombre_Producto">
        </div>
        <div class="col-sm-3">
            <label for="Precio_Producto">Precio Producto:</label>
            <input class="form-control All_boxs" type="text" id="Precio_Producto" name="Precio_Producto">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label for="Codigo_Categoria">Código Categoria:</label>
            <div class="d-flex flex-row justify-content-between">
                <div class="pr-md-2">
                    <input class="form-control All_boxs" type="text" id="Codigo_Categoria" name="Codigo_Categoria" onblur="BuscaCategoria()">
                    <input type="hidden" >
                    <small class="text-danger" id="cod-categoria-feedback"></small>
                </div>

                <div class="">
                    <button class="float-right btn btn-primary" id="listar-producto" onclick="listarCategoria()">Buscar</button>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <label for="Nombre_Categoria">Nombre Categoria </label>
            <input class="form-control" style="border:none" type="text" id="Nombre_Categoria" name="Nombre_Categoria" readonly>
        </div>
        <div class="col-sm-2" style="display:flex;  justify-content: start;  align-items: end;">
            <a name="" id="" class="btn btn-primary" href="Categoria.php" role="button">New Category</a>
        </div>
    </div>
    <div class="row p-3">
        <button type="button" class="col mr-1 btn btn-success" id="Agregar" onclick="agregar()"><i class='bx bx-add-to-queue'></i>Agregar</button>
        <button type="button" class="col mr-1 btn btn-primary" id="Listar" onclick="listar()"><i class='bx bx-search-alt-2'></i>Buscar</button>
        <button type="button" class="col mr-1 btn btn-warning" id="Editar" onclick="editar()" disabled><i class='bx bx-edit-alt' ></i>Editar</button>
        <button type="button" class="col mr-1 btn btn-danger" id="Eliminar" onclick="eliminar()" disabled><i class='bx bxs-trash' ></i><span>Eliminar</span></button>
        <button type="button" class="col mr-1 btn btn-secondary" id="Limpiar" onclick="limpiar()"><i class='bx bxs-tag'></i>Limpiar</button>
    </div>
</div>


<!---Tablas Agregadas--->
<div class="mb-3 card p-3" id="listadoregistrosCategoria">
    <div class="row table-responsive pl-3">
        <table id="tbllistadoCategoria"  class="table table-striped table-bordered table-condensed table-hover">
         <thead style="background:#2E86C1; color:white;">
                <th>id</th>
                <th>Codigo Categoria </th>
                <th>Nombre Categoria</th>
                <th>Opciones</th>
            
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <th>id</th>
                <th>Codigo Categoria </th>
                <th>Nombre Categoria</th>
                <th>Opciones</th>
            
            </tfoot>
        </table>
    </div>
   
</div>
<div class="mb-3 card p-3" id="listadoregistros">
    <div class="row table-responsive pl-3">
        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
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
   
</div>

<?php
$content = ob_get_clean();
include './includes/layout.php';
?>
<script>
    function selectCategoria(Codigo_Categoria) {
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



 function BuscaCategoria(){
        var Codigo_Categoria = document.getElementById('Codigo_Categoria').value;
        var $Nombre_Categoria = document.getElementById("Nombre_Categoria");
        var $feedback = document.getElementById('cod-categoria-feedback');
        
      if(Codigo_Categoria===''){
       Swal.fire("Campo Codigo Categoria está vacio");
       $feedback.innerText = '';
       $Nombre_Categoria.value='';
      
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
                    $feedback.innerText = 'Categoria no existe'
                } else {
                    $Nombre_Categoria.value = resultado.Nombre_Categoria;
                    $feedback.innerText = '';
                }
            }
        });
      }
 }



</script>
<script src="./eventos_vistas/event_producto.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>