<?php
Class TProducto extends TItem{
	private $costo;
	private $tipoCosteo;
	private $departamento;
	private $marca;
	private $precio;
	private $impInc;
	private $imp;
	private $minimo;
	private $existencias;
	
	public function TProducto($id = ''){
		if ($id <> '')
			$this->setId($id);
		parent::setIdTipo(1);
	}
	
	public function setId($id = ''){
		if ($id == '')
			return false;
			
		parent::setId($id);
			
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from producto where idItem = ".$id);
		
		foreach($rs->fields as $key => $val){
			switch($key){
				case 'idTipoCosteo': $this->tipoCosteo = $val; break;
				case 'idDepartamento': $this->departamento = $val; break;
				default: $this->$key = $val;
			}
		}
		
		return true;
	}
	
	public function setTipoCosteo($val = 1){
		$this->tipoCosteo = $val;
		
		return true;
	}
	
	public function getIdTipoCosteo(){
		return $this->tipoCosteo;
	}
	
	public function getNombreCosteo(){
		if ($this->getIdTipoCosteo() == '') return false;
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select nombre from tipoCosteo where idTipoCosteo = ".$this->getIdTipoCosteo());
		
		return $rs->fields['nombre'];
	}
	
	public function setDepartamento($val = ''){
		if ($val == '') return false;
		
		$this->departamento = $val;
		
		return true;
	}
	
	public function getIdDepartamento(){
		return $this->departamento;
	}
	
	public function getNombreDepartamento(){
		if ($this->getIdDepartamento() == '') return false;
		
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select nombre from departamento where idDepartamento = ".$this->getIdDepartamento());
		
		return $rs->fields['nombre'];
	}
	
	public function setPrecio($val = 0){
		$this->precio = $val;
		
		return true;
	}
	
	public function getPrecio(){
		return $this->precio;
	}
	
	public function setMarca($val = 1){
		$this->marca = $val;
		
		return true;
	}
	
	public function getMarca(){
		return $this->marca;
	}
	
	public function setCosto($val = 0){
		$this->costo = $val;
		
		return true;
	}
	
	public function getCosto(){
		return $this->costo;
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
	
	public function setMinimo($val = 0){
		$this->minimo = $val;
		return true;
	}
	
	public function getMinimo(){
		return $this->minimo;
	}
	
	public function setExistencias($val = 0){
		$this->existencias = $val;
		return true;
	}
	
	public function getExistencias(){
		return $this->existencias;
	}
	
	public function guardar(){
		if (! parent::guardar()) return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select idItem from producto where idItem = ".$this->getId());
		
		if ($rs->EOF){
			$rs = $db->Execute("INSERT INTO producto (idItem, idDepartamento, idTipoCosteo, costo, precio, impInc, imp, marca, minimo, existencias) VALUES (".$this->getId().",
".$this->getIdDepartamento().", ".$this->getIdTipoCosteo().", 0, 0, 'S', 0, '', 0, 0)");
		}
		
		$rs = $db->Execute("UPDATE producto
			SET
				idDepartamento = ".$this->getIdDepartamento().",
				idTipoCosteo = ".$this->getIdTipoCosteo().",
				costo = ".$this->getCosto().",
				precio = ".$this->getPrecio().",
				impInc = '".$this->impInc."',
				imp = ".$this->getImpuesto().",
				marca = '".$this->getMarca()."',
				minimo = ".$this->getMinimo().",
				existencias = ".$this->getExistencias()."
			WHERE idItem = ".$this->getId());
			
		return $rs?true:false;
	}
}
?>