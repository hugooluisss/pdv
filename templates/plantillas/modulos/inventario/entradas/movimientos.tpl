<table id="tblMovimientos" class="table table-hover">
	<thead>
		<tr>
			<th>Código</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>P. U.</th>
			<th>Total</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		{foreach item=row from=$datos}
			<tr>
				<td>{$row->item->getCodigo()}</td>
				<td>{$row->item->getNombre()|truncate:50}</td>
				<td style="text-align: right;">{$row->getCantidad()|string_format:"%d"}</td>
				<td style="text-align: right;">{$row->getPrecio()|string_format:"%.2f"}</td>
				<td style="text-align: right;">{($row->getCantidad() * $row->getPrecio())|string_format:"%.2f"}</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-danger btn-circle" action="eliminar" title="Eliminar" movimiento="{$row->getId()}"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>