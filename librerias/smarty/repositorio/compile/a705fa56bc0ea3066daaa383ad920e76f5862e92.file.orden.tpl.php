<?php /* Smarty version Smarty-3.1.11, created on 2015-08-30 22:28:06
         compiled from "templates/plantillas/modulos/inventario/salidas/ventas/orden.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150075346555e3c9c63e08d3-95489118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a705fa56bc0ea3066daaa383ad920e76f5862e92' => 
    array (
      0 => 'templates/plantillas/modulos/inventario/salidas/ventas/orden.tpl',
      1 => 1440991529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150075346555e3c9c63e08d3-95489118',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'orden' => 0,
    'cliente' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55e3c9c64aae01_41178359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e3c9c64aae01_41178359')) {function content_55e3c9c64aae01_41178359($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Venta</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="btn-toolbar" role="toolbar">
			<div class="btn-group btn-group-xs">
				<button type="button" class="btn btn-primary" action="regresar">Regresar</button>
			</div>
		</div>
	</div>
</div>
<br />
<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="row">
		<input type="hidden" id="orden" value="<?php echo $_smarty_tpl->tpl_vars['orden']->value->getId();?>
"/>
		<div class="col-lg-12">
			<div class="form-group">
				<label for="txtNumero" class="col-lg-2 control-label">Folio</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtFolio" type="text" name="txtFolio" autocomplete="off" autofocus="false" disabled="true" value="<?php echo $_smarty_tpl->tpl_vars['orden']->value->getClave();?>
"/>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label for="txtCliente" class="col-lg-2 control-label">Cliente</label>
				<div class="col-lg-8">
					<input class="form-control" id="txtCliente" type="text" name="txtCliente" autocomplete="off" autofocus="false" value="<?php if ($_smarty_tpl->tpl_vars['orden']->value->cliente->getId()==''){?><?php echo $_smarty_tpl->tpl_vars['cliente']->value->getNombre();?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['orden']->value->cliente->getNombre();?>
<?php }?>" idCliente="<?php if ($_smarty_tpl->tpl_vars['orden']->value->cliente->getId()==''){?><?php echo $_smarty_tpl->tpl_vars['cliente']->value->getId();?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['orden']->value->cliente->getId();?>
<?php }?>"/>
				</div>
				<div class="col-lg-2">
					<input id="btnWinCliente" name="btnWinCliente" class="btn btn-success btn-md" value="Nuevo" type="button" />
				</div>
			</div>
		</div>
	</form>
</div>
<br />
<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label for="txtProducto" class="col-lg-2 control-label">Artículo</label>
				<div class="col-lg-10">
					<input class="form-control input-sm" id="txtProducto" type="text" name="txtProducto" autocomplete="off" autofocus="true" />
				</div>
			</div>
		</div>
	</div>
</form>
<br>
<hr />
<div class="col-lg-12" id="dvListaMovimientos">
</div>

<div id="dvCliente" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a data-dismiss="modal" class="close">×</a>
				<h3>Agregar cliente</h3>
			</div>
			<div class="modal-body">
				<form role="form" id="frmAddCliente" name="frmAddCliente" class="form-horizontal" onsubmit="javascript: return false;">
					<div class="form-group">
						<label for="txtNombreCliente" class="col-lg-2 control-label">Nombre</label>
						<div class="col-lg-10">
							<input class="form-control" id="txtNombreCliente" type="text" name="txtNombreCliente" autocomplete="off" value="" placeholder="Nombre"/>
						</div>
					</div>
				</form>
				<br>
			</div>
			<div class="modal-footer">
				<input id="btnAddCliente" name="btnAddCliente" class="btn btn-success btn-md" value="Guardar" type="button" />
				<input class="btn btn-md" value="Cerrar" type="button" data-dismiss="modal"/>
			</div>
		</div>
	</div>
</div><?php }} ?>