<?php
#variables
$ini = array();
$ini = parse_ini_file('aplicacion.ini', true);

ini_set('display_errors', '0');

include_once("config.php");
define("MODULO_DEFECTO", 'inicio');
define("MODULO_SESION_INICIADA", 'panelPrincipal');
define("SISTEMA", $ini['sistema']['nombreAplicacion']);

session_start();
session_name(SISTEMA);
$sesion = $_SESSION[SISTEMA];
$modulo = $_GET['mod'] == ''?(isset($sesion['num_personal'])?MODULO_SESION_INICIADA:MODULO_DEFECTO):$_GET['mod'];

header('Content-Type: text/html; charset=UTF-8');
setlocale(LC_CTYPE, "es_ES");
date_default_timezone_set("America/Mexico_City");

#librerias
define('ADODB_ERROR_LOG_DEST','errors.log');
define('ADODB_ERROR_LOG_TYPE',2);
include('librerias/adodb/adodb-errorhandler.inc.php');
include('librerias/adodb/adodb.inc.php');
require_once('librerias/phpMailer/class.phpmailer.php');
include('librerias/funciones.php');
require('librerias/fpdf/fpdf.php');
require('librerias/fpdf/tfpdf.php');

ini_set("include_path", ini_get("include_path").PATH_SEPARATOR.dirname(__FILE__)."/librerias/pear/");
includeDir("clases/framework/");
includeDir("clases/aplicacion/");

$objModulo = new TModulo($modulo);
$bandSesion = true;
if ($objModulo->requiereSeguridad()){
	if (!isset($sesion['usuario'])){
		$bandSesion = false;
		$modulo = MODULO_DEFECTO;
		unset($objModulo);
		$objModulo = new TModulo($modulo); 
	}
}else
	$bandSesion = isset($sesion['num_personal']);

define("DIR_PLANTILLAS", 'templates');
define('TEMPLATE', DIR_PLANTILLAS.'/plantillas/');
define('CONFIG', 'librerias/smarty/repositorio/configs/');
define('CACHE', 'librerias/smarty/repositorio/cache/');
define('COMPILE', 'librerias/smarty/repositorio/compile/');

require_once('librerias/smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty->debugging = (strtoupper($ini['sistema']['debug']) == 'ON');
$smarty->caching = (strtoupper($ini['sistema']['caching']) == 'ON');
$smarty->cache_lifetime = 120;

$smarty->template_dir = TEMPLATE;
$smarty->config_dir = CONFIG;
$smarty->cache_dir = CACHE;
$smarty->compile_dir = COMPILE;

$datosPlantilla = array(
	"ruta" => DIR_PLANTILLAS."/",
	"css" => DIR_PLANTILLAS."/css/",
	"iconos" => DIR_PLANTILLAS."/iconos/",
	"sesion" => $_SESSION[SISTEMA],
	"debug" => $ini['sistema']['debug'] == 1,
	"sesionIniciada" => $bandSesion?'1':'0',
	"vista" => $objModulo->getRutaVista(),
	"nombreAplicacion" => SISTEMA,
	"empresa" => $ini['sistema']['nombreEmpresa'],
	"empresaAcronimo" => $ini['sistema']['acronimoEmpresa'],
	"action" => $_GET['action'],
	"POST" => $_POST,
	"GET" => $_GET,
	"version" => "1.0",
	"alias" => "",
	"rutaModulos" => TEMPLATE,
	"modulo" => $modulo,
	"scriptsJS" => $objModulo->getScriptsJS(),
	"urlFotosTrabajadores" => $ini['sip']['fotos']);

foreach($_GET as $indice => $valor){
	$_GET[$indice] = ereg_replace('\\"', "",$_GET[$indice]);
	$_GET[$indice] = stripslashes($_GET[$indice]);
	$_GET[$indice] = ereg_replace("'", "''", $_GET[$indice]);
}
	
foreach($_POST as $indice => $valor){	
	$_POST[$indice] = ereg_replace('\\"', "", $_POST[$indice]);	
	$_POST[$indice] = ereg_replace("'", "''", $_POST[$indice]);
}

define('TAMPAG', $ini['config']['TAMPAG']);
define('NUMPAG', $ini['config']['NUMPAG']);

if ($objModulo->getRutaControlador() <> '')
	require('controlador/'.$objModulo->getRutaControlador());

$smarty->assign("PAGE", $datosPlantilla);

if($objModulo->getRutaCapa() <> '')
	$smarty->display($objModulo->getRutaCapa());
?>