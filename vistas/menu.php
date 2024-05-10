<div class="col-sm-2 m-0 p-0 sidebar sidebar-offcanvas" id="sidebar-menu" role="navigation">
    <nav class="nav-container m-0">
        <div class="row m-0 d-sm-none text-white">
            <center class="sidebar-profile"><img src="../public/img/user.png" alt="" class="mt-2 mx-center"></center>
            <?= $nombre; ?>
            <?= $apellido; ?>
        </div>
        <div class="publico m-0">
            <a href="">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Walmart_logo.svg/2560px-Walmart_logo.svg.png" style="border-radius: 15px;"  width="100%" alt="" srcset="">
            </a>
            <a href="./dashboard.php"><i class='bx bx-home'></i><span>Dashboard</span></a>
            <a  class="es-padre es-modulo" id="reporte"><i class='bx bx-task'></i><span>Nuevo Producto</span></a>
            <a href="Productos.php" class="es-modulo collapse modulo-hijo padre-reporte"><i class='bx bx-package'></i><span>Productos</span></a>
            <a href="Categoria.php" class="es-modulo collapse modulo-hijo padre-reporte"><i class='bx bxs-category'></i><span>Categoria</span></a>
            <a href="./Detalle_Factura.php" id="factura"><i class='bx bxs-calculator'></i><span>Facturación</span></a>
            <a href="./Cliente.php"><i class='bx bxs-group'></i><span>Clientes</span></a>
            <a href="./Usuarios.php"><i class='bx bx-user-pin'></i><span>Usuarios</span></a>
            <a href="#"><i class="bx bxs-cog"></i><span>Configuración</span></a>
            <div class="configuracion" style="width: 100%; padding-top: 50px;">
            <a href="#" onclick="logout()"><i class='bx bx-log-out'></i><span>Salir</span></a>
            </div>
        </div>
       
    </nav>
</div>