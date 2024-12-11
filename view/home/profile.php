<div class="row">
	<div class="col-md-2">
		<address>
			<img src="" alt="Avatar" width="100" id="img_avatar" class="img-circle"><br><br>
			<p>
				<strong>
					<span id="lbl_name"></span>
				</strong>
				<br>
				<em>
					<a href="" id="link_alias">
						<span id="lbl_alias"></span>
					</a>
				</em>
				<br>
				<span id="lbl_city"></span>
				<br>
				<abbr title="Phone">P:</abbr> 
				<span id="lbl_phone"></span>
				<br>
				<a href="" id="link_email">
					<span id="lbl_email"></span>
				</a>
			</p>
		</address>
	</div>
	<div class="col-md-8">
		<h2>Mi galería</h2><br>
		<a onclick="$('#modalUpload').modal()" data-target="#modalUpload" class="pointer">Subir</a>
		<div class="separator"></div>
		<a href="javascript:console.log('Hola')">Recomendado</a>
		<div class="separator"></div>
		<a href="javascript:console.log('Hola')">Papelera</a>
		<br>
		<br>
		<table class="table">
		<thead> 
			<tr> 
				<th>Ítem</th> <th>Nombre</th> <th>Tamaño</th> <th>Fecha de subida</th> <th>Formato</th> <th>Tareas</th>
			</tr> </thead> 
		<tbody id="tbl_images"> 
			
		</tbody>
		</table>		
	</div>
</div>

<!-- Modal Upload -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalUpload">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sube y comparte tus fotos!</h4>
      </div>
      <div class="modal-body">
        <div id="fileuploader">Upload</div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" onclick="objUpload.startUpload();">Subir imagen</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal ver -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalVer">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="title_ver"></h4>
      </div>
      <div class="modal-body">
        <img src="" alt="Cargando..." id="img_ver" width="565">
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Editar -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cambiar nombre</h4>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="txt_editar_nombre" image="0">
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="guardar_editado()">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->