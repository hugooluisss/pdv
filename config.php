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
	
$conf['panel'] = array(
	'controlador' => 'index.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);

$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'administracion/usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js', 'usuarios.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['usuarioAdd'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'administracion/usuarios/add.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js', 'usuarios.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['cusuario'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/***** Empresa *****/
$conf['empresa'] = array(
	'controlador' => 'empresa.php',
	'vista' => 'administracion/empresa/panel.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array('empresa.class.js', 'empresa.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['cempresa'] = array(
	'controlador' => 'empresa.php',
	'descripcion' => 'Controlador de configuración de la empresa',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

/********* Proveedores *********/

$conf['proveedores'] = array(
	'controlador' => 'proveedores.php',
	'vista' => 'catalogos/proveedores/panel.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array('proveedor.class.js', 'proveedores.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['proveedorAdd'] = array(
	'controlador' => 'proveedores.php',
	'vista' => 'catalogos/proveedores/add.tpl',
	'descripcion' => 'Administración de proveedores',
	'seguridad' => true,
	'js' => array('proveedor.class.js', 'proveedores'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['cproveedor'] = array(
	'controlador' => 'proveedores.php',
	'descripcion' => 'Controlador de proveedores',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/********* Clientes *********/

$conf['clientes'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'catalogos/clientes/panel.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array('cliente.class.js', 'clientes.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['clienteAdd'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'catalogos/clientes/add.tpl',
	'descripcion' => 'Administración de clientes',
	'seguridad' => true,
	'js' => array('cliente.class.js', 'clientes.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['cclientes'] = array(
	'controlador' => 'clientes.php',
	'descripcion' => 'Controlador de clientes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);