<?php
global $objModulo;

switch($objModulo->getId()){
	case 'venta':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from empresa where tag = 'cte'");
		$smarty->assign("cliente", new TCliente($rs->fields['valor']));
		
		$smarty->assign("orden", new TVenta($_GET['id']));
		
	break;
}
?>