<?php
Class TItem{
	private $idItem;
	private $codigo;
	private $nombre;
	private $descripcion;
	private $idTipoItem;
	private $fechaAlta;
	private $ultimaACtualizacion;
	
	function TItem($id = ''){
		if ($id <> '') $this->setId($id);
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from item where idItem = ".$id);
		
		foreach($rs->fields as $key => $val){
			switch($key){
				case 'idTipoItem': $this->idTipo = $val; break;
				default: $this->$key = $val;
			}
		}
		
		return true;
	}
	
	public function getId(){
		return $this->idItem;
	}
	
	public function setIdTipo($val = 1){
		$this->idTipo = 1;
	}
	
	public function getIdTipo(){
		return $this->idTipo;
	}
	
	public function setCodigo($val = ''){
		$this->codigo = $val;
		
		return true;
	}
	
	public function getCodigo(){
		return $this->codigo;
	}
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		
		return true;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function setDescripcion($val = ''){
		$this->descripcion = $val;
		
		return true;
	}
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	public function getFechaAlta(){
		return $this->fechaAlta;
	}
	
	public function getUltimaActualizacion(){
		return $this->ultimaActualizacion;
	}
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO item (idItem, idTipoItem, codigo, nombre, descripcion, fechaAlta) VALUES (null, ".$this->getIdTipo().", '".$this->getCodigo()."', '', '', now());

");
			$this->idItem = $db->Insert_ID();
		}
		
		$rs = $db->Execute("UPDATE item
			SET
				idTipoItem = ".$this->getIdTipo().",
				codigo = '".$this->getCodigo()."',
				nombre = '".$this->getNombre()."',
				descripcion = '".$this->getDescripcion()."',
				ultimaActualizacion = now()
			WHERE idItem = ".$this->getId());
			
		return $rs?true:false;
	}
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$rs = $db->Execute("delete from item where idItem = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>