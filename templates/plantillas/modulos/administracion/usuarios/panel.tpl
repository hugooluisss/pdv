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
			</tr>
		</thead>
		<tbody>
			{foreach item=row from=$usuarios}
				<tr>
					<td>{$row.nick}</td>
					<td>{$row.nombre}</td>
					<td>{$row.alta|default:"No se indicó"}</td>
					<td>{$row.ultimoacceso}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>