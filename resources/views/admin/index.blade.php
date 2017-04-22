@extends('layouts.admin')

@section('content')
<div class="container marginTop">
    <div class="row">
        <div class="col-xs-12">

            @if(Session::has('flash_message'))
                <div class="alert {{ Session::get('flash_message')['class'] }}marginTop">
                    <strong>{{ Session::get('flash_message')['msg']}}</strong>
                </div>
            @endif

            <a href="{{route('admin.cadastrar.post')}}" class="btn btn-primary btn-large">Cadastrar novo post</a>

            <table class="table table-striped table-bordered table-hover marginTop">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th width="200">Data/Hora</th>
                        <th width="40"></th>
                        <th width="40"></th>
                        <th width="40"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->titulo }}</td>
                            <td>{{$post->dataFantasia}}</td>
                            <td>
                                <a href="{{ route('admin.alterar.post', $post->id) }}" class="btn btn-primary">Alterar</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir o registro?')">Excluir</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-info">Imagens</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection
