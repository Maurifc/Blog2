<?php 
  $aba = isset($dados['aba']) ? $dados['aba'] : 0;
 ?>
<a class="blog-nav-item <?php echo e($aba  === 0 ? 'active' : ''); ?>" href="<?php echo e(route('post.index')); ?>">Inicial</a>
<a class="blog-nav-item <?php echo e($aba  === 1 ? 'active' : ''); ?>" href="<?php echo e(route('contato.form')); ?>">Fale Conosco</a>
