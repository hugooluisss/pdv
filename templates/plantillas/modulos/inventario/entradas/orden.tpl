<div class="row">
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
					<input id="btnAddProducto" name="btnAddProducto" class="btn btn-success btn-md" value="Nuevo" type="button" />
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
			{foreach item=row from=$servicios}
				<tr>
					<td>{$row.codigo}</td>
					<td>{$row.nombre|truncate:50}</td>
					<td>{$row.precio|default:"0"|string_format:"%0.2f"}</td>
					<td style="text-align: right">
						<button type="button" class="btn btn-warning btn-circle" action="modificar" servicio="{$row.encriptado.id}" title="Modificar"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" servicio="{$row.encriptado.id}"><i class="fa fa-times"></i></button>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>