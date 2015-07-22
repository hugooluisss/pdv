<?php
Class TOrden{
	private $idOrden;
	private $fecha;
	private $clave;
	protected $movimientos;
	
	public function TOrden($id = ''){
		if ($id <> '') $this->setId($id);
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from orden where idOrden = ".$id);
		
		foreach($rs->fields as $key => $val){
			switch($key){
				default: $this->$key = $val;
			}
		}
		
		$this->movimientos = array();
		$rs = $db->Execute("select idMovimiento from movimiento where idOrden = ".$id);
		while(!$rs->EOF){
			array_push($this->movimientos, new TMovimiento($rs->fields['idMovimiento']));
			
			$rs->moveNext();
		}
		
		return true;
	}
	
	public function getId(){
		return $this->idOrden;
	}
	
	public function addMovimiento($idItem, $cantidad, $precio){
		if ($this->getId() == '') return false;
		
		$obj = new TMovimiento();
		$obj->setItem($idItem);
		$obj->setOrden($this->getId());
		$obj->setCantidad($cantidad);
		$obj->setPrecio($precio);
		if ($obj->guardar())
			$this->movimientos[$obj->getId()] = $obj;
		
		return false;
	}
	
	public function delMovimiento($idMovimiento = ''){
		if ($idMovimiento == '') return false;
		
		$obj = new TMovimiento($idMovimiento);
		if ($obj->eliminar()){
			un_set($this->movimientos[$idMovimiento]);
			return true;
		}
		
		return true;
	}
	
	public function guardar(){
		if ($this->getOrden() == '')
			return false;
			
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("select * from orden where clave = '".$this->getClave()."'");
			if (!$rs->EOF) return false;
			
			$rs = $db->Execute("INSERT INTO orden (idOrden, clave, fecha) VALUES (null, ".$this->getClave().", now());");
			$this->setId($db->Insert_ID());
		}
		
		$rs = $db->Execute("select * from orden where clave = '".$this->getClave()."'");
		
		if ($rs->fields['idOrden'] <> $this->getId())
			return false;
		
		$rs = $db->Execute("UPDATE orden
			SET
				clave = '".$this->getClave()."'
			WHERE idOrden = ".$this->getId());
			
		return $rs?true:false;
	}
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("delete from orden where idOrden = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>