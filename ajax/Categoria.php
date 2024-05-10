<?php

require_once "../modelos/Categoria.php";

$categoria =  new Categoria();

$Codigo_Categoria=isset($_POST["Codigo_Categoria"]) ? $_POST["Codigo_Categoria"] : "";
$Nombre_Categoria=isset($_POST["Nombre_Categoria"]) ? $_POST["Nombre_Categoria"] : "";

switch ($_GET["op"]) {
    case 'guardar':
        $rspta = $categoria->insertar($Nombre_Categoria,$Codigo_Categoria);
        if (intval($rspta) == 1) {
            echo "Categoria Agregado";
        }
        if (intval($rspta) == 1062) {
            echo "Categoria ya existe";
        }
        break;

    case 'editar':
        $rspta = $categoria->editar($Nombre_Categoria,$Codigo_Categoria);
        if (intval($rspta) >0) {
            echo "Categoria Modificado";
        }else{
            echo "Categoria No se pudo Modifcar";
        }
        break;

    case 'eliminar':
        $rspta = $categoria->eliminar($Codigo_Categoria);
        echo $rspta ? "Categoria eliminado" : " Categoria no se pudo eliminar";

        break;

    case 'mostrar':
        $rspta = $categoria->mostrar($Codigo_Categoria);
        
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $categoria->listar();
        //Vamos a declarar un array
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->id,
                "1" => $reg->Codigo_Categoria,
                "2" => $reg->Nombre_Categoria,
                "3" => '<button class="btn btn-primary" onclick="selectCategoria(\'' . $reg->Codigo_Categoria . '\')"><i class="bx bx-search"></i>&nbsp;Seleccionar</button>'
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