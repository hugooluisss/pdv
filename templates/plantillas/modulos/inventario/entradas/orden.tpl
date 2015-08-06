<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Entradas</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="btn-toolbar" role="toolbar">
			<div class="btn-group btn-group-xs">
				<button type="button" class="btn btn-primary" action="regresar">Regresar</button>
			</div>
			<div class="btn-group btn-group-xs">
				<button type="button" class="btn btn-danger" action="aplicar">Aplicar</button>
			</div>
		</div>
	</div>
</div>
<br />
<div class="row">
	<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
		<input type="hidden" id="orden" value="{$orden->getId()}"/>
		<div class="col-lg-4">
			<div class="form-group">
				<label for="txtNumero" class="col-lg-6 control-label">No. Orden / Factura</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtNumero" type="text" name="txtNumero" autocomplete="off" autofocus="true" value="{$orden->getClave()}"/>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="form-group">
				<label for="txtProveedor" class="col-lg-3 control-label">Proveedor</label>
				<div class="col-lg-7">
					<input class="form-control" id="txtProveedor" type="text" name="txtProveedor" autocomplete="off" autofocus="true" value="{$orden->proveedor->getNombre()}" idProveedor="{$orden->proveedor->getId()}"/>
				</div>
				<div class="col-lg-2">
					<input id="btnWinProveedor" name="btnWinProveedor" class="btn btn-success btn-md" value="Nuevo" type="button" />
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
				<div class="col-lg-8">
					<input class="form-control input-sm" id="txtProducto" type="text" name="txtProducto" autocomplete="off" autofocus="true" />
				</div>
				<div class="col-lg-2">
					<input id="btnWinProducto" name="btnWinProducto" class="btn btn-success btn-md" value="Nuevo" type="button" />
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="form-group">
				<label for="txtExistencias" class="col-lg-3 control-label">Total</label>
				<div class="col-lg-4">
					<input class="form-control input-sm" id="txtExistencias" type="text" name="txtExistencias" autocomplete="off" autofocus="true" style="text-align: right"/>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label for="txtPrecio" class="col-lg-3 control-label">P. U.</label>
				<div class="col-lg-4">
					<input class="form-control input-sm" id="txtPrecio" type="text" name="txtPrecio" autocomplete="off" autofocus="true" style="text-align: right"/>
				</div>
				<div class="col-lg-2">
					<input id="btnAddItem" name="btnAddItem" class="btn btn-danger btn-md" value="Agregar" type="button" />
				</div>
			</div>
		</div>
	</div>
</form>
<br>
<hr />
<div class="col-lg-12" id="dvListaMovimientos">
</div>

<div id="dvProveedor" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a data-dismiss="modal" class="close">×</a>
				<h3>Agregar proveedor</h3>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="txtEmpresa" class="col-lg-2 control-label">Empresa</label>
					<div class="col-lg-10">
						<input class="form-control" id="txtNombreProveedor" type="text" name="txtNombreProveedor" autocomplete="off" value="" placeholder="Nombre"/>
					</div>
				</div>
				<br>
			</div>
			<div class="modal-footer">
				<input id="btnAddProveedor" name="btnAddProveedor" class="btn btn-success btn-md" value="Guardar" type="button" />
				<input class="btn btn-md" value="Cerrar" type="button" data-dismiss="modal"/>
			</div>
		</div>
	</div>
</div>

<div id="dvProducto" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a data-dismiss="modal" class="close">×</a>
				<h3>Agregar producto</h3>
			</div>
			<div class="modal-body">
				<form role="form" id="frmAddProducto" class="form-horizontal" onsubmit="javascript: return false;">
					<div class="form-group">
						<label for="txtCodigo" class="col-lg-4 control-label">Código</label>
						<div class="col-lg-5">
							<input class="form-control" id="txtCodigo" type="text" name="txtCodigo" autocomplete="off" autofocus="true" value=""/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombre" class="col-lg-4 control-label">Nombre</label>
						<div class="col-lg-8">
							<input class="form-control" id="txtNombre" type="text" name="txtNombre" autocomplete="off" value=""/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-lg-4 control-label">Descripción</label>
						<div class="col-lg-8">
							<textarea rows="3" class="form-control" id="txtDescripcion" name="txtDescripcion"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="selDepartamento" class="col-lg-4 control-label">Departamento</label>
						<div class="col-lg-8">
							<select id="selDepartamento" name="selDepartamento">
								{foreach item=row from=$departamentos}
									<option value="{$row.idDepartamento}">{$row.nombre}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtMarca" class="col-lg-4 control-label">Marca</label>
						<div class="col-lg-5">
							<input class="form-control" id="txtMarca" type="text" name="txtMarca" autocomplete="off" value=""/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPU" class="col-lg-4 control-label">Precio unitario</label>
						<div class="col-lg-4">
							<input class="form-control" id="txtPU" type="text" name="txtPU" autocomplete="off" value="0.00" style="text-align: right"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtMinimo" class="col-lg-4 control-label">Inventario mínimo</label>
						<div class="col-lg-4">
							<input class="form-control" id="txtMinimo" type="text" name="txtMinimo" autocomplete="off" value="0" style="text-align: right"/>
						</div>
					</div>
					<hr />
					<h2>Impuesto</h2>
					<div class="form-group">
						<label for="selImpInc" class="col-lg-4 control-label">¿Impuesto incluido?</label>
						<div class="col-lg-8">
							<select id="selImpInc" name="selImpInc">
								<option value="S" selected>Si
								<option value="N">No
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selImpuesto" class="col-lg-4 control-label">% impuesto</label>
						<div class="col-lg-4">
							<select id="selImpuesto" name="selImpuesto">
							{for $imp=0 to 100}
								<option value="{$imp/100}" {if $imp eq 15}selected{/if}>{$imp}
							{/for}
							</select>
						</div>
					</div>
					<hr />
					<h2>Costeo</h2>
					<div class="form-group">
						<label for="selCosteo" class="col-lg-4 control-label">Costeo</label>
						<div class="col-lg-8">
							<select id="selCosteo" name="selCosteo">
								{foreach item=row from=$tipoCosteo}
									<option value="{$row.idTipoCosteo}">{$row.nombre}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCosto" class="col-lg-4 control-label">Costo</label>
						<div class="col-lg-4">
							<input class="form-control" id="txtCosto" type="text" name="txtCosto" autocomplete="off" value="0.00" style="text-align: right"/>
						</div>
					</div>
				</form>
				<br>
			</div>
			<div class="modal-footer">
				<input id="btnAddProducto" name="btnAddProducto" class="btn btn-success btn-md" value="Guardar" type="button" />
				<input class="btn btn-md" value="Cerrar" type="button" data-dismiss="modal"/>
			</div>
		</div>
	</div>
</div>