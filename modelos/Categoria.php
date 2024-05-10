<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Categoria
{
    //Implementamos nuestro constructor
    public function __construct()
    {
    }

   
    //Implementamos un método para insertar registros
    public function insertar($Nombre_Categoria,$Codigo_Categoria)
    {
        try {
            $sql_check = "SELECT  Nombre_Categoria FROM categoria where  Codigo_Categoria = '$Codigo_Categoria'";
            $res_check = ejecutarConsulta($sql_check);

            if ($res_check->num_rows > 0) {
                return 1062;
            } else {
                $sql = "INSERT INTO categoria(Nombre_Categoria,Codigo_Categoria)
                        VALUES ('$Nombre_Categoria','$Codigo_Categoria')";
                return ejecutarConsulta($sql);
            }
        } catch (Exception $e) {
            return $e->getCode(); // Devuelve el código de error de la excepción
        }
    }

    //Implementamos un método para editar registros
    public function editar($Nombre_Categoria,$Codigo_Categoria)
    {
        try {
            
            $sql = "UPDATE categoria SET Nombre_Categoria ='$Nombre_Categoria'  WHERE 
            Codigo_Categoria= '$Codigo_Categoria'";
            return ejecutarConsulta($sql);
           
        }catch (Exception $e) {
            return $e->getCode(); // Devuelve el código de error de la excepción
        }
        
    }

    //Implementamos un método para eliminar registros
    public function eliminar($Codigo_Categoria)
    {
        $sql = "DELETE FROM categoria  WHERE 
        Codigo_Categoria= '$Codigo_Categoria'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($Codigo_Categoria)
    {
        
        $sql = "SELECT * FROM categoria WHERE Codigo_Categoria= '$Codigo_Categoria'  ";
         return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql = "SELECT * FROM categoria ";
        return ejecutarConsulta($sql);
    }

}
