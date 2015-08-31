<?php
global $objModulo;

switch($objModulo->getId()){
	case 'clientes':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idCliente from cliente where estado = 'A'");
		$datos = array();
		while(!$rs->EOF){
			$obj = new TCliente($rs->fields['idCliente']);
			$el = array();
			$el['nombre'] = $obj->getNombre();
			$el['telefono'] = $obj->getTelefono();
			$el['email'] = $obj->getEmail();
			$el['idCliente'] = $obj->getId();
			$el['encriptado']['id'] = dechex($obj->getId());
			
			array_push($datos, $el);
			
			$rs->moveNext();
		}

		$smarty->assign("clientes", $datos);
	break;
	case 'clienteAdd':
		$obj = new TCliente(hexdec($_GET['id']));
		$smarty->assign("cliente", $obj);
	break;
	case 'cclientes':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TCliente(hexdec($_POST['id']));
				
				$obj->setNombre($_POST['nombre']);
				$obj->setSexo($_POST['sexo']);
				$obj->setTelefono($_POST['telefono']);
				$obj->setEmail($_POST['email']);
				$obj->setDireccion($_POST['direccion']);
				$obj->setComentarios($_POST['comentarios']);
				
				if ($obj->guardar())
					echo json_encode(array("band" => "true", "id" => $obj->getId()));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'del':
				$obj = new TCliente(hexdec($_POST['id']));
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'autocomplete':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idCliente from cliente where nombre like '%".$_GET['term']."%'");
				
				$obj = new TCliente;
				$datos = array();
				while(!$rs->EOF){
					$el = array();
					
					$obj->setId($rs->fields['idCliente']);
					$el['id'] = $obj->getId();
					$el['label'] = $obj->getNombre();
					$el['identificador'] = $obj->getId();
					
					array_push($datos, $el);
					$rs->moveNext();
				}
				
				echo json_encode($datos);
			break;
		}
	break;
}
?>