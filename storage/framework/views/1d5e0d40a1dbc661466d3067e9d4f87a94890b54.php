<?php $__env->startSection('content'); ?>
 
 <h2>Roles</h2>
    <hr/>
    <a class="btn btn-primary" href="roles/create" style="margin-bottom: 15px;">Create New</a>

    <?php if(Session::has('message')): ?>
    <div class="alert-custom <?php echo e(Session::get('alert-class', 'alert-info')); ?>">
        <p><strong>Success:</strong><?php echo Session('message'); ?></p>
    </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">#</th>
            <th>Name</th>
            <th>Description</th>
            <th width="10px;">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($role->name != "Admin"): ?>
            <tr>
                <td style="padding-left: 15px;"><?php echo $key+1; ?></td>
                <td><?php echo $role->name; ?></td>
                <td><?php echo $role->description; ?></td>
                <td>
                    <a class="btn btn-success btn-sm" href="roles/<?php echo $role->id; ?>/edit">Edit</a>

                    <?php echo Form::open(['id' => 'deleteForm', 'method' => 'DELETE', 'url' => 'admin/roles/delete/' . $role->id]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']); ?>

                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>