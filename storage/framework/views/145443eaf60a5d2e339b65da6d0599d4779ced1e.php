<?php $__env->startSection('content'); ?>

    <h2>Update Data</h2>
    <hr/>
    <a class="btn btn-primary" href="/admin/roles" style="margin-bottom: 15px;">Read Data</a>

    <?php echo Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => 'admin/roles/update/' . $roles->id ]); ?>

    <div class="form-group">
        <?php echo Form::label('name', 'Name');; ?>

        <?php echo Form::text('name', $roles->name , ['required' => 'required','placeholder' => 'Enter name', 'class' => 'form-control']);; ?>

    </div>

    <div class="form-group">
        <?php echo Form::label('description', 'Description'); ?>

        <?php echo Form::text('description', $roles->description, ['required' => 'required','placeholder' => 'Enter description', 'class' => 'form-control']);; ?>

    </div>


    <?php echo Form::submit('Update', ['class' => 'btn btn-primary pull-right']);; ?>


    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>