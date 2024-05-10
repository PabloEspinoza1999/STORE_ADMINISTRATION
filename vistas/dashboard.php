<?php
$title ='Dashbord';
$welcome = isset($_GET["user"]) ? 'Bienvenido  de Nuevo '.$_GET["user"].
'<img src="https://dplnews.com/wp-content/uploads/2020/05/Dplnews_walmart_as210520.gif"  width="200px" alt="">'
 : "Gestión Compras".' <img src="https://i5.walmartimages.com/dfw/4ff9c6c9-37f7/k2-_ec8f9175-e507-46a2-8cdd-cbb03128a52d.v1.svg"  width="300px" alt="">';
ob_start();
?>

<h1 class="display-4" id="titulo " style="color:#0e76a8 ; font-weight: 600; font-size: 40px;"><img src="https://media4.giphy.com/avatars/Walmart/UkUdnUHTol7X.png" alt="" width="70px" srcset="">
<?= $welcome ?>
</h1>

<div class="row mb-2">
    <div class="col-xl-4 col-sm-6 py-2">
        <div class="card card1 card-hover h-100 w-100">
            <div class="numero">
                <h5>60</h5>
            </div>
            <div class="titulo">
                <p>Proyectos</p>
            </div>
            <i class='bx bx-notepad'></i>
        </div>
    </div>

    <div class="col-xl-4 col-sm-6 py-2">
        <div class="card card2 card-hover h-100 w-100">
            <div class="numero">
                <h5>36</h5>
            </div>
            <div class="titulo">
                <p>Pedidos</p>
            </div>
            <i class='bx bx-cart'></i>
        </div>
    </div>

    <div class="col-xl-4 col-sm-6 py-2">
        <div class="card card-hover h-100">
            <div class="card3 w-100">
                <div class="numero">
                    <h5>$7k</h5>
                </div>
                <div class="titulo">
                    <p>Saldo</p>
                </div>
                <i class='bx bx-dollar'></i>
            </div>
        </div>
    </div>
</div>


<div class="row mt-2">
    <div class="col-xl-4 col-sm-6 py-2">
        <div class="card card-hover">
            <div class="semi-circle-visitas mx-auto" style="--percentage:50;--fill:#006eba;">
                <p>VISITAS</p>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-sm-6 py-2">
        <div class="card card-hover">
            <div class="semi-circle-productos mx-auto" style="--percentage:80;--fill:#006eba;">
                <p>PRODUCTOS</p>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-sm-6 py-2">
        <div class="card card-hover">
            <div class="semi-circle-ganancias mx-auto" style="--percentage:35;--fill:#006eba;">
                <p>GANANCIAS</p>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include './includes/layout.php';
?>


