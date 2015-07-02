<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Usuarios</h1>
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
			{foreach item=row from=$usuarios}
				<tr>
					<td>{$row.nick}</td>
					<td>{$row.nombre}</td>
					<td>{$row.alta|default:"No se indicó"}</td>
					<td>{$row.ultimoacceso}</td>
					<td style="text-align: right">
						<button type="button" class="btn btn-warning btn-circle" action="modificar" usuario="{$row.encriptado.idUsuario}" title="Modificar"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-danger btn-circle" title="Eliminar"><i class="fa fa-times"></i></button>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>