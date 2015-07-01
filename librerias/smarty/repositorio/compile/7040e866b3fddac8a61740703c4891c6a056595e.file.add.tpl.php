<?php /* Smarty version Smarty-3.1.11, created on 2015-06-30 23:22:30
         compiled from "templates/plantillas/modulos/administracion/usuarios/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1682769020559369d1bacdd2-43448850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7040e866b3fddac8a61740703c4891c6a056595e' => 
    array (
      0 => 'templates/plantillas/modulos/administracion/usuarios/add.tpl',
      1 => 1435724549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1682769020559369d1bacdd2-43448850',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_559369d1bf4919_44260051',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559369d1bf4919_44260051')) {function content_559369d1bf4919_44260051($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Usuarios</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<form role="form">
			<div class="form-group">
				<label>Usuario</label>
				<input class="form-control" id="txtUsuario" autofocus="true">
			</div>
			<div class="form-group">
				<label>Contraseña</label>
				<input class="form-control" type="password" id="txtPass">
			</div>
			<div class="form-group">
				<label>Confirmar</label>
				<input class="form-control" type="password" id="txtConfirmar">
			</div>
			<div class="form-group">
				<label>Propietario</label>
				<input class="form-control" id="txtNombre" autofocus="true">
			</div>
		</form>
	</div>
</div><?php }} ?>