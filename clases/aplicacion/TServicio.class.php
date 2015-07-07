<?php
Class TServicio extends TItem{
	private $precio;
	private $impInc;
	private $imp;
		
	public function TServicio($id = ''){
		if ($id <> '')
			$this->setId($id);
		parent::setIdTipo(2);
	}
	
	public function setId($id = ''){
		if ($id == '')
			return false;
			
		parent::setId($id);
			
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from servicio where idItem = ".$id);
		
		foreach($rs->fields as $key => $val){
			switch($key){
				default: $this->$key = $val;
			}
		}
		
		return true;
	}
	
	public function setPrecio($val = 0){
		$this->precio = $val;
		
		return true;
	}
	
	public function getPrecio(){
		return $this->precio;
	}
		
	public function setImpInc($val = 'S'){
		$val = strtoupper($val) <> 'N'?'S':strtoupper($val);
		$this->impInc = $val;
		
		return true;
	}
	
	public function isImpInc(){
		return $this->impInc == 'S';
	}
	
	public function setImpuesto($val = 0){
		if ($val > 1)
			return false;
			
		$this->imp = $val;
		
		return true;
	}
	
	public function getImpuesto(){
		return $this->imp;
	}
	
	
	public function guardar(){
		if (! parent::guardar()) return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idItem from servicio where idItem = ".$this->getId());
		
		if ($rs->EOF){
			$rs = $db->Execute("INSERT INTO servicio (idItem, precio, impInc, imp) VALUES (".$this->getId().", 0, 'S', 0)");
		}
		
		$rs = $db->Execute("UPDATE servicio
			SET
				precio = ".$this->getPrecio().",
				impInc = '".$this->impInc."',
				imp = ".$this->getImpuesto()."
			WHERE idItem = ".$this->getId());
			
		return $rs?true:false;
	}
}
?>