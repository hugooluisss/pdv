<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Agregar o modificar departamento</h1>
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
				<label for="txtNombre" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-7">
					<input class="form-control" id="txtNombre" type="text" name="txtNombre" autocomplete="off" value="{$depto->getNombre()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDescripcion" class="col-lg-2 control-label">Descripción</label>
				<div class="col-lg-6">
					<textarea rows="3" class="form-control" id="txtDescripcion" name="txtDescripcion">{$depto->getDescripcion()}</textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-default">Guardar</button>
			<input type="reset" class="btn btn-default" id="btnReset" value="Cancelar"/>
			<input type="hidden" value="{$depto->getId()}" id="id"/>
		</form>
	</div>
</div>