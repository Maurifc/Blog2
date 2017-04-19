<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

  </head>
  <body>
  <!--Barra de navegação -->
  @include('layouts._includes._navbar_admin');


	<div class="container">
		<div class="blog-header">
			<h1 class="blog-title">{{ config('app.name') }}</h1>
			<p class="lead blog-description">Remake do Blog do curso de PHP da DevMedia</p>
		</div>
	</div>

  @yield('content')

	 <div class="blog-footer">
		<p>Rodapé da pagina</p>
	 </div>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
