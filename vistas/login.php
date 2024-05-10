<!DOCTYPE html>
<html lang="en">

<?php
$title = 'Login';

session_start();

if (isset($_SESSION["id"])) {
    header("Location: dashboard.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('./includes/head_tags.php'); ?>
    <title>Login</title>
</head>

<body style="background: white;">
    <div class="container-fluid  " >
        <div class="row no-gutter" style="margin: auto;  margin-top: 100px; ">

            <!-- The content half -->
            <div class="col-md-6  "  >
                <div class="login d-flex align-items-center py-5"   >

                    <!-- Demo content-->
                    <div class="container" >
                        <div class="row" >
                            <div class="col-lg-10 col-xl-7 mx-auto"  >
                                <form>
                                    <center>
                                        <img src="https://cdn-icons-png.flaticon.com/512/4837/4837857.png" width="100px" alt="">
                                        <h2 style="    color: rgb(238, 187, 78); font-weight: 700;">SIGN IN</h2>
                                    </center>

                                    <i class='bx bxs-user'></i>
                                    <input id="email" type="text" style="border-radius: 15px; padding: 25px; border:none; background:whitesmoke ;" class="form-control" placeholder="Email" class="w-100">
                                    <i class='bx bxs-lock-alt'></i>
                                    <input id="password" type="password" style="border-radius: 15px; padding: 25px; border: none; background:whitesmoke ;" class="form-control" placeholder="Contraseña" class="w-100">
                                    <center>
                                        <a href="#">Olvidé mi contraseña</a>
                                    </center>
                                    <center>
                                        <button type="button" class="btn badge-primary" onclick="login()">LOGIN</button>
                                    </center>

                                
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->


            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex right">
                <div class="w-100 container" style="background: white; color: #0e76a8; position: relative; display:flex; justify-content: center; align-items: end;  "  >
                <img src="../public/img/fondo_login.jpg"  width="100%" height="100%" alt="" srcset="">
                   <div class="contenido" style="position: absolute;">
                    <center>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Walmart_logo.svg/2560px-Walmart_logo.svg.png" style="border-radius: 15px; background: white; padding: 10px;"  width="60%"  alt="" srcset="">
                    </center>

                    <p  style="text-align: center; font-size: 25px; "> <span style="background: rgb(238, 187, 78); color: white; padding: 5px;">Siguenos en Nuestras redes Sociales</span></p>
                    <div class="socials"  style=" width: 40%; display: flex; justify-content: center; gap: 10px;" >
                        <a target="__blank" href="https://www.facebook.com/"><img src="https://cdn-icons-png.flaticon.com/512/4494/4494479.png" width="50px" alt="" srcset=""></a>
                        <a target="__blank" href="https://twitter.com/?lang=es"><img src="https://cdn-icons-png.flaticon.com/512/4494/4494481.png"  width="50px" alt="" srcset=""></a>
                        <a target="__blank" href="https://www.instagram.com/"><img src="https://cdn-icons-png.flaticon.com/512/4494/4494489.png" width="50px" alt="" srcset=""></a>
                        <a target="__blank" href="https://uy.linkedin.com/"><img src="https://cdn-icons-png.flaticon.com/512/4494/4494497.png" width="50px" alt="" srcset=""></a>
                    </div>
                </div>
                   </div>
            </div>

        </div>
    </div>

    <?php include('./includes/footer.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function login() {
            var email = document.querySelector("#email").value;
            var password = document.querySelector("#password").value;
            $.ajax({
                type: "POST",
                url: "../ajax/login.php",
                data: {
                    email,
                    password
                },
                success: function(response) {
                    res = JSON.parse(response)
                    if (res == null) {
                        Swal.fire("Email/Contraseña incorrectos");
                    } else {
                        swal("Acceso concedido","Inicio de Sesión Exitoso: "+email, "success")
                       .then((value) => {
                        window.location.href = 'dashboard.php?user='+res["nombre"]+' '+res["apellido"];
                     });
                    }
                }
            });
        }
    </script>

</body>

</html>