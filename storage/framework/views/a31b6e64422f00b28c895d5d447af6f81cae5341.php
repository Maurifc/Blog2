<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo e($post->titulo); ?></h2>
                <p class="blog-post-meta"><?php echo e($post->dataFantasia); ?> por <?php echo e($post->usuario->nome); ?>. Categoria: <strong><?php echo e($post->categoria->titulo); ?></strong></p>

                <?php if(count($post->imagemDestaque) === 1): ?>
                    <p><img src="<?php echo e(url($post->imagemDestaque[0]->caminhoArquivo)); ?>" width="80%" height="30%"/></p>
                <?php endif; ?>

                <div class="blog-post-text">
                    <?php echo e($post->texto); ?>

                </div>

                <?php if(count($post->imagens()) > 0): ?>
                    <?php $__currentLoopData = $post->imagens(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url($imagem->caminhoArquivo)); ?>" target="_blank">
                            <img src="<?php echo e(url($imagem->caminhoArquivo)); ?>" width="180px" align="center" style="margin:10px;">
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

        <!-- Barra lateral (Sobre e Categorias) -->
        <?php echo $__env->make('layouts._includes._sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div><!-- /.row -->
</div><!-- /.container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>