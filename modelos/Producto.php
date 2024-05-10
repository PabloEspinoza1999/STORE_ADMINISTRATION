<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Producto
{
    //Implementamos nuestro constructor
    public function __construct()
    {
    }

    //Implementamos un método para insertar registros
    public function insertar($Codigo_Producto,$Nombre_Producto,$Precio_Producto,$Codigo_Categoria)
    {
        try {
            $sql_check = "SELECT  Nombre_Producto FROM producto where  Codigo_Producto = '$Codigo_Producto'";
            $res_check = ejecutarConsulta($sql_check);

            if ($res_check->num_rows > 0) {
                return 1062;
            } else {
                $sql = "INSERT INTO producto(Codigo_Producto,Nombre_Producto,Precio_Producto,Codigo_Categoria)
                        VALUES ('$Codigo_Producto','$Nombre_Producto','$Precio_Producto', '$Codigo_Categoria')";
                return ejecutarConsulta($sql);
            }
        } catch (Exception $e) {
            return $e->getCode(); // Devuelve el código de error de la excepción
        }
    }

    //Implementamos un método para editar registros
    public function editar($Codigo_Producto,$Nombre_Producto,$Precio_Producto,$Codigo_Categoria)
    {
        try {
            
            $sql = "UPDATE producto SET  Codigo_Producto= '$Codigo_Producto',
            Nombre_Producto ='$Nombre_Producto',Precio_Producto='$Precio_Producto',
            Codigo_Categoria = '$Codigo_Categoria' WHERE Codigo_Producto= '$Codigo_Producto'";
            return ejecutarConsulta($sql);
           
        }catch (Exception $e) {
            return $e->getCode(); // Devuelve el código de error de la excepción
        }
        
    }

    //Implementamos un método para eliminar registros
    public function eliminar($Codigo_Producto)
    {
        $sql = "DELETE FROM producto WHERE Codigo_Producto='$Codigo_Producto'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($Codigo_Producto)
    {
        
        $sql = "SELECT p.`id`,p.`Codigo_Producto`,p.`Nombre_Producto`,p.`Precio_Producto`,
        c.`Codigo_Categoria`,c.`Nombre_Categoria` FROM producto AS p INNER JOIN categoria AS c ON  p.`Codigo_Categoria`=c.`Codigo_Categoria`   WHERE Codigo_Producto ='$Codigo_Producto';";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql = "SELECT p.`id`,p.`Codigo_Producto`,p.`Nombre_Producto`,p.`Precio_Producto`,
        c.`Codigo_Categoria`,c.`Nombre_Categoria` FROM producto AS p INNER JOIN categoria AS c ON  p.`Codigo_Categoria`=c.`Codigo_Categoria`;";
        return ejecutarConsulta($sql);
    }

}
