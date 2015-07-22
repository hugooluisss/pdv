<?php /* Smarty version Smarty-3.1.11, created on 2015-07-22 14:31:36
         compiled from "templates/plantillas/modulos/inventario/entradas/orden.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176595676955af2570b2be00-52146486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ccdb2393565cda463806fba72617a8fa0651d7c' => 
    array (
      0 => 'templates/plantillas/modulos/inventario/entradas/orden.tpl',
      1 => 1437593494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176595676955af2570b2be00-52146486',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55af2570b9d519_04634859',
  'variables' => 
  array (
    'servicios' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55af2570b9d519_04634859')) {function content_55af2570b9d519_04634859($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Library/WebServer/Documents/pdv/librerias/smarty/plugins/modifier.truncate.php';
?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Entradas</h1>
	</div>
</div>
<div class="row">
	<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
		<div class="col-lg-4">
			<div class="form-group">
				<label for="txtNumero" class="col-lg-6 control-label">No. Orden / Factura</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtNumero" type="text" name="txtNumero" autocomplete="off" autofocus="true" />
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="form-group">
				<label for="txtProveedor" class="col-lg-3 control-label">Proveedor</label>
				<div class="col-lg-9">
					<input class="form-control" id="txtProveedor" type="text" name="txtProveedor" autocomplete="off" autofocus="true" />
				</div>
			</div>
		</div>
	</form>
</div>
<br />
<div class="row">
	<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
		<div class="col-lg-8">
			<div class="form-group">
				<label for="txtProducto" class="col-lg-3 control-label">Artículo</label>
				<div class="col-lg-7">
					<input class="form-control input-sm" id="txtProducto" type="text" name="txtProducto" autocomplete="off" autofocus="true" />
				</div>
				<div class="col-lg-2">
					<input id="btnAddProducto" class="btn btn-success btn-md" value="Nuevo" type="button" />
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label for="txtExistencias" class="col-lg-3 control-label">Total</label>
				<div class="col-lg-9">
					<input class="form-control input-sm" id="txtExistencias" type="text" name="txtExistencias" autocomplete="off" autofocus="true" />
				</div>
			</div>
		</div>
	</form>
</div>
<br>
<hr />
<div class="col-lg-12">
	<table id="tblMovimientos" class="table table-hover">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servicios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['codigo'];?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['nombre'],50);?>
</td>
					<td><?php echo sprintf("%0.2f",(($tmp = @$_smarty_tpl->tpl_vars['row']->value['precio'])===null||$tmp==='' ? "0" : $tmp));?>
</td>
					<td style="text-align: right">
						<button type="button" class="btn btn-warning btn-circle" action="modificar" servicio="<?php echo $_smarty_tpl->tpl_vars['row']->value['encriptado']['id'];?>
" title="Modificar"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" servicio="<?php echo $_smarty_tpl->tpl_vars['row']->value['encriptado']['id'];?>
"><i class="fa fa-times"></i></button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div><?php }} ?>