<?php
global $objModulo;

switch($objModulo->getId()){
	case 'corden':
		switch($objModulo->getAction()){
			case 'addMov':
				$obj = new TOrden($_POST['id']);
				
				if($obj->addMovimiento($_POST['item'], $_POST['cantidad'], $_POST['precio']))
					echo json_encode(array("band" => "true", "id" => $obj->getId()));
				else
					echo json_encode(array("band" => "false"));
			break;
		}
	break;
}
?>