@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-offset-4 col-xs-4">
				<div class="alert alert-info">
					Efetue login para acessar o sistema
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-offset-4 col-xs-4">
				<div class="well well-small">

				<form role="form" method="POST" action="{{ route('admin.doLogin')}}">
          {{ csrf_field() }}

				  <div class="form-group">
					<label for="usuario">Usuário</label>
					<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Informe usuário" required>
				  </div>
				  <div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" name="senha" placeholder="Informe sua senha">
				  </div>
				  <button type="submit" class="btn btn-default">Acessar o sistema</button>
				</form>

				</div>
			</div>
		</div>
	</div>

@endsection
