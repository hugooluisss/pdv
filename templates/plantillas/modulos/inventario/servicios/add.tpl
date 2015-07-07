<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Agregar o modificar servicio</h1>
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
					<input class="form-control" id="txtCodigo" type="text" name="txtCodigo" autocomplete="off" autofocus="true" value="{$servicio->getCodigo()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtNombre" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-7">
					<input class="form-control" id="txtNombre" type="text" name="txtNombre" autocomplete="off" value="{$servicio->getNombre()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDescripcion" class="col-lg-2 control-label">Descripción</label>
				<div class="col-lg-6">
					<textarea rows="3" class="form-control" id="txtDescripcion" name="txtDescripcion">{$servicio->getDescripcion()}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="txtPU" class="col-lg-2 control-label">Precio unitario</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtPU" type="text" name="txtPU" autocomplete="off" value="{$servicio->getPrecio()|default:"0.00"}" style="text-align: right"/>
				</div>
			</div>
			<hr />
			<h2>Impuesto</h2>
			<div class="form-group">
				<label for="selImpInc" class="col-lg-2 control-label">¿Impuesto incluido?</label>
				<div class="col-lg-10">
					<select id="selImpInc" name="selImpInc">
						<option value="S" {if $servicio->isImpInc()}selected{/if}>Si
						<option value="N" {if !$servicio->isImpInc()}selected{/if}>No
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="selImpuesto" class="col-lg-2 control-label">% impuesto</label>
				<div class="col-lg-2">
					<select id="selImpuesto" name="selImpuesto">
					{for $imp=0 to 100}
						<option value="{$imp/100}" {if $imp/100 eq $servicio->getImpuesto()}selected{/if}>{$imp}
					{/for}
					</select>
				</div>
			</div>
			<br />
			<button type="submit" class="btn btn-default">Guardar</button>
			<input type="reset" class="btn btn-default" id="btnReset" value="Cancelar"/>
			<input type="hidden" value="{$servicio->getId()}" id="id"/>
		</form>
	</div>
</div>