<?php
Class TUsuario{
	private $idUsuario;
	private $user;
	private $pass;
	private $ultimoAcceso;
	private $navegador;
	private $versionNavegador;
	private $sistemaOperativo;
	
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
	
	public function getNombre(){
		if ($this->getId() == '') return false;
		
		return $this->user;
	}
	
	public function getId(){
		return $this->idUsuario;
	}
}
?>