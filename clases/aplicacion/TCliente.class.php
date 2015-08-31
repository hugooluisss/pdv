<?php
class TCliente{
	private $idCliente;
	private $nombre;
	private $sexo;
	private $telefono;
	private $email;
	private $direccion;
	private $comentarios;
	private $estado;
	
	public function TCliente($id = ''){
		$this->setId($id);
		
		return true;
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from cliente where idCliente = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
		return true;
	}
	
	public function getId(){
		return $this->idCliente;
	}
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function setSexo($val = ''){
		$this->sexo = $val;
		return true;
	}
	
	public function getSexo(){
		return $this->sexo;
	}
	
	public function setTelefono($val = ''){
		$this->telefono = $val;
		return true;
	}
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	public function setEmail($val = ''){
		$this->email = $val;
		return true;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setDireccion($val = ''){
		$this->direccion = $val;
		return true;
	}
	
	public function getDireccion(){
		return $this->direccion;
	}
	
	public function setComentarios($val = ''){
		$this->comentarios = $val;
		return true;
	}
	
	public function getComentarios(){
		return $this->comentarios;
	}
	
	public function setEstado($val = ''){
		$this->estado = $val;
		return true;
	}
	
	public function getEstado(){
		return $this->estado;
	}
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO cliente(idCliente, nombre, sexo, telefono, email, direccion, comentarios, estado) VALUES (null, '', '', '', '', '', '', 'A');
");
			$this->idCliente = $db->Insert_ID();
		}
		
		$db->Execute("UPDATE cliente
			SET
				nombre = '".$this->getNombre()."',
				sexo = '".$this->getSexo()."',
				telefono = '".$this->getTelefono()."',
				email = '".$this->getEmail()."',
				direccion = '".$this->getDireccion()."',
				comentarios = '".$this->getComentarios()."'
			WHERE idCliente = ".$this->getId());
			
		return true;
	}
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		return $db->Execute("update cliente set estado = 'E' where idCliente = ".$this->getId())?true:false;
	}
}
?>