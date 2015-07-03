<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Agregar o modificar proveedor</h1>
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
				<label for="txtEmpresa" class="col-lg-2 control-label">Nombre de la empresa</label>
				<div class="col-lg-10">
					<input class="form-control" id="txtEmpresa" type="text" name="txtEmpresa" autocomplete="off" value="{$proveedor->getEmpresa()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-lg-2 control-label">Dirección</label>
				<div class="col-lg-10">
					<input class="form-control" id="txtDireccion" type="text" name="txtDireccion" autocomplete="off" value="{$proveedor->getDireccion()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCiudad" class="col-lg-2 control-label">Ciudad</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtCiudad" type="text" name="txtCiudad" autocomplete="off" value="{$proveedor->getCiudad()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtEstado" class="col-lg-2 control-label">Estado</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtEstado" type="text" name="txtEstado" autocomplete="off" value="{$proveedor->getEstado()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtTelefono" class="col-lg-2 control-label">Teléfono</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtTelefono" type="text" name="txtTelefono" autocomplete="off" placeholder="Teléfono" value="{$proveedor->getTelefono()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCuenta" class="col-lg-2 control-label">Cuenta bancaria</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtCuenta" type="text" name="txtCuenta" autocomplete="off" placeholder="Cuenta bancaria" value="{$proveedor->getCuenta()}"/>
				</div>
			</div>
			<hr />
			<h2>Contacto</h2>
			<div class="form-group">
				<label for="txtNombre" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtNombre" type="text" name="txtNombre" autocomplete="off" value="{$proveedor->getNombre()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtPuesto" class="col-lg-2 control-label">Puesto</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtNombre" type="text" name="txtPuesto" autocomplete="on" value="{$proveedor->getPuesto()}"/>
				</div>
			</div>
			<hr />
			<div class="form-group">
				<label for="txtComentarios" class="col-lg-2 control-label">Comentarios</label>
				<div class="col-lg-6">
					<textarea rows="3" class="form-control" id="txtComentarios" name="txtComentarios">{$proveedor->getComentarios()}</textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-default">Guardar</button>
			<input type="reset" class="btn btn-default" id="btnReset" value="Cancelar"/>
			<input type="hidden" value="{$proveedor->getId()}" id="id"/>
		</form>
	</div>
</div>