@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-x-12">
			<h3>Clientes <a href="cliente/create"><button class="btn btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i></button></a></h3>
			@include('ventas.cliente.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="table-resposive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Tipo de doc.</th>
						<th>Número doc.</th>
						<th>Teléfono</th>
						<th>Correo electrónico</th>
						<th>Opciones</th>
					</thead>
					@foreach ($personas as $per)
					<tr>
						<td>{{ $per->idpersona }}</td>
						<td>{{ $per->nombre }}</td>
						<td>{{ $per->tipo_documento }}</td>
						<td>{{ $per->num_documento }}</td>
						<td>{{ $per->telefono }}</td>
						<td>{{ $per->email }}</td>
						<td>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a href="{{URL::action('ClienteController@edit',$per->idpersona)}}"><button class="btn btn-info btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger btn-block"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
							</div>
						</td>
					</tr>
					@include('ventas.cliente.modal')
					@endforeach
				</table>
			</div>
			{{$personas->render()}}
		</div>
	</div>
@endsection