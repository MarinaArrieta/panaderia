<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Producto
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$iva,$precioVenta,$precioCompra,$idProveedor,$stock,$stockMinimo,$idRubro)
	{
		$sql="INSERT INTO producto (nombre,iva,precioVenta,precioCompra,idProveedor,stock,stockMinimo,idRubro,condicion)
		VALUES ('$nombre','$iva','$precioVenta','$precioCompra','$idProveedor','$stock','$stockMinimo','$idRubro','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idProducto,$nombre,$iva,$precioVenta,$precioCompra,$idProveedor,$stock,$stockMinimo,$idRubro)
	{
		$sql="UPDATE producto SET nombre='$nombre',iva='$iva',precioVenta='$precioVenta',precioCompra='$precioCompra',idProveedor='$idProveedor',stock='$stock',stockMinimo='$stockMinimo',idRubro='$idRubro' WHERE idProducto='$idProducto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idProducto)
	{
		$sql="UPDATE producto SET condicion='0' WHERE idProducto='$idProducto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idProducto)
	{
		$sql="UPDATE producto SET condicion='1' WHERE idProducto='$idProducto'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idProducto)
	{
		$sql="SELECT * FROM producto WHERE idProducto='$idProducto'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM producto";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM producto where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>