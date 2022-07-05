<?php 
require_once "../modelos/Producto.php";

$producto=new Producto();

$idProducto=isset($_POST["idProducto"])? limpiarCadena($_POST["idProducto"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$iva=isset($_POST["iva"])? limpiarCadena($_POST["iva"]):"";
$precioVenta=isset($_POST["precioVenta"])? limpiarCadena($_POST["precioVenta"]):"";
$precioCompra=isset($_POST["precioCompra"])? limpiarCadena($_POST["precioCompra"]):"";
$idProveedor=isset($_POST["idProveedor"])? limpiarCadena($_POST["idProveedor"]):"";
$stock=isset($_POST["stock"])? limpiarCadena($_POST["stock"]):"";
$stockMinimo=isset($_POST["stockMinimo"])? limpiarCadena($_POST["stockMinimo"]):"";
$idRubro=isset($_POST["idRubro"])? limpiarCadena($_POST["idRubro"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idProducto)){
			$rspta=$producto->insertar($nombre,$iva,$precioVenta,$precioCompra,$idProveedor,$stock,$stockMinimo,$idRubro);
			echo $rspta ? "Rubro registrada" : "Rubro no se pudo registrar";
		}
		else {
			$rspta=$producto->editar($idProducto,$nombre,$iva,$precioVenta,$precioCompra,$idProveedor,$stock,$stockMinimo,$idRubro);
			echo $rspta ? "Rubro actualizado" : "Rubro no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$producto->desactivar($idProducto);
 		echo $rspta ? "Rubro Desactivado" : "Rubro no se puede desactivar";
 		
	break;

	case 'activar':
		$rspta=$producto->activar($idProducto);
 		echo $rspta ? "Rubro activado" : "Rubro no se puede activar";
 		
	break;

	case 'mostrar':
		$rspta=$producto->mostrar($idProducto);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		
	break;

	case 'listar':
		$rspta=$producto->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idProducto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idProducto.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idProducto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idProducto.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->iva,
                "3"=>$reg->precioVenta,
                "4"=>$reg->precioCompra,
                "5"=>$reg->idProveedor,
                "6"=>$reg->stock,
                "7"=>$reg->stockMinimo,
                "8"=>$reg->idRubro,
 				"9"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>