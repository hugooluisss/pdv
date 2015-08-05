<?php
Class TMovimiento{
	private $idMovimiento;
	private $idOrden;
	protected $item;
	private $pu;
	private $cantidad;
	private $fecha;
	private $aplicado;
	
	public function TMovimiento($id = ''){
		$this->aplicado = 'N';
		$this->setId($id);
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from movimiento where idMovimiento = ".$id);
		
		foreach($rs->fields as $key => $val){
			switch($key){
				case 'idItem':
					$this->item = new TItem($val);
				break;
				default: $this->$key = $val;
			}
		}
		
		return true;
	}
	
	public function setOrden($val = ''){
		$this->idOrden = $val;
		
		return true;
	}
	
	public function getOrden(){
		return $this->idOrden;
	}
	
	public function setItem($val = ''){
		if ($val == '')
			$this->item = null;
		else{
			$this->item = new TItem($val);
			switch($this->item->getIdTipo()){
				case 1:
					$this->item = new TProducto($val);
					$this->setPrecio($this->item->getPrecio());
				break;
				case 2:
					$this->item = new TServicio($val);
					$this->setPrecio($this->item->getPrecio());
				break;
			}
		}
		
		return true;
	}
	
	public function setCantidad($val = ''){
		$this->cantidad = $val;
		
		return true;
	}
	
	public function getCantidad(){
		return $this->cantidad;
	}
	
	public function setPrecio($val = ''){
		$this->pu = $val;
		
		return true;
	}
	
	public function getPrecio(){
		return $this->pu;
	}
	
	public function guardar(){
		if ($this->getOrden() == '')
			return false;
			
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO movimiento (idMovimiento, idItem, cantidad, pu, fecha) VALUES (null, ".$this->item->getId().", ".$this->getCantidad().", '".$this->getPrecio()."', now());");
			$this->setId($db->Insert_ID());
		}
		
		$rs = $db->Execute("UPDATE movimiento
			SET
				cantidad = '".$this->getCantidd()."',
				pu = '".$this->getPrecio()."',
				fecha = now()
			WHERE idMovimiento = ".$this->getId());
			
		return $rs?true:false;
	}
	
	public function eliminar(){
		if ($this->getId() == '')
			return false;
			
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from movimiento where idMovimiento = ".$this->getId());
			
		return $rs?true:false;
	}
	
	public function setAplicado(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("update movimiento set aplicado = 'S' where idMovimiento = ".$this->getId());
		
		return $rs?true:false;
	}
	
	public function isAplicado(){
		if ($this->getId() == '') return false;
		
		if ($this->aplicado = 'S') return true;
		
		return false;
	}
}
?>