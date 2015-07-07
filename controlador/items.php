<?php
global $objModulo;

switch($objModulo->getId()){
	case 'citems':
		switch($objModulo->getAction()){
			case 'buscarCodigo':
				$db = TBase::conectaDB();
				$datos = array();
				$rs = $db->Execute("select idItem, idTipoItem from item where codigo = '".$_POST['codigo']."'");
				
				if ($rs->EOF)
					$datos["band"] = false;
				else{
					$datos["band"] = true;
					$datos["tipo"] = $rs->fields['idTipoItem'] == $_POST['tipo'];
					
					switch($datos["tipo"]){
						case 1:
							$obj = new TProducto($rs->fields['idItem']);
							
							$datos['datos']['nombre'] = $obj->getNombre();
							$datos['datos']['descripcion'] = $obj->getDescripcion();
							$datos['datos']['precio'] = $obj->getPrecio();
							$datos['datos']['impInc'] = $obj->isImpInc();
							$datos['datos']['impuesto'] = $obj->getImpuesto();
							$datos['datos']['idTipoCosteo'] = $obj->getIdTipoCosteo();
							$datos['datos']['costo'] = $obj->getCosto();
							$datos['datos']['id'] = $obj->getId();
						break;
					}
				}
				
				echo json_encode($datos);
			break;
		}
	break;
}
?>