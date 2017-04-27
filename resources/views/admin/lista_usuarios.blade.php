@extends('layouts.admin')

@section('content')
<div class="container marginTop">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{route('admin.cadastrar.usuario')}}" class="btn btn-primary btn-large">Cadastrar novo usuário</a>

            <table class="table table-striped table-bordered table-hover marginTop">
                <thead>
                    <tr>
                        <th>Login</th>
                        <th>Nome Completo</th>
                        <th>E-mail</th>
                        <th width="40"></th>
                        <th width="40"></th>
                        <th width="40"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->nomeCompleto }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <a href="{{ route('admin.alterar.usuario', $usuario->id) }}" class="btn btn-primary">Alterar</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.alterar.senha.usuario', $usuario->id) }}" class="btn btn-primary">Alterar Senha</a>
                            </td>
                            <td>
                                <a href="javascript:(confirm('Tem certeza que deseja deletar {{ $usuario->name }} ?')) ?
                                    window.location.href='#': void(0)" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection
