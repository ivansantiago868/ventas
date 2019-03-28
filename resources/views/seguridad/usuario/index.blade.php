@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-x-12">
			<h3>Usuarios <a href="usuario/create"><button class="btn btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i></button></a></h3>
			@include('seguridad.usuario.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="table-resposive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Correo electrónico</th>
						<th>Opciones</th>
					</thead>
					@foreach ($usuarios as $usu)
					<tr>
						<td>{{ $usu->id }}</td>
						<td>{{ $usu->name }}</td>
						<td>{{ $usu->email }}</td>
						<td>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger btn-block"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
							</div>
							</div>
						</td>
					</tr>
					@include('seguridad.usuario.modal')
					@endforeach
				</table>
			</div>
			{{$usuarios->render()}}
		</div>
	</div>
@endsection