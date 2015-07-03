<?php
Class TUsuario{
	private $idUsuario;
	private $nombre;
	private $user;
	private $pass;
	private $alta;
	private $ultimoacceso;
	private $navegador;
	private $versionNavegador;
	private $sistemaOperativo;
	private $idTipoUsuario;
	private $email;
	private $estado;
	
	public function TUsuario($id = ''){
		$this->setId($id);
		
		$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
		$os=array("WIN","MAC","LINUX");
		
		# definimos unos valores por defecto para el navegador y el sistema operativo
		$this->navegador = "Otro";
		$this->versionNavegador = "0.0";
		$this->sistemaOperativo = "";
		# buscamos el navegador con su sistema operativo
		foreach($browser as $parent){
			$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
			$f = $s + strlen($parent);
			$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
			$version = preg_replace('/[^0-9,.]/','',$version);
			if ($s){
				$this->navegador = $parent;
				$this->versionNavegador = $version;
			}
		}
		
		foreach($os as $val){
			if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val) !== false)
				$this->sistemaOperativo = $val;
		}
		
		return true;
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from usuario where idUsuario = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
		return true;
	}
	
	public function getSistemaOperativo(){
		if ($this->idUsuario == '') return '';
		return $this->sistemaOperativo;
	}
	
	public function getVersionNavegador(){
		if ($this->idUsuario == '') return '';
		return $this->versionNavegador;
	}
	
	public function getNavegador(){
		if ($this->idUsuario == '') return '';
		return $this->navegador;
	}
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	public function getNombre(){
		if ($this->getId() == '') return false;
		
		return $this->nombre;
	}
	
	public function setNick($val = ''){
		$this->nick = $val;
		return true;
	}
	
	public function getNick(){
		return $this->nick;
	}
	
	public function getId(){
		return $this->idUsuario;
	}
	
	public function getAlta(){
		return $this->alta;
	}
	
	public function getIdTipo(){
		return $this->idTipoUsuario;
	}
	
	public function setTipo($val = 0){
		$this->idTipoUsuario = $val;
		
		return true;
	}
	
	public function setUltimoAcceso(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == '') return false;
		
		$db->Execute("update usuario set ultimoacceso = now() where idUsuario = ".$this->getId());
		return true;
	}
	
	public function getUltimoAcceso(){
		return $this->ultimoacceso;
	}
	
	public function setEmail($val = ''){
		$this->email = $val;
		return true;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("insert into usuario (idUsuario, idTipoUsuario, nombre, nick, pass, alta, ultimoacceso, email) values (null, 0, '', '', '".md5($this->pass)."', now(), null, '')");
			$this->idUsuario = $db->Insert_ID();
		}
		
		$db->Execute("update usuario set
				idTipoUsuario = ".$this->getIdTipo().",
				nombre = '".$this->getNombre()."',
				nick = '".$this->getNick()."',
				email = '".$this->getEmail()."'
			where idUsuario = ".$this->getId());
			
		return true;
	}
	
	public function setPass($val = ''){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$db->Execute("update usuario set pass = md5('".$val."') where idUsuario = ".$this->getId());
		
		return true;
	}
	
	public function delete(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$db->Execute("update usuario set estado = 'E' where idUsuario = ".$this->getId());
		
		return true;
	}
}
?>