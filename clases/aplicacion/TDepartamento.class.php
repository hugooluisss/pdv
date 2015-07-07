<?php
Class TDepartamento{
	private $idDepartamento;
	private $nombre;
	private $descripcion;
	
	public function TDepartamento($id = ''){
		$this->setId($id);
		
		return true;
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from departamento where idDepartamento = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
		return true;
	}
	
	public function getId(){
		return $this->idDepartamento;
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
	
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO departamento(idDepartamento, nombre, descripcion) VALUES (null, '', '');
");
			$this->idDepartamento = $db->Insert_ID();
		}
		
		$db->Execute("UPDATE departamento
			SET
				nombre = '".$this->getNombre()."',
				descripcion = '".$this->getDescripcion()."'
			WHERE idDepartamento = ".$this->getId());
			
		return true;
	}
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		return $db->Execute("delete from departamento where idDepartamento = ".$this->getId())?true:false;
	}
}
?>