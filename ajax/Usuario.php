<?php 

require_once "../modelos/User.php";

$user=new  User();
$id = isset($_POST["id"])? $_POST["id"]:"";

$Nombre_Usuario = isset($_POST["Nombre_Usuario"])? $_POST["Nombre_Usuario"]:"";

$Apellido_Usuario = isset($_POST["Apellido_Usuario"])? $_POST["Apellido_Usuario"]:"";

$Email_Usuario = isset($_POST["Email_Usuario"])? $_POST["Email_Usuario"]:"";

$Password_Usuario = isset($_POST["Password_Usuario"])? $_POST["Password_Usuario"]:"";

$Rol_Usuario = isset($_POST["Rol_Usuario"])? $_POST["Rol_Usuario"]:"";


switch ($_GET["op"]){
	case 'guardar':
		
			$rspta=$user->insertar($Nombre_Usuario,$Apellido_Usuario,$Email_Usuario,$Password_Usuario,$Rol_Usuario);
			if (intval($rspta)==1){
				echo "Usuario Agregado";
			}
			if (intval($rspta)==1062){
				echo "Usuario de cliente Repetido";
			}
			break;

		case 'editar':
			$rspta=$user->editar($Nombre_Usuario,$Apellido_Usuario,$Email_Usuario,$Password_Usuario,$Rol_Usuario,$id);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		
			break;

			case 'eliminar':
				$rspta=$user->eliminar($id);
				echo $rspta ? "Usuario eliminado" : "Usuario no se pudo eliminar";
			
				break;

	case 'mostrar':
		$rspta=$user->mostrar($id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	
	case 'listar':
		$rspta=$user->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
			$data[] = array(
                "0" => $reg->id,
                "1" => $reg->nombre,
                "2" => $reg->apellido,
                "3" => $reg->email,
                "4" => $reg->password,
                "5" => $reg->rol,
                "6" => '<button class="btn btn-primary" onclick="mostrar(\'' . $reg->id. '\')"><i class="bx bx-search"></i>&nbsp;Seleccionar</button>'
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
