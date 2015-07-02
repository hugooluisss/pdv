<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Agregar o modificar usuario</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 errores">
		<ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-5">
		<form role="form" id="frmAdd" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="selTipo">Usuario</label>
				<select id="selTipo" name="selTipo" class="form-control" autofocus="true">
					{foreach from=$tipos item=el}
						<option value="{$el.idTipoUsuario}" {if $user->getIdTipo() eq $el.idTipoUsuario}selected{/if}>{$el.nombre}
					{/foreach}
				</select>
			</div>
			<div class="form-group">
				<label for="txtUsuario">Usuario</label>
				<input class="form-control" id="txtUsuario" name="txtUsuario" autocomplete="off" value="{$user->getNick()}">
				<p class="help-block hide" id="valUsuario">Validando usuario</p>
			</div>
			
			<div class="form-group">
				<label for="txtEmail">Correo electrónico</label>
				<input class="form-control" id="txtEmail" name="txtEmail" autocomplete="off" type="email" value="{$user->getEmail()}">
				<p class="help-block hide" id="valUsuario">Validando dirección de correo electrónico</p>
			</div>
			
			<div class="form-group">
				<label for="txtPass">Contraseña</label>
				<input class="form-control" type="password" id="txtPass" name="txtPass">
			</div>
			<div class="form-group">
				<label for="txtConfirmar">Confirmar</label>
				<input class="form-control" type="password" id="txtConfirmar" name="txtConfirmar">
			</div>
			<div class="form-group">
				<label for="txtNombre">Propietario</label>
				<input class="form-control" id="txtNombre" name="txtNombre" autocomplete="off" value="{$user->getNombre()}">
			</div>
			
			<button type="submit" class="btn btn-default">Guardar</button>
			<input type="reset" class="btn btn-default" id="btnReset" value="Cancelar"/>
			<input type="hidden" value="{$user->getId()}" id="id"/>
		</form>
	</div>
</div>