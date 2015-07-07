<?php
Class TProveedor{
	private $idProveedor;
	private $empresa;
	private $nombre;
	private $email;
	private $tel;
	private $dirección;
	private $ciudad;
	private $estado;
	private $cuenta;
	private $comentarios;
	private $puesto;
	
	public function TProveedor($id = ''){
		$this->setId($id);
		
		return true;
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from proveedor where idProveedor = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
		return true;
	}
	
	public function getId(){
		return $this->idProveedor;
	}
	
	public function setEmpresa($val = ''){
		$this->empresa = $val;
		return true;
	}
	
	public function getEmpresa(){
		return $this->empresa;
	}
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function setEmail($val = ''){
		$this->email = $val;
		return true;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setTelefono($val = ''){
		$this->tel = $val;
		return true;
	}
	
	public function getTelefono(){
		return $this->tel;
	}
	
	public function setDireccion($val = ''){
		$this->direccion = $val;
		return true;
	}
	
	public function getDireccion(){
		return $this->direccion;
	}
	
	public function setCiudad($val = ''){
		$this->ciudad = $val;
		return true;
	}
	
	public function getCiudad(){
		return $this->ciudad;
	}
	
	public function setEstado($val = ''){
		$this->estado = $val;
		return true;
	}
	
	public function getEstado(){
		return $this->estado;
	}
	
	public function setCuenta($val = ''){
		$this->cuenta = $val;
		return true;
	}
	
	public function getCuenta(){
		return $this->cuenta;
	}
	
	public function setComentarios($val = ''){
		$this->comentarios = $val;
		return true;
	}
	
	public function getComentarios(){
		return $this->comentarios;
	}
	
	public function setPuesto($val = ''){
		$this->puesto = $val;
		return true;
	}
	
	public function getPuesto(){
		return $this->puesto;
	}
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO proveedor(idProveedor, empresa, nombre, email, tel, direccion, ciudad, estado, cuenta, comentarios, puesto) VALUES (null, '', '', '', '', '', '', '', '', '', '');
");
			$this->idProveedor = $db->Insert_ID();
		}
		
		$db->Execute("UPDATE proveedor
			SET
				empresa = '".$this->getEmpresa()."',
				nombre = '".$this->getNombre()."',
				email = '".$this->getEmail()."',
				tel = '".$this->getTelefono()."',
				direccion = '".$this->getDireccion()."',
				ciudad = '".$this->getCiudad()."',
				estado = '".$this->getEstado()."',
				cuenta = '".$this->getCuenta()."',
				comentarios = '".$this->getComentarios()."',
				puesto = '".$this->getPuesto()."'
			WHERE idProveedor = ".$this->getId());
			
		return true;
	}
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		return $db->Execute("delete from proveedor where idProveedor = ".$this->getId())?true:false;
	}
}
?>