<?php

require_once "../modelos/Producto.php";

$product = new Producto();
$Codigo_Producto =isset($_POST["Codigo_Producto"]) ? $_POST["Codigo_Producto"] : "";
$Nombre_Producto = isset($_POST["Nombre_Producto"]) ? $_POST["Nombre_Producto"] : "";
$Precio_Producto=isset($_POST["Precio_Producto"]) ? $_POST["Precio_Producto"] : "";
$Codigo_Categoria=isset($_POST["Codigo_Categoria"]) ? $_POST["Codigo_Categoria"] : "";
switch ($_GET["op"]) {
    case 'guardar':
        $rspta = $product->insertar($Codigo_Producto,$Nombre_Producto,$Precio_Producto,$Codigo_Categoria);
        if (intval($rspta) == 1) {
            echo "Producto Agregado";
        }
        if (intval($rspta) == 1062) {
            echo "Producto ya existe";
        }
        break;

    case 'editar':
        $rspta = $product->editar($Codigo_Producto,$Nombre_Producto,$Precio_Producto,$Codigo_Categoria);
        if (intval($rspta) >0) {
            echo "Producto Modificado";
        }else{
            echo "Producto No se pudo modifcar";
        }
        break;

    case 'eliminar':
        $rspta = $product->eliminar($Codigo_Producto);
        echo $rspta ? "Producto eliminado" : "Producto no se pudo eliminar";

        break;

    case 'mostrar':
        $rspta = $product->mostrar($Codigo_Producto);
        
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $product->listar();
        //Vamos a declarar un array
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->Codigo_Producto,
                "1" => $reg->Nombre_Producto,
                "2" => '₡'.$reg->Precio_Producto,
                "3" => $reg->Codigo_Categoria,
                "4" => $reg->Nombre_Categoria,
                "5" => '<button class="btn btn-primary" onclick="mostrar_producto(\'' . $reg->Codigo_Producto . '\')"><i class="bx bx-search"></i>&nbsp;Seleccionar</button>'
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
