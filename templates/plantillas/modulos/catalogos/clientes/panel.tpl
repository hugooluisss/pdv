<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Clientes</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<button type="button" class="btn btn-success btn-circle btn-xl" id="btnAdd"><i class="fa fa-plus"></i>
	</div>
</div>
<br />
<div class="col-lg-12">
	<table id="tblClientes" class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Teléfono</th>
				<th>email</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			{foreach item=row from=$clientes}
				<tr>
					<td>{$row.idCliente}</td>
					<td>{$row.nombre}</td>
					<td>{$row.telefono|default:"No se indicó"}</td>
					<td>{$row.email|default:"No se indicó"}</td>
					<td style="text-align: right">
						<button type="button" class="btn btn-warning btn-circle" action="modificar" cliente="{$row.encriptado.id}" title="Modificar"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" cliente="{$row.encriptado.id}"><i class="fa fa-times"></i></button>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>