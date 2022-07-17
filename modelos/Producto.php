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
	public function insertar($nombre,$idRubro,$idProveedor,$stockMinimo,$precioCoste)
	{
		$sql="INSERT INTO producto (nombre,idRubro,idProveedor,stockMinimo,precioCoste,condicion)
		VALUES ('$nombre','$idRubro','$idProveedor','$stockMinimo','$precioCoste','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idProducto,$nombre,$idRubro,$idProveedor,$stockMinimo,$precioCoste)
	{
		$sql="UPDATE producto SET nombre='$nombre',idRubro='$idRubro',idProveedor='$idProveedor',stockMinimo='$stockMinimo',precioCoste='$precioCoste' WHERE idProducto='$idProducto'";
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
		// $sql="SELECT * FROM producto";
		$sql="select p.idProducto,p.nombre,r.nombre as rubro,pr.nombreCompleto as proveedor,p.stockMinimo,p.precioCoste,p.condicion from producto p inner join rubro r on p.idRubro = r.idRubro inner join proveedor pr on p.idProveedor = pr.idProveedor order by p.nombre ASC;";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="select p.idProducto,p.nombre,r.nombre as rubro,pr.nombreCompleto as proveedor,p.stockMinimo,p.precioCoste,p.condicion from producto p inner join rubro r on p.idRubro = r.idRubro inner join proveedor pr on p.idProveedor = pr.idProveedor where codicion =1 order by p.nombre ASC;";
		return ejecutarConsulta($sql);
	}
}

?>