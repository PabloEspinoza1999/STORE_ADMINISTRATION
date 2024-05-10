<?php

require_once "../modelos/Venta.php";

$venta = new Venta();

$id= isset($_POST["id"]) ? $_POST["id"] : "";
$detalle_id = isset($_POST["detalleId"]) ? $_POST["detalleId"] : "";
$cod_libro = isset($_POST["cod_libro"]) ? $_POST["cod_libro"] : "";

$Cedula_Cliente  = isset($_POST["Cedula_Cliente"]) ? $_POST["Cedula_Cliente"] : "";
$Nombre_Cliente =   isset($_POST["Nombre_Cliente"]) ? $_POST["Nombre_Cliente"] : "";
$Fecha_Factura =  isset($_POST["Fecha_Factura"]) ? $_POST["Fecha_Factura"] : "";
$Codigo_Producto =  isset($_POST["Codigo_Producto"]) ? $_POST["Codigo_Producto"] : "";
$Nombre_Producto = isset($_POST["Nombre_Producto"]) ? $_POST["Nombre_Producto"] : "";
$Precio_Producto =  isset($_POST["Precio_Producto"]) ? $_POST["Precio_Producto"] : "";
$Cantidad_Producto =  isset($_POST["Cantidad_Producto"]) ? $_POST["Cantidad_Producto"] : "";
$Total_Producto =  isset($_POST["Total_Producto"]) ? $_POST["Total_Producto"] : "";

switch ($_GET["op"]) {
    case 'guardar':
        $rspta = $venta->insertar($Cedula_Cliente, $Nombre_Cliente, $Fecha_Factura, 
        $Codigo_Producto, $Nombre_Producto, $Precio_Producto,$Cantidad_Producto,$Total_Producto);
        if (intval($rspta) == 1) {
            echo "Prestamo Agregado";
        }
        if (intval($rspta) == 1062) {
            echo "Prestamo ya existe";
        }
        break;

    case 'editar':
        $rspta = $prestamo->editar($id, $detalle_id, $cod_libro, $titulo, $cedula, $nombreEstudiante, $fechaLibro, $fechaEstudiante);

        if (intval($rspta) == 1062) {
            echo "Prestamo ya existe";
        } else {
            echo "Prestamo editado";
        }

        break;

    case 'eliminar':
        $rspta = $prestamo->eliminar($id);
        echo $rspta ? "Prestamo eliminado" : "Prestamo no se pudo eliminar";

        break;

    case 'mostrar':
        $rspta = $prestamo->mostrar($id);

        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $prestamo->listar();
        //Vamos a declarar un array
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->idprestamo,
                "1" => $reg->cedula,
                "2" => $reg->nombre,
                "3" => $reg->titulo,
                "4" => $reg->fecha,
                "5" => '<button class="btn btn-primary" onclick="mostrar(\'' . $reg->idprestamo . '\')"><i class="bx bx-search"></i>&nbsp;Seleccionar</button>'
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);

        break;
}
