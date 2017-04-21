@extends('layouts.admin')

@section('content')
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
		{{ csrf_field() }}
		<div class="row">
			<div class="col-xs-2">
					<strong>Título do post</strong>
			</div>
			<div class="col-xs-10 {{ $errors->has('titulo') ? 'has-error' : ''}}">
					<input type="text" name="titulo" class="col-xs-12 form-control" value="{{ $post->titulo or '' }}" autofocus required/>
					@if($errors->has('titulo'))
						<span class="helper-block">
							<strong>{{ $errors->first('titulo') }}</strong>
						</span>
					@endif
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-2">
					<strong>Data:</strong>
			</div>
			<div class="col-xs-10 {{ $errors->has('dataFantasia') ? 'has-error' : ''}}">
					@php
						if(isset($post)){
							$data = new DateTime($post->dataFantasia);
						} else {
							$data = new DateTime('');
						}
					@endphp
					<input type="text" name="dataFantasia" class="col-xs-12 form-control" value="{{ $data->format('d/m/Y H:i') }}" placeholder="00/00/0000 00:00" required/>
					@if($errors->has('dataFantasia'))
						<span class="helper-block">
							<strong>{{ $errors->first('dataFantasia') }}</strong>
						</span>
					@endif
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-2">
					<strong>Texto Completo:</strong>
			</div>
			<div class="col-xs-10 {{ $errors->has('texto') ? 'has-error' : ''}}">
				<textarea name="texto" class="col-xs-12 form-control" required>{{ $post->texto or ''}}</textarea>
				@if($errors->has('texto'))
					<span class="helper-block">
						<strong>{{ $errors->first('texto') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-2">
					<strong>Bloqueado?</strong>
			</div>
			<div class="col-xs-10">
				<label>
					<input type="radio" name="bloqueado" value="1" {{ (isset($post) && $post->bloqueado) ? 'checked' : ''}}> Sim
				</label>
				<label>
					<input type="radio" name="bloqueado" value="0" {{ !isset($post) ? 'checked' : ''}}> Não
				</label>
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-2">
					<strong>Categoria:</strong>
			</div>
			<div class="col-xs-10">
				<select name="categoria" class="form-control">
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
