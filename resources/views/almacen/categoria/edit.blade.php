@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar categoría: <kbd class="bg-primary">{{$categoria->nombre}}</kbd></h3>
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors -> all() as $error)
					<li>
						{{$errors}}
					</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($categoria,['method'=>'PATCH','route'=>['almacen.categoria.update', $categoria->idcategoria]])!!}
			{{Form::token()}}
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}" placeholder="Nombre..">
				</div>
				<div class="form-group">
					<label for="descripcion">Descripciín</label>
					<input type="text" name="descripcion" class="form-control" value="{{$categoria->descripcion}}" placeholder="Descripción..">
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<button class="btn btn-danger btn-block" type="reset"><i class="fa fa-refresh" aria-hidden="true"></i></button>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<button href="almacen/categoria" class="btn btn-success btn-block"><i class="fa fa-reply" aria-hidden="true"></i></button>
					</div>	
				</div>
				<!-- <div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar
				</div> -->
			{!!Form::close()!!}
		</div>
	</div>
@endsection