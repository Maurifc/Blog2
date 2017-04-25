@extends('layouts.admin')

@section('content')
<div class="container marginTop">
	<div class="row">
		<div class="col-xs-12">
			<div class="well well-small">
				<h4>{{ $dados['tituloPagina'] }}</h4>
			</div>
		</div>
	</div>
	<form enctype="multipart/form-data" method="POST" action="{{ $dados['rotaForm'] }}">
    {{ csrf_field() }}

		@if(!isset($imagem))
		<div class="row">
			<div class="col-xs-3">
					<strong>Selecione uma imagem:</strong>
			</div>
			<div class="col-xs-9">
					<input type="file" name="imagem" required/>
					<input type="hidden" name="MAX_FILE_SIZE" value="1000" />
			</div>
		</div>
		@endif

		<div class="row marginTop">
			<div class="col-xs-3">
					<strong>Legenda da imagem:</strong>
			</div>
			<div class="col-xs-9">
					<input type="text" name="legenda" class="col-xs-12 form-control" value="{{ isset($imagem) ? $imagem->legenda : ''}}" required autofocus />
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-3">
					<strong>Imagem destaque?</strong>
			</div>
			<div class="col-xs-9">
					<label>
						<input type="radio" name="imagemDestaque" value="0" {{ !isset($imagem) || $imagem->imagemDestaque === 0 ? 'checked' : ''}}> Não
					</label>
					<label>
						<input type="radio" name="imagemDestaque" value="1" {{ (isset($imagem) && $imagem->imagemDestaque === 1 ) ? 'checked' : ''}}> Sim
					</label>
			</div>
		</div>

		<div class="row marginTop">
			<div class="col-xs-2">
					<input type="submit" value="{{ $dados['labelSubmmit'] }}" class="btn btn-primary btn-large" />
			</div>
		</div>
	</form>
  <br>
  <br>
</div>
@endsection
