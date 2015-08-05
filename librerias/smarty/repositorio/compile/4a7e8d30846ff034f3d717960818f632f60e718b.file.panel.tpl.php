<?php /* Smarty version Smarty-3.1.11, created on 2015-08-04 08:34:35
         compiled from "templates/plantillas/modulos/inventario/entradas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180816940955ae7e84c50a36-38420212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a7e8d30846ff034f3d717960818f632f60e718b' => 
    array (
      0 => 'templates/plantillas/modulos/inventario/entradas/panel.tpl',
      1 => 1438092217,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180816940955ae7e84c50a36-38420212',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55ae7e84cd2636_11126474',
  'variables' => 
  array (
    'servicios' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae7e84cd2636_11126474')) {function content_55ae7e84cd2636_11126474($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Library/WebServer/Documents/pdv/librerias/smarty/plugins/modifier.truncate.php';
?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Entradas</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<a href="?mod=entradaAdd"><button type="button" class="btn btn-success btn-circle btn-xl" id="btnAdd"><i class="fa fa-plus"></i></button></a>
	</div>
</div>
<br />
<div class="col-lg-12">
	<table id="tblOrdenes" class="table table-hover">
		<thead>
			<tr>
				<th>Orden</th>
				<th>Proveedor</th>
				<th>Fecha</th>
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