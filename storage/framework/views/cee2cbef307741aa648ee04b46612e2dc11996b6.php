<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-8 blog-main">

			<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php 
					$postLink = route('post.mostrar', $post->id);
				 ?>
				<div class="blog-post">
				    <a href="<?php echo e($postLink); ?>">
							<h2 class="blog-post-title"><?php echo e($post->titulo); ?></h2>
						</a>
						<p class="blog-post-meta"><?php echo e($post->dataFantasia); ?> por
												<?php echo e($post->usuario->name); ?>. Categoria:
															<strong><?php echo e($post->categoria->titulo); ?></strong></p>

						<?php if(count($post->imagemDestaque) === 1): ?>
							<a href="<?php echo e($postLink); ?>">
								<p><img src="<?php echo e(url($post->imagemDestaque[0]->url())); ?>"
										 															width="80%" height="30%"/></p>
							</a>
				    <?php endif; ?>

						<div class="blog-post-text">
								<?php echo e(str_limit($post->texto, $limit = 150, $end = '...')); ?>


								<a href="<?php echo e($postLink); ?>">Ler mais</a>
						</div>
					</a>
			  </div>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<div align="left">
		    	<?php echo $posts->links(); ?>

			</div>
		</div><!-- /.blog-main -->

		<!-- Barra lateral (Sobre e Categorias) -->
		<?php echo $__env->make('layouts._includes._sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</div><!-- /row -->
</div><!-- /container-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>