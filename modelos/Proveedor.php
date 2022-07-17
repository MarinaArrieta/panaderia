<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Proveedor
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombreCompleto,$dni,$telefono,$cuit,$razonSocial)
	{
		$sql="INSERT INTO proveedor (nombreCompleto,dni,telefono,cuit,razonSocial,condicion)
		VALUES ('$nombreCompleto','$dni','$telefono','$cuit','$razonSocial','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idProveedor,$nombreCompleto,$dni,$telefono,$cuit,$razonSocial)
	{
		$sql="UPDATE proveedor SET nombreCompleto='$nombreCompleto',dni='$dni',telefono='$telefono',cuit='$cuit',razonSocial='$razonSocial' WHERE idProveedor='$idProveedor'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idProveedor)
	{
		$sql="UPDATE proveedor SET condicion='0' WHERE idProveedor='$idProveedor'";
		return ejecutarConsulta($sql);
	}

	// //Implementamos un método para activar categorías
	public function activar($idProveedor)
	{
		$sql="UPDATE proveedor SET condicion='1' WHERE idProveedor='$idProveedor'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idProveedor)
	{
		$sql="SELECT * FROM proveedor WHERE idProveedor='$idProveedor'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM proveedor";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM proveedor where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>