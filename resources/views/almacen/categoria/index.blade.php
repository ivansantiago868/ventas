@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-x-12">
			<h3>Categorías <a href="categoria/create"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></a></h3>
			@include('almacen.categoria.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="table-resposive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Opciones</th>
					</thead>
					@foreach ($categorias as $cat)
					<tr>
						<td>{{ $cat->idcategoria }}</td>
						<td>{{ $cat->nombre }}</td>
						<td>{{ $cat->descripcion }}</td>
						<td>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}"><button class="btn btn-info btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal"><button class="btn btn-danger btn-block"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
							</div>
							</div>
						</td>
					</tr>
					@include('almacen.categoria.modal')
					@endforeach
				</table>
			</div>
			{{$categorias->render()}}
		</div>
	</div>
@endsection