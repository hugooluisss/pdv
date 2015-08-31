<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Venta</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<a href="?mod=venta"><button type="button" class="btn btn-success btn-circle btn-xl" id="btnAdd"><i class="fa fa-plus"></i></button></a>
	</div>
</div>
<br />
<div class="col-lg-12">
	<table id="tblOrdenes" class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Fecha</th>
				<th>Cliente</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			{foreach item=row from=$datos}
				<tr>
					<td>{$row->getFecha()}</td>
					<td>{$row->getClave()}</td>
					<td>{$row->proveedor->getNombre()}</td>
					<td style="text-align: right">
						{if $row->getEstado() neq 'A'}
						<button type="button" class="btn btn-warning btn-circle" action="modificar" orden="{$row->getId()}" title="Modificar"><i class="fa fa-pencil"></i></button>
						<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" orden="{$row->getId()}"><i class="fa fa-times"></i></button>
						{/if}
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>