<?php
define('SISTEMA', 'Punto de venta');
define('VERSION', 'v 1.0');
define('ALIAS', '');
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugooluisss@gmail.com');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');

#Login y su controlador	
$conf['inicio'] = array(
	#'controlador' => 'index.php',
	'vista' => 'usuarios/login.tpl',
	'descripcion' => '',
	'seguridad' => false,
	'js' => array('login.js'),
	'capa' => 'layout/login.tpl');
	
#Login y su controlador	
$conf['clogin'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Inicio de sesion',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	

#Login chat
$conf['panel'] = array(
	#'controlador' => 'index.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array('mensaje.class.js', 'panel.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['cchat'] = array(
	'controlador' => 'chat.php',
	'descripcion' => 'Control de la sala de chat',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['mensajes'] = array(
	'controlador' => 'chat.php',
	'vista' => 'usuarios/mensajes.tpl',
	'descripcion' => 'Lista de mensajes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);