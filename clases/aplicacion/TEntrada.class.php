<?php
include_once("clases/aplicacion/TOrden.class.php");
Class TEntrada extends TOrden{
	protected $proveedor;
	private $estado;
	
	public function TEntrada($orden = ''){
		$this->estado = 'C';
		$this->setId($orden);
	}
	
	public function setId($id = ''){
		parent::setId($id);
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from entrada where idOrden = ".$this->getId());
		
		foreach($rs->fields as $key => $val){
			switch($key){
				case 'idProveedor': $this->setProveedor($val); break;
				default: $this->$key = $val;
			}
		}
		
		return true;
	}
	
	public function setProveedor($id = ''){
		$this->proveedor = new TProveedor($id);
		
		return true;
	}
	
	public function getEstado(){
		return $this->estado;
	}
	
	public function guardar(){
		if (! parent::guardar()) return false;
		
		if ($this->getEstado() == 'A') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idOrden from entrada where idOrden = ".$this->getId());
		if ($rs->EOF)
			$db->Execute("INSERT INTO entrada (idOrden, idProveedor, estado) VALUES (null, ".$this->proveedor->getId().", 'C')");
		
		$rs = $db->Execute("update entrada set idProveedor = ".$this->proveedor->getId()." where idOrden = ".$this->getId());
		
		return $rs?true:false;
	}
	
	public function eliminar(){
		if ($this->getId() == '' or $this->getEstado() == 'A') return false;
		
		return parent::eliminar();
	}
	
	public function aplicar(){
		foreach($this->movimientos as $mov){
			if (!$mov->isAplicado()){
				$mov->item->setCantidad($mov->item->getCantidad() + $mov->getCantidad());
				switch($mov->item->getIdTipoCosteo()){
					case 1: #costo mas alto
						if ($mov->getPU() > $mov->item->getCosto())
							$mov->item->setCosto($mov->getPU());
					break;
					case 2:
						if ($mov->getPU() < $mov->item->getCosto())
							$mov->item->setCosto($mov->getPU());
					break;
					case 3:
						$mov->item->setCosto(($mov->getPU() + $mov->item->getCosto()) / 2);
				}
				
				if ($mov->item->guardar())
					$mov->setAplicado();
			}
		}
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("update entrada set estado = 'A' where idOrden = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>