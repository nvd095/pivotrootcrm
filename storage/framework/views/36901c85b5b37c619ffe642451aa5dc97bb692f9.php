<?php $__env->startSection('content'); ?>

    <h2>Create User</h2>
    <hr/>
    <a class="btn btn-primary" href="/admin/users" style="margin-bottom: 15px;">Read Data</a>

    <?php echo Form::open(['id' => 'dataForm', 'url' => '/admin/users/add']); ?>

    <div class="form-group">
        <?php echo Form::label('name', 'Name');; ?>

        <?php echo Form::text('name', null, ['required' => 'required','placeholder' => 'Enter name', 'class' => 'form-control']);; ?>

    </div>

    <div class="form-group">
        <?php echo Form::label('email', 'Email'); ?>

        <?php echo Form::email('email', null, ['required' => 'required' ,'placeholder' => 'Enter Email id', 'class' => 'form-control']);; ?>

    </div>
    
    <div class="form-group">
        <?php echo Form::label('password', 'Password'); ?>

        <?php echo Form::password('password', null, ['required' => 'required' ,'placeholder' => 'Enter passowrd', 'class' => 'form-control']);; ?>

    </div>

    <?php echo Form::submit('Create', ['class' => 'btn btn-primary pull-right']);; ?>


    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>