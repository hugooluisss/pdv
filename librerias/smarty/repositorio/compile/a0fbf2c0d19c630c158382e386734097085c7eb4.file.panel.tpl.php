<?php /* Smarty version Smarty-3.1.11, created on 2015-07-02 22:58:16
         compiled from "templates/plantillas/modulos/catalogos/articulos/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116716415955960858e6cbd2-65051982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0fbf2c0d19c630c158382e386734097085c7eb4' => 
    array (
      0 => 'templates/plantillas/modulos/catalogos/articulos/panel.tpl',
      1 => 1435895667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116716415955960858e6cbd2-65051982',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usuarios' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55960858efa541_49534727',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55960858efa541_49534727')) {function content_55960858efa541_49534727($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Artículos</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<button type="button" class="btn btn-success btn-circle btn-xl" id="btnAdd"><i class="fa fa-plus"></i>
	</div>
</div>
<br />
<div class="col-lg-12">
	<table id="tblUsuarios" class="table table-hover">
		<thead>
			<tr>
				<th>Nick</th>
				<th>Nombre</th>
				<th>Alta</th>
				<th>Último Acceso</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nick'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
					<td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['alta'])===null||$tmp==='' ? "No se indicó" : $tmp);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['ultimoacceso'];?>
</td>
					<td style="text-align: right">
						<button type="button" class="btn btn-warning btn-circle" action="modificar" usuario="<?php echo $_smarty_tpl->tpl_vars['row']->value['encriptado']['idUsuario'];?>
" title="Modificar"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" usuario="<?php echo $_smarty_tpl->tpl_vars['row']->value['encriptado']['idUsuario'];?>
"><i class="fa fa-times"></i></button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div><?php }} ?>