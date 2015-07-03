<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Datos de la empresa</h1>
	</div>
</div>
<br />
<div class="col-lg-12">
	<table id="tblUsuarios" class="table table-hover">
		<thead>
			<tr>
				<th>Campo</th>
				<th>Valor</th>
				<th>Descripción</th>
			</tr>
		</thead>
		<tbody>
			{foreach item=row from=$lista}
				<tr>
					<td>{$row.nombre}</td>
					<td><input class="form-control" action="campo" key="{$row.tag}" type="text" value="{$row.valor}" /></td>
					<td>{$row.descripcion}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>