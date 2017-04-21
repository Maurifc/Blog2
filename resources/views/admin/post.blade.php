@extends('layouts.admin')

@section('content')
{{ csrf_field() }}
<div class="container marginTop">
	@if(isset($post))
		<div class="row">
			<div class="col-xs-12">
				<div class="alert alert-info">
					Post criado em {{ $post->dataFantasia }} por {{ $post->usuario->nome }}.
				</div>
			</div>
		</div>
	@endif

	<form method="POST" action="{{ $dados['rota'] }}">
		<div class="row">
			<div class="col-xs-2">
					<strong>Título do post</strong>
			</div>
			<div class="col-xs-10">
					<input type="text" name="posttitulo" class="col-xs-12 form-control" value="{{ $post->titulo or '' }}" autofocus required />
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-2">
					<strong>Data:</strong>
			</div>
			<div class="col-xs-10">
					<input type="text" name="postdata" class="col-xs-12 form-control" value="{{ $post->dataFantasia or '' }}" placeholder="00/00/0000" required />
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-2">
					<strong>Texto Completo:</strong>
			</div>
			<div class="col-xs-10">
				<textarea name="posttexto" class="col-xs-12 form-control">{{ $post->texto or ''}}</textarea>
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-2">
					<strong>Bloqueado?</strong>
			</div>
			<div class="col-xs-10">
				<label>
					<input type="radio" name="postbloqueado" value="1" {{ (isset($post) && $post->bloqueado) ? 'checked' : ''}}> Sim
				</label>
				<label>
					<input type="radio" name="postbloqueado" value="0" {{ !isset($post) ? 'checked' : ''}}> Não
				</label>
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-2">
					<strong>Categoria:</strong>
			</div>
			<div class="col-xs-10">
				<select name="postcategoria" class="form-control">
					@foreach($categorias as $categoria)
						    <option value="{{$categoria->id}}" {{ isset($post) && ($categoria->id === $post->categoria->id) ?
                      'selected="selected"' : '' }} >{{$categoria->titulo}}</option>
					@endforeach
				</select>
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
