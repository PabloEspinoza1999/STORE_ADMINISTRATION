<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Datos
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
      //Implementamos un método para insertar registros del encabezado
    public function insertarencabezado($Cedula_Cliente, $Nombre_Cliente,$Numero_Factura,$Fecha_Factura)
    {
    try 
        {
        $sql="INSERT INTO encabezado_venta (Cedula_Cliente, Nombre_Cliente,Numero_Factura,Fecha_Factura)
        VALUES ('$Cedula_Cliente','$Nombre_Cliente',' $Numero_Factura', '$Fecha_Factura')";
        return ejecutarConsulta($sql);
        } 
    catch (Exception $e)
         {
        return $e->getCode(); // Devuelve el código de error de la excepción
        }
    }

    //Implementamos un método para insertar registros del datatable
	public function insertardetalle($Codigo_Producto,$Nombre_Producto,$Precio_Producto,$Cantidad_Producto,$Total_Producto,$id_encabezado)
    {
    try 
        {
        $sql="INSERT INTO detalle_venta (Codigo_Producto,Nombre_Producto,Precio_Producto,Cantidad_Producto,Total_Producto,id_encabezado)
        VALUES ('$Codigo_Producto','$Nombre_Producto','$Precio_Producto', '$Cantidad_Producto','$Total_Producto','$id_encabezado')";
        return ejecutarConsulta($sql);
        } 
    catch (Exception $e)
         {
        return $e->getCode(); // Devuelve el código de error de la excepción
        }
    }

   //Implementar un método para mostrar los datos de un registro a modificar
	public function Obtenerid()
	{
		$sql="SELECT max(id_encabezado) as id_encabezado FROM encabezado_venta";
		return ejecutarConsultaSimpleFila($sql);
	}

}   
?>