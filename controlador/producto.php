<?php 
require_once "../modelos/Producto.php";

$producto=new Producto();

$idProducto=isset($_POST["idProducto"])? limpiarCadena($_POST["idProducto"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$idRubro=isset($_POST["idRubro"])? limpiarCadena($_POST["idRubro"]):"";
$idProveedor=isset($_POST["idProveedor"])? limpiarCadena($_POST["idProveedor"]):"";
$stockMinimo=isset($_POST["stockMinimo"])? limpiarCadena($_POST["stockMinimo"]):"";
$precioCoste=isset($_POST["precioCoste"])? limpiarCadena($_POST["precioCoste"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idProducto)){
			$rspta=$producto->insertar($nombre,$idRubro,$idProveedor,$stockMinimo,$precioCoste);
			echo $rspta ? "Rubro registrada" : "Rubro no se pudo registrar";
		}
		else {
			$rspta=$producto->editar($idProducto,$nombre,$idRubro,$idProveedor,$stockMinimo,$precioCoste);
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
 				"0"=>($reg->condicion)?'<button class="btn btn-primary" title="Editar Produto" onclick="mostrar('.$reg->idProducto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" title="Desactivar Producto" onclick="desactivar('.$reg->idProducto.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-primary" title="Editar Producto" onclick="mostrar('.$reg->idProducto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-success" title="Activar Producto" onclick="activar('.$reg->idProducto.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
				"2"=>$reg->rubro,
                "3"=>$reg->proveedor,
				"4"=>$reg->stockMinimo,
                "5"=>$reg->precioCoste,
 				"6"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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