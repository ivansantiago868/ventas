@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-x-12">
			<h3>Artículos <a href="articulo/create"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></a></h3>
			@include('almacen.articulo.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="table-resposive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Código</th>
						<th>Categoría</th>
						<th>Stock</th>
						<th>Imágen</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					@foreach ($articulos as $art)
					<tr>
						<td>{{ $art->idarticulo }}</td>
						<td>{{ $art->nombre }}</td>
						<td>{{ $art->codigo }}</td>
						<td>{{ $art->categoria }}</td>
						<td>{{ $art->stock }}</td>
						<td>
							<img src="{{asset('/imagenes/articulos/'.$art->imagen)}}" alt="{{ $art->nombre}}" height="100px" width="100px" class="img-thumbnail">
						</td>	
						<td>{{ $art->estado }}</td>
						<td>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-info btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger btn-block"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
							</div>
						</td>
					</tr>
					@include('almacen.articulo.modal')
					@endforeach
				</table>
			</div>
			{{$articulos->render()}}
		</div>
	</div>
@endsection