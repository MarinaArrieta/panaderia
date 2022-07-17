<?php 
require_once "../modelos/Rubro.php";

$rubro=new Rubro();

$idRubro=isset($_POST["idRubro"])? limpiarCadena($_POST["idRubro"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idRubro)){
			$rspta=$rubro->insertar($nombre,$descripcion);
			echo $rspta ? "Rubro registrada" : "Rubro no se pudo registrar";
		}
		else {
			$rspta=$rubro->editar($idRubro,$nombre,$descripcion);
			echo $rspta ? "Rubro actualizado" : "Rubro no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$rubro->desactivar($idRubro);
 		echo $rspta ? "Rubro Desactivado" : "Rubro no se puede desactivar";
 		
	break;

	case 'activar':
		$rspta=$rubro->activar($idRubro);
 		echo $rspta ? "Rubro activado" : "Rubro no se puede activar";
 		
	break;

	case 'mostrar':
		$rspta=$rubro->mostrar($idRubro);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		
	break;

	case 'listar':
		$rspta=$rubro->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-primary" title="Editar Rubro" onclick="mostrar('.$reg->idRubro.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" title="Desactivar Rubro" onclick="desactivar('.$reg->idRubro.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-primary" title="Editar Rubro" onclick="mostrar('.$reg->idRubro.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-success" title="Activar Rubro" onclick="activar('.$reg->idRubro.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->descripcion,
 				"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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