<?php /* Smarty version Smarty-3.1.11, created on 2015-08-30 22:29:49
         compiled from "templates/plantillas/modulos/inventario/salidas/ventas/movimientos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109792983655e3ca2d13af52-02560862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9979da70add5abc4e84fac55661c300c36bafba' => 
    array (
      0 => 'templates/plantillas/modulos/inventario/salidas/ventas/movimientos.tpl',
      1 => 1439436996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109792983655e3ca2d13af52-02560862',
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
  'unifunc' => 'content_55e3ca2d1e9e55_01790509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e3ca2d1e9e55_01790509')) {function content_55e3ca2d1e9e55_01790509($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Library/WebServer/Documents/pdv/librerias/smarty/plugins/modifier.truncate.php';
?><table id="tblMovimientos" class="table table-hover">
	<thead>
		<tr>
			<th>Código</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>P. U.</th>
			<th>Total</th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value->item->getCodigo();?>
</td>
				<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value->item->getNombre(),50);?>
</td>
				<td style="text-align: right;"><?php echo sprintf("%d",$_smarty_tpl->tpl_vars['row']->value->getCantidad());?>
</td>
				<td style="text-align: right;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['row']->value->getPrecio());?>
</td>
				<td style="text-align: right;"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['row']->value->getCantidad()*$_smarty_tpl->tpl_vars['row']->value->getPrecio()));?>
</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" movimiento="<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>