<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Agregar o modificar cliente</h1>
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
					<input class="form-control" id="txtNombre" type="text" name="txtNombre" autocomplete="off" value="{$cliente->getNombre()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-lg-2 control-label">Sexo</label>
				<div class="col-lg-10">
					<select id="selSexo" name="selSexo">
						<option value="M" {if $cliente->getSexo() eq 'M'}selected{/if}>Masculino
						<option value="F" {if $cliente->getSexo() eq 'F'}selected{/if}>Femenino
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtTelefono" class="col-lg-2 control-label">Teléfono</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtTelefono" type="text" name="txtTelefono" autocomplete="off" placeholder="Teléfono" value="{$cliente->getTelefono()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtEmail" class="col-lg-2 control-label">Email</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtEmail" type="text" name="txtEmail" autocomplete="off" placeholder="Email" value="{$cliente->getEmail()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-lg-2 control-label">Dirección</label>
				<div class="col-lg-6">
					<textarea rows="3" class="form-control" id="txtDireccion" name="txtDireccion">{$cliente->getDireccion()}</textarea>
				</div>
			</div>
			
			<hr />
			<div class="form-group">
				<label for="txtComentarios" class="col-lg-2 control-label">Comentarios</label>
				<div class="col-lg-6">
					<textarea rows="3" class="form-control" id="txtComentarios" name="txtComentarios">{$cliente->getComentarios()}</textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-default">Guardar</button>
			<input type="reset" class="btn btn-default" id="btnReset" value="Cancelar"/>
			<input type="hidden" value="{$cliente->getId()}" id="id"/>
		</form>
	</div>
</div>