<div class="blog-masthead">
   <div class="container">
     <nav class="blog-nav">
       <a class="blog-nav-item active" href="{{ route('admin.index')}}">Gerenciar Posts</a>
     <a class="blog-nav-item" href="{{route('admin.listar.categorias')}}">Gerenciar Categorias</a>
       <a class="blog-nav-item" href="{{route('admin.listar.usuarios')}}">Gerenciar Usuários</a>
     <a class="blog-nav-item" href="{{ route('admin.logout')}}">Sair</a>

     <div class="pull-right">
     <span class="label label-danger">
       {{ Auth::user()->name }}
     </span>
     </div>
     </nav>
   </div>
 </div>
