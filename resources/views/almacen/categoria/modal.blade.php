<div class="modal fade modal-slide-in-right" aria-hidde="true" role="dialog" tabindex="-1" id="modal-delete-{{$cat->idcategoria}}" >
	{{Form::Open(array('action'=>array('CategoriaController@destroy', $cat->idcategoria), 'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar categoría</h4>
			</div>
			<div class="modal-body">
				<p>¿Desea eliminar la categoría?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>