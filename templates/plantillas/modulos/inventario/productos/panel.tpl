<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Productos</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<button type="button" class="btn btn-success btn-circle btn-xl" id="btnAdd"><i class="fa fa-plus"></i>
	</div>
</div>
<br />
<div class="col-lg-12">
	<table id="tblProductos" class="table table-hover">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			{foreach item=row from=$productos}
				<tr>
					<td>{$row.codigo}</td>
					<td>{$row.nombre|truncate:30}</td>
					<td>{$row.precio|default:"0"|string_format:"%0.2f"}</td>
					<td style="text-align: right">
						<button type="button" class="btn btn-warning btn-circle" action="modificar" producto="{$row.encriptado.id}" title="Modificar"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" producto="{$row.encriptado.id}"><i class="fa fa-times"></i></button>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>