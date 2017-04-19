<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <form role="form" action="<?php echo e(route('contato.enviaremail')); ?>" method="post" >
            <div class="col-lg-6">
              <?php echo e(csrf_field()); ?>


                <?php if(Session::Has('flash_message')): ?>
                  <div class="alert <?php echo e(Session::get('flash_message')['class']); ?>">
                    <?php echo e(Session::get('flash_message')['msg']); ?>

                  </div>
                <?php endif; ?>

                <div class="well well-sm">
                    <strong>* = Campo obrigatório</strong>
                </div>

                <div class="form-group <?php echo e($errors->has('nome') ? 'has-error' : ''); ?>">
                    <label for="InputName">Seu nome:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nome" placeholder="Digite o seu nome" required>
                        <span class="input-group-addon">*</span>
                    </div>
                    <?php if($errors->has('nome')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('nome')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <label for="InputEmail">Seu e-mail:</label>
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" placeholder="Digite o seu e-mail" required>
                        <span class="input-group-addon">*</span>
                    </div>
                    <?php if($errors->has('email')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('mensagem') ? 'has-error' : ''); ?>">
                    <label for="InputMessage">Mensagem:</label>
                    <div class="input-group">
                        <textarea name="mensagem" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon">*</span>
                    </div>
                    <?php if($errors->has('mensagem')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('mensagem')); ?></strong>
                      </span>
                    <?php endif; ?>
                </div>
                <input type="submit" name="submit" id="submit" value="Enviar" class="btn btn-info">
            </div>
        </form>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>