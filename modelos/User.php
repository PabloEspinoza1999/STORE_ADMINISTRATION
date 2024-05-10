<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class User
{
    //Implementamos nuestro constructor
    public function __construct()
    {
    }

    // Autenticate the user
    public function authenticate($email, $password)
    {
        $sql = "SELECT id, email, nombre, apellido FROM user WHERE email='$email' AND password = '$password'";
        return ejecutarConsultaSimpleFila($sql);
    }



	public function insertar($Nombre_Usuario,$Apellido_Usuario,$Email_Usuario,$Password_Usuario,$Rol_Usuario)
{
    try {
        $sql="INSERT INTO user (nombre,apellido,email,password,rol)
        VALUES ('$Nombre_Usuario','$Apellido_Usuario','$Email_Usuario','$Password_Usuario','$Rol_Usuario')";
        return ejecutarConsulta($sql);
    } catch (Exception $e) {
        return $e->getCode(); // Devuelve el código de error de la excepción
    }
}

	//Implementamos un método para editar registros
	public function editar($Nombre_Usuario,$Apellido_Usuario,$Email_Usuario,$Password_Usuario,$Rol_Usuario,$id)
	{
		$sql="UPDATE user SET nombre='$Nombre_Usuario', apellido='$Apellido_Usuario', email='$Email_Usuario',
        password='$Password_Usuario', rol='$Rol_Usuario' WHERE  id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($id)
	{	$sql="DELETE FROM user WHERE  id='$id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{
		$sql="SELECT * FROM user WHERE id='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM user";
		return ejecutarConsulta($sql);		
	}


}
