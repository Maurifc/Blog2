@extends('layouts.admin')

@section('content')
<div class="container marginTop">
	<form method="POST" action="{{ $dados['rota'] }}">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-xs-2">
					<strong>Nome da categoria</strong>
			</div>
			<div class="col-xs-10 {{ $errors->has('titulo') ? 'has-error' : ''}}">
					<input type="text" name="titulo" class="col-xs-12 form-control" value="{{ $categoria->titulo or '' }}" autofocus required/>
					@if($errors->has('titulo'))
						<span class="helper-block">
							<strong>{{ $errors->first('titulo') }}</strong>
						</span>
					@endif
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-2">
					<input type="submit" value="{{ $dados['botaoSubmit']}}" class="btn btn-primary btn-large" />
			</div>
		</div>
	</form>
</div>
<br/>
<br/>
<br/>
@endsection
