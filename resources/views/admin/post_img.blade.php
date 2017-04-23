@extends('layouts.admin')

@section('content')
<div class="container marginTop">
	<div class="row">
		<div class="col-xs-12">
			<a href="#" class="btn btn-primary btn-large">Cadastrar nova imagem</a>

			<table class="table table-striped table-bordered table-hover marginTop">
				<thead>
					<tr>
						<th width="40">Imagem</th>
						<th>Legenda</th>
						<th width="40"></th>
						<th width="40"></th>
					</tr>
				</thead>
				<tbody>

					@foreach($post->imagens as $imagem)
					<tr>
						<td><img src="{{$imagem->urlThumb()}}" width="100%" /></td>
						<td>{{$imagem->legenda}}</td>
						<td>
							<a href="#" class="btn btn-primary">Alterar</a>
						</td>
						<td>
							<a href="#" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir o registro?')">Excluir</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>
@endsection
