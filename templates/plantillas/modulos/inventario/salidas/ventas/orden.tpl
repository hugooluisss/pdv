<div class="row">
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
		<input type="hidden" id="orden" value="{$orden->getId()}"/>
		<div class="col-lg-12">
			<div class="form-group">
				<label for="txtNumero" class="col-lg-2 control-label">Folio</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtFolio" type="text" name="txtFolio" autocomplete="off" autofocus="false" disabled="true" value="{$orden->getClave()}"/>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label for="txtCliente" class="col-lg-2 control-label">Cliente</label>
				<div class="col-lg-8">
					<input class="form-control" id="txtCliente" type="text" name="txtCliente" autocomplete="off" autofocus="false" value="{if $orden->cliente->getId() eq ''}{$cliente->getNombre()}{else}{$orden->cliente->getNombre()}{/if}" idCliente="{if $orden->cliente->getId() eq ''}{$cliente->getId()}{else}{$orden->cliente->getId()}{/if}"/>
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
</div>