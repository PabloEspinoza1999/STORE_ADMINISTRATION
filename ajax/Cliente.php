<?php 

require_once "../modelos/cliente.php";

$cliente=new  cliente();

$Cedula_Cliente=isset($_POST["Cedula_Cliente"])? $_POST["Cedula_Cliente"]:"";
$Nombre_Cliente=isset($_POST["Nombre_Cliente"])? $_POST["Nombre_Cliente"]:"";

switch ($_GET["op"]){
	case 'guardar':
		
			$rspta=$cliente->insertar($Cedula_Cliente,$Nombre_Cliente);
			if (intval($rspta)==1){
				echo "Cliente Agregado";
			}
			if (intval($rspta)==1062){
				echo "Codigo de cliente Repetido";
			}
			break;

		case 'editar':
			$rspta=$cliente->editar($Cedula_Cliente,$Nombre_Cliente);
			echo $rspta ? "Cliente actualizado" : "Cliente no se pudo actualizar";
		
			break;

			case 'eliminar':
				$rspta=$cliente->eliminar($Cedula_Cliente);
				echo $rspta ? "Cliente eliminado" : "Cliente no se pudo eliminar";
			
				break;

	case 'mostrar':
		$rspta=$cliente->mostrar($Cedula_Cliente);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	
	case 'listar':
		$rspta=$cliente->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
			$data[] = array(
                "0" => $reg->id_Cliente,
                "1" => $reg->Cedula_Cliente,
                "2" => $reg->Nombre_Cliente,
                "3" => '<button class="btn btn-primary" onclick="mostrar_cliente(\'' . $reg->Cedula_Cliente. '\')"><i class="bx bx-search"></i>&nbsp;Seleccionar</button>'
            );
 				
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
