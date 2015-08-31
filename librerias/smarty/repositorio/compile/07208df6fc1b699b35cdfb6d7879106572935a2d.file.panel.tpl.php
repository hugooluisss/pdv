<?php /* Smarty version Smarty-3.1.11, created on 2015-08-30 17:51:02
         compiled from "templates/plantillas/modulos/inventario/ventas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188636885155e388d6e556e1-39373024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07208df6fc1b699b35cdfb6d7879106572935a2d' => 
    array (
      0 => 'templates/plantillas/modulos/inventario/ventas/panel.tpl',
      1 => 1440975061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188636885155e388d6e556e1-39373024',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55e388d6efaf14_38426903',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e388d6efaf14_38426903')) {function content_55e388d6efaf14_38426903($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Venta</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<a href="?mod=venta"><button type="button" class="btn btn-success btn-circle btn-xl" id="btnAdd"><i class="fa fa-plus"></i></button></a>
	</div>
</div>
<br />
<div class="col-lg-12">
	<table id="tblOrdenes" class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Fecha</th>
				<th>Cliente</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value->getFecha();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value->getClave();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value->proveedor->getNombre();?>
</td>
					<td style="text-align: right">
						<?php if ($_smarty_tpl->tpl_vars['row']->value->getEstado()!='A'){?>
						<button type="button" class="btn btn-warning btn-circle" action="modificar" orden="<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" title="Modificar"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" orden="<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
"><i class="fa fa-times"></i></button>
						<?php }?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div><?php }} ?>