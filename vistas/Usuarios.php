<?php
$title = 'Usuarios';
ob_start();
?>

<style>
    #listadoregistros {
        display: none;
    }
</style>


<h1 class="display-4" style="color:#0e76a8 ; font-weight: 600; font-size: 40px;">
<img src="https://media4.giphy.com/avatars/Walmart/UkUdnUHTol7X.png" alt="" width="80px" srcset=""><?= $title ?>
</h1>
<div class="mb-3 card p-3">
    <div class="row">
        <div class="col-sm-3">
            <label for="Nombre_Usuario">Nombre:</label>
            <input class="form-control" type="text" id="Nombre_Usuario" name="id">
        </div>
        <div class="col-sm-3">
            <label for="Apellido_Usuario">Apellido:</label>
            <input class="form-control" type="text" id="Apellido_Usuario" name="nombre">
        </div>
        <div class="col-sm-3">
            <label for="Email_Usuario">Email:</label>
            <input class="form-control" type="text" id="Email_Usuario" name="id">
        </div>
        <div class="col-sm-3">
            <label for="Password_Usuario">Password:</label>
            <input class="form-control" type="text" id="Password_Usuario" name="nombre">
        </div>
        <div class="col-sm-3" style="display: flex; align-items: end;">
                <select class="form-select form-select-lg" name="" id="Rol_Usuario">
                    <option selected>Select Rol</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
        </div>
        <div class="col-sm-3" style="display: flex; justify-content: start; align-items: flex-end;">
            <input class="form-control" type="text" id="id"  placeholder="Code" name="nombre" readonly style="width:150px;">
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
        <thead  style="background:#2E86C1; color:white;">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Rol</th>
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

<script src="eventos_vistas/event_usuario.js"></script>
</body>

</html>