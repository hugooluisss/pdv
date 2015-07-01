<?php
global $objModulo;

switch($objModulo->getId()){
	case 'admonUsuarios':
	case 'listaUsuarios':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idUsuario from usuario");
		$datos = array();
		while(!$rs->EOF){
			$obj = new TUsuario($rs->fields['idUsuario']);
			$el = array();
			$el['nick'] = $obj->getNick();
			$el['nombre'] = $obj->getNombre();
			$el['idUsuario'] = $obj->getId();
			$el['ultimoacceso'] = $obj->getUltimoAcceso();
			$el['alta'] = $obj->getAlta();
			
			array_push($datos, $el);
			
			$rs->moveNext();
		}
		
		$smarty->assign("usuarios", $datos);
	break;
}
?>