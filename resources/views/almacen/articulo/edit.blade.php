@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar artículo: <kbd class="bg-primary">{{$articulo->nombre}}</kbd></h3>
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
		</div>
	</div>

{!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update', $articulo->idarticulo],'files'=>'true'])!!}
{{Form::token()}}
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Categoría</label>
				<select name='idcategoria' class="form-control">
					@foreach ($categorias as $cat)
						@if($cat->idcategoria == $articulo->idcategoria)
						<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
						@else
						<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>						
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="codigo">Código</label>
				<input type="text" name="codigo" required value="{{$articulo->codigo}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="stock">Stock</label>
				<input type="text" name="stock" required value="{{$articulo->stock}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" required value="{{$articulo->descripcion}}" class="form-control" placeholder="Descripción del articulo..">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="imagen">Imágen</label>
				<input type="file" name="imagen" class="form-control">
				@if (($articulo->imagen)!="")
				<img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height='300px' width='300px'>
				@endif
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<button class="btn btn-danger btn-block" type="reset"><i class="fa fa-refresh" aria-hidden="true"></i></button>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<button href="almacen/articulo" class="btn btn-success btn-block"><i class="fa fa-reply" aria-hidden="true"></i></button>
				</div>	
		</div>
		</div>
	</div>
{!!Form::close()!!}
@endsection