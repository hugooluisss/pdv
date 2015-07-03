<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Proveedores</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<button type="button" class="btn btn-success btn-circle btn-xl" id="btnAdd"><i class="fa fa-plus"></i>
	</div>
</div>
<br />
<div class="col-lg-12">
	<table id="tblProveedores" class="table table-hover">
		<thead>
			<tr>
				<th>Empresa</th>
				<th>Contacto</th>
				<th>Teléfono</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			{foreach item=row from=$proveedores}
				<tr>
					<td>{$row.empresa}</td>
					<td>{$row.contacto}</td>
					<td>{$row.telefono|default:"No se indicó"}</td>
					<td style="text-align: right">
						<button type="button" class="btn btn-warning btn-circle" action="modificar" proveedor="{$row.encriptado.id}" title="Modificar"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" proveedor="{$row.encriptado.id}"><i class="fa fa-times"></i></button>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>