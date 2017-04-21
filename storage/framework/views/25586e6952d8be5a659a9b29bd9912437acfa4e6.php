<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/blog.css')); ?>" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>

  </head>
  <body>
    <div class="blog-masthead">
       <div class="container">
         <nav class="blog-nav">
            <?php echo $__env->make('layouts._includes._navbar_blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
         </nav>
       </div>
     </div>

	<div class="container">
		<div class="blog-header">
			<h1 class="blog-title"><?php echo e(config('app.name')); ?></h1>
			<p class="lead blog-description">Remake do Blog do curso de PHP da DevMedia</p>
		</div>
	</div>

  <?php if(count($errors)): ?>
      <ul>
          <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo $error; ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
  <?php endif; ?>

  <?php echo $__env->yieldContent('content'); ?>

	 <div class="blog-footer">
		<p>Rodapé da pagina</p>
	 </div>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
  </body>
</html>
