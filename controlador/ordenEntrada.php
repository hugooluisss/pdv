<?php
global $objModulo;

switch($objModulo->getId()){
	case 'entradaAdd':
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
	case 'cordenentrada':
		switch($objModulo->getAction()){
			case 'crear':
				$orden = new TEntrada;
				$orden->setProveedor($_POST['proveedor']);
				$orden->setClave($_POST['clave']);
				
				if($orden->guardar())
					echo json_encode(array("band" => "true", "id" => $orden->getId()));
				else
					echo json_encode(array("band" => "false"));
			break;
		}
	break;
}
?>