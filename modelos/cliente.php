<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class cliente
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($Cedula_Cliente,$Nombre_Cliente)
{
    try {
		$sql_check = "SELECT  Cedula_Cliente FROM cliente where  Cedula_Cliente = '$Cedula_Cliente'";
		$res_check = ejecutarConsulta($sql_check);

		if ($res_check->num_rows > 0) {
			return 1062;
		}else {
			$sql="INSERT INTO cliente (Cedula_Cliente,Nombre_Cliente)
			VALUES ('$Cedula_Cliente','$Nombre_Cliente')";
			return ejecutarConsulta($sql);
		}	
        
    } catch (Exception $e) {
        return $e->getCode(); // Devuelve el código de error de la excepción
    }
}

	//Implementamos un método para editar registros
	public function editar($Cedula_Cliente,$Nombre_Cliente)
	{
		$sql="UPDATE cliente SET Cedula_Cliente='$Cedula_Cliente', Nombre_Cliente='$Nombre_Cliente' WHERE Cedula_Cliente='$Cedula_Cliente'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($Cedula_Cliente)
	{	$sql="DELETE FROM cliente WHERE Cedula_Cliente='$Cedula_Cliente'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($Cedula_Cliente)
	{
		$sql="SELECT * FROM cliente WHERE Cedula_Cliente='$Cedula_Cliente'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM cliente";
		return ejecutarConsulta($sql);		
	}
}

?>