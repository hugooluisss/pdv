<?php
Class TMensaje{
	private $idMensaje;
	public $usuario;
	private $hora;
	private $texto;
	
	public function TMensaje($id = ''){
		if ($id == '') return false;
		
		$this->setId($id);
	}
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from mensaje where idMensaje = ".$id);

		foreach($rs->fields as $field => $val)
			switch($field){
				case 'idUsuario':
					$this->usuario = new TUsuario($val);
				break;
				default:
					$this->$field = $val;
				break;
			}
			
		return true;
	}
	
	public function guardar($mensaje = ''){
		global $sesion;
		if ($mensaje == '' or $sesion['usuario'] == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("insert into mensaje (idMensaje, idUsuario, hora, texto) values (null, ".$sesion['usuario'].", now(), '".$mensaje."')");
		if ($rs) return true;
		
		return false;
	}
	
	public function getTexto(){
		return $this->texto;
	}
	
	public function getHora(){
		return $this->hora;
	}
}
?>