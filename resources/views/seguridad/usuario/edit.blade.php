@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar usuario: <kbd class="bg-primary">{{$usuario->name}}</kbd></h3>
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

			{!!Form::model($usuario,['method'=>'PATCH','route'=>['seguridad.usuario.update', $usuario->id]])!!}
			{{Form::token()}}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Nombre</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{$usuario->name}}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">Correo electrónico</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{$usuario->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" value="{{$usuario->password}}">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="control-label">Confirmar contraseña</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$usuario->password}}">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">       
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <button class="btn btn-danger btn-block" type="reset"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <button href="seguridad/usuario" class="btn btn-success btn-block"><i class="fa fa-reply" aria-hidden="true"></i></button>
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