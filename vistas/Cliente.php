<?php
$title = 'Cliente';
ob_start();
?>

<style>
    #listadoregistros {
        display: none;
    }
</style>

<h1 class="display-4" style="color:#0e76a8 ; font-weight: 600; font-size: 40px;"><img src="https://media4.giphy.com/avatars/Walmart/UkUdnUHTol7X.png" alt="" width="80px" srcset=""><?= $title ?> <img src="https://cdn-icons-png.flaticon.com/512/4143/4143126.png"  width="80px" style="border-radius: 50px;" alt="">
</h1>

<div class="mb-3 card p-3">
    <div class="row">
        <div class="col-sm-3">
            <label for="Cedula_Cliente">Cedula:</label>
            <input class="form-control All_boxs" type="text" id="Cedula_Cliente" name="id">
        </div>
        <div class="col-sm-3">
            <label for="Nombre_Cliente">Nombre:</label>
            <input class="form-control All_boxs" type="text" id="Nombre_Cliente" name="nombre">
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

<div class="mb-3 card p-3" id="listadoregistros">
    <div class="row table-responsive pl-3">
        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background:#2E86C1; color:white;">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


<?php
$content = ob_get_clean();
include './includes/layout.php';
?>

<script src="eventos_vistas/event_cliente.js"></script>
</body>

</html>