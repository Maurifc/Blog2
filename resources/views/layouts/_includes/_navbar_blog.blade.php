@php
  $aba = isset($dados['aba']) ? $dados['aba'] : 0;
@endphp
<a class="blog-nav-item {{ $aba  === 0 ? 'active' : ''}}" href="{{ route('post.index') }}">Inicial</a>
<a class="blog-nav-item {{ $aba  === 1 ? 'active' : ''}}" href="{{ route('contato.form') }}">Fale Conosco</a>
