<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
      <h4>Sobre</h4>
      <p>Fale um pouco sobre você</p>
    </div>
    <div class="sidebar-module">
      <h4>Categorias</h4>

      <ol class="list-unstyled">
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('post.categoria', $categoria->id)); ?>"><?php echo e($categoria->titulo); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('post.index')); ?>">Todas</a></li>
      </ol>
    </div>
</div><!-- /.blog-sidebar -->
