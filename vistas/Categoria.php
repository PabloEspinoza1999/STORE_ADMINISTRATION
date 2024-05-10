<?php
$title = 'Categoria';
ob_start();
?>

<style>
    #listadoregistrosCategoria {
        display: none;
    }
</style>
<a href="Productos.php"><i class='bx bx-arrow-back' style="font-size: 30px;"></i>
</a>
<h1 class="display-4" style="color:#0e76a8 ; font-weight: 600; font-size: 40px;">
<img src="https://media4.giphy.com/avatars/Walmart/UkUdnUHTol7X.png" alt="" width="80px" srcset=""><?= $title ?>
</h1>
<div class="mb-3 card p-3">
    <div class="row">
       <div class="col-sm-2">
        <div class="mb-3">
          <label for="" class="form-label">Codigo</label>
          <input type="text"
            class="form-control" name="" id="Codigo_Categoria" aria-describedby="helpId" placeholder="">
        </div>
       </div>
       <div class="col-sm-2">
        <div class="mb-3">
          <label for="" class="form-label">Nombre</label>
          <input type="text"
            class="form-control" name="" id="Nombre_Categoria" aria-describedby="helpId" placeholder="">
        </div>
       </div>
    </div>

    <div class="row p-3">
        <button type="button" class="col mr-1 btn btn-success" id="AgregarCategoria" onclick="AgregarCategoria()"><i class='bx bx-add-to-queue'></i>Agregar</button>
        <button type="button" class="col mr-1 btn btn-primary" id="ListarCategoria" onclick="ListarCategoria()"><i class='bx bx-search-alt-2'></i>Buscar</button>
        <button type="button" class="col mr-1 btn btn-warning" id="EditarCategoria" onclick="EditarCategoria()" disabled><i class='bx bx-edit-alt' ></i>Editar</button>
        <button type="button" class="col mr-1 btn btn-danger" id="EliminarCategoria" onclick="EliminarCategoria()" disabled><i class='bx bxs-trash' ></i><span>Eliminar</span></button>
        <button type="button" class="col mr-1 btn btn-secondary" id="LimpiarCategoria" onclick="LimpiarCategoria()"><i class='bx bxs-tag'></i>Limpiar</button>
    </div>
</div>

<!---Tablas Agregadas--->
<div class="mb-3 card p-3" id="listadoregistrosCategoria">
    <div class="row table-responsive pl-3">
        <table id="tbllistadoCategoria" class="table table-striped table-bordered table-condensed table-hover">
         <thead  style="background:#2E86C1; color:white;">
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

<?php
$content = ob_get_clean();
include './includes/layout.php';
?>
</body>
<script>function EditarCategoria() {
    
    var Codigo_Categoria = $("#Codigo_Categoria").val();
    var Nombre_Categoria = $("#Nombre_Categoria").val()

    if (Codigo_Categoria=='' || Nombre_Categoria=='') {
        Swal.fire('Faltan Datos');
    } else {
        $.ajax({
            type: "POST",
            url: "../ajax/Categoria.php?op=editar",
            data: {
                Codigo_Categoria:Codigo_Categoria,
                Nombre_Categoria:Nombre_Categoria
            },
            success: function(response) {
                Swal.fire(response);
                ListarCategoria();
            }
        });
    }
}


</script>
<script src="./eventos_vistas/event_categoria.js"></script>

</html>