<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
} else {
    $user_id = isset($_SESSION["id"]) ? $_SESSION["id"] : null;
    $nombre = isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : null;
    $apellido = isset($_SESSION["apellido"]) ? $_SESSION["apellido"] : null;
    $email = isset($_SESSION["email"]) ? $_SESSION["email"] : null;
}
?>

<!DOCTYPE html>
<html lang="en">
  

<head>
    <?php include('head_tags.php'); ?>
</head>

<body onload="open()">
     <!-- Page Preloder -->
   <div id="preloder" style="
   position: fixed;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	z-index: 999999;
	background:white;">
        <div class="loader" style="
        display:flex;
        justify-content:center;
	    align-items:center;" >
        <img src="https://cdn.dribbble.com/users/766394/screenshots/3351602/walmart-loader.gif" alt="">
        </div>
    </div>
    <?php include('encabezado.php'); ?>

    <main class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
            <?php include('../vistas/menu.php'); ?>

            <div class="col main pt-5 mt-3">
                <?= $content ?>
            </div>
        </div>
    </main>

    <?php include('footer.php'); ?>
</body>

</html>

<script>
     function open() {
        $(".loader").fadeOut();
        $("#preloder").delay(400).fadeOut("slow");
     }
</script>