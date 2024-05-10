<?php 
//Importamos la clase Datos.php
require_once "../modelos/Datos.php";
// Instaciamos la clase Datos
$datos=new Datos();

// Recibir el encabezado enviado por AJAX
$encabezado=$_POST['encabezado'];
$Cedula_Cliente = $encabezado['Cedula_Cliente'];
$Nombre_Cliente = $encabezado['Nombre_Cliente'];
$Numero_Factura  = $encabezado['Numero_Factura'];
$Fecha_Factura  = $encabezado['Fecha_Factura'];
$fechaformato = date('Y-m-d', strtotime($Fecha_Factura));

$datos->insertarencabezado($Cedula_Cliente, $Nombre_Cliente,$Numero_Factura
,$fechaformato,);
$id_encabezado=$datos->Obtenerid();


// Recibir el detalle enviado por AJAX
$detalle = json_decode($_POST['detalle'], true);
foreach ($detalle as $dato) {
    $Codigo_Producto = $dato[0];
    $Nombre_Producto = $dato[1];
	$Precio_Producto = $dato[2];
    $Cantidad_Producto = $dato[3];
	$Total_Producto = $dato[4];
    $rspta=$datos->insertardetalle($Codigo_Producto,$Nombre_Producto,$Precio_Producto,$Cantidad_Producto,$Total_Producto,$id_encabezado['id_encabezado']);
			if (intval($rspta)==1){
				echo "Datos Insertados";
			}
			else
            {
				echo "Error al Insertar los datos";
			}
}
?>