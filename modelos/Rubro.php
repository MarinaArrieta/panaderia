<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Rubro
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$descripcion)
	{
		$sql="INSERT INTO rubro (nombre,descripcion,condicion)
		VALUES ('$nombre','$descripcion','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idRubro,$nombre,$descripcion)
	{
		$sql="UPDATE rubro SET nombre='$nombre',descripcion='$descripcion' WHERE idRubro='$idRubro'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idRubro)
	{
		$sql="UPDATE rubro SET condicion='0' WHERE idRubro='$idRubro'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idRubro)
	{
		$sql="UPDATE rubro SET condicion='1' WHERE idRubro='$idRubro'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idRubro)
	{
		$sql="SELECT * FROM rubro WHERE idRubro='$idRubro'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM rubro";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM rubro where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>