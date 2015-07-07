<?php
global $objModulo;

switch($objModulo->getId()){
	case 'productos':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idItem from item where idTipoItem = 1");
		$datos = array();
		while(!$rs->EOF){
			$obj = new TProducto($rs->fields['idItem']);
			$el = array();
			$el['codigo'] = $obj->getCodigo();
			$el['nombre'] = $obj->getNombre();
			$el['precio'] = $obj->getPrecio();
			$el['encriptado']['id'] = dechex($obj->getId());
			
			array_push($datos, $el);
			
			$rs->moveNext();
		}
		$smarty->assign("productos", $datos);
	break;
	case 'productoAdd':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from tipoCosteo");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("tipoCosteo", $datos);
		
		$rs = $db->Execute("select * from departamento");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("departamentos", $datos);
		
		$obj = new TProducto(hexdec($_GET['id']));
		$smarty->assign("producto", $obj);
	break;
	case 'cproductos':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TProducto($_POST['id']);
				
				$obj->setCodigo($_POST['codigo']);
				$obj->setNombre($_POST['nombre']);
				$obj->setDescripcion($_POST['descripcion']);
				
				$obj->setCosto($_POST['costo']);
				$obj->setTipoCosteo($_POST['metodoCosteo']);
				$obj->setDepartamento($_POST['departamento']);
				$obj->setPrecio($_POST['precioUnitario']);
				$obj->setImpInc($_POST['impuestoIncluido']);
				$obj->setImpuesto($_POST['impuesto']);
				$obj->setMarca($_POST['marca']);
				
				if ($obj->guardar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'del':
				$obj = new TDepartamento(hexdec($_POST['id']));
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
		}
	break;
}
?>