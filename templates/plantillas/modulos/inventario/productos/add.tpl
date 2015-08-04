<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Agregar o modificar producto</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 errores">
		<ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtCodigo" class="col-lg-2 control-label">Código</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtCodigo" type="text" name="txtCodigo" autocomplete="off" autofocus="true" value="{$producto->getCodigo()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtNombre" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-7">
					<input class="form-control" id="txtNombre" type="text" name="txtNombre" autocomplete="off" value="{$producto->getNombre()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDescripcion" class="col-lg-2 control-label">Descripción</label>
				<div class="col-lg-6">
					<textarea rows="3" class="form-control" id="txtDescripcion" name="txtDescripcion">{$producto->getDescripcion()}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="selDepartamento" class="col-lg-2 control-label">Departamento</label>
				<div class="col-lg-10">
					<select id="selDepartamento" name="selDepartamento">
						{foreach item=row from=$departamentos}
							<option value="{$row.idDepartamento}" {if $producto->getIdDepartamento() eq $row.idDepartamento}selected{/if}>{$row.nombre}
						{/foreach}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtMarca" class="col-lg-2 control-label">Marca</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtMarca" type="text" name="txtMarca" autocomplete="off" value="{$producto->getMarca()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtPU" class="col-lg-2 control-label">Precio unitario</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtPU" type="text" name="txtPU" autocomplete="off" value="{$producto->getPrecio()|default:"0.00"}" style="text-align: right"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtMinimo" class="col-lg-2 control-label">Inventario mínimo</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtMinimo" type="text" name="txtMinimo" autocomplete="off" value="{$producto->getMinimo()|default:"0"}" style="text-align: right"/>
				</div>
			</div>
			<hr />
			<h2>Impuesto</h2>
			<div class="form-group">
				<label for="selImpInc" class="col-lg-2 control-label">¿Impuesto incluido?</label>
				<div class="col-lg-10">
					<select id="selImpInc" name="selImpInc">
						<option value="S" {if $producto->isImpInc()}selected{/if}>Si
						<option value="N" {if !$producto->isImpInc()}selected{/if}>No
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="selImpuesto" class="col-lg-2 control-label">% impuesto</label>
				<div class="col-lg-2">
					<select id="selImpuesto" name="selImpuesto">
					{for $imp=0 to 100}
						<option value="{$imp/100}" {if $imp/100 eq $producto->getImpuesto()}selected{/if}>{$imp}
					{/for}
					</select>
				</div>
			</div>
			<hr />
			<h2>Costeo</h2>
			<div class="form-group">
				<label for="selCosteo" class="col-lg-2 control-label">Costeo</label>
				<div class="col-lg-10">
					<select id="selCosteo" name="selCosteo">
						{foreach item=row from=$tipoCosteo}
							<option value="{$row.idTipoCosteo}" {if $producto->getIdTipoCosteo() eq $row.idTipoCosteo}selected{/if}>{$row.nombre}
						{/foreach}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCosto" class="col-lg-2 control-label">Costo</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtCosto" type="text" name="txtCosto" autocomplete="off" value="{$producto->getCosto()|default:"0.00"}" style="text-align: right"/>
				</div>
			</div>
			<br />
			<button type="submit" class="btn btn-default">Guardar</button>
			<input type="reset" class="btn btn-default" id="btnReset" value="Cancelar"/>
			<input type="hidden" value="{$producto->getId()}" id="id"/>
		</form>
	</div>
</div>