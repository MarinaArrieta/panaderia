<?php
require_once "../modelos/Proveedor.php";

$proveedor = new Proveedor();

$idProveedor = isset($_POST["idProveedor"])? limpiarCadena($_POST["idProveedor"]):"";
$nombreCompleto = isset($_POST["nombreCompleto"])? limpiarCadena($_POST["nombreCompleto"]):"";
$dni = isset($_POST["dni"])? limpiarCadena($_POST["dni"]):"";
$cuit = isset($_POST["cuit"])? limpiarCadena($_POST["cuit"]):"";
$razonSocial = isset($_POST["razonSocial"])? limpiarCadena($_POST["razonSocial"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':
        if(empty($idProveedor)){
            $rspta = $proveedor->insertar($nombreCompleto,$dni,$telefono,$cuit,$razonSocial);
            echo $rspta ? "Proveedor Registrado" : "Proveedor no se pudo registrar";
        }
        else {
            $rspta = $proveedor->editar($idProveedor,$nombreCompleto,$dni,$telefono,$cuit,$razonSocial);
            echo $rspta ? "Proveedor Actualizado" : "Proveedor no se pudo actualizar";
        }
    break;
    case 'desactivar':
        $rspta = $proveedor->desactivar($idProveedor);
        echo $rspta ? "Proveedor Desactivado" : "Proveedor no se pudo activar";
    break;
    case 'activar':
        $rspta = $proveedor->activar($idProveedor);
        echo $rspta ? "Proveedor Activado" : "Proveedor no se pudo Desactivar";
    break;
    case 'mostrar':
        $rspta = $proveedor->mostrar($idProveedor);
        echo json_encode($rspta);
    break;

    case 'listar':
        $rspta = $proveedor->listar();
        $data = Array();

        while($reg=$rspta->fetch_object()){
            $data[] = array(
                "0"=>($reg->condicion)?'<button class="btn btn-warning onclick="mostrar('.$reg->idProveedor.'"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idProveedor.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idProveedor.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idProveedor.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->nombreCompleto,
                "2"=>$reg->dni,
                "3"=>$reg->telefono,
                "4"=>$reg->cuit,
                "5"=>$reg->razonSocial,
                "6"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'

            );
        }
        $rsptaults = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($rsptaults);
    break;
}

?>