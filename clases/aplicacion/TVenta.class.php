<?php
class TVenta extends TSalida{
	public $cliente;
	
	public function TVenta($id = ''){
		$this->setCliente();
		parent::TSalida($id);
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		parent::setId($id);
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from venta where idOrden = ".$this->getId());
		
		foreach($rs->fields as $key => $val){
			switch($key){
				case 'idCliente': $this->setCliente($val); break;
				default: $this->$key = $val;
			}
		}

	}
	
	public function setCliente($id = ''){
		$this->cliente = new TCliente($id);
	}
}
?>