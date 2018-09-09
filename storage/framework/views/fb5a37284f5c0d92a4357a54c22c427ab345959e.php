<?php $__env->startSection('content'); ?>
 
 <h2>Manage Events</h2>
    <hr/>
    <a class="btn btn-primary" href="/events/create" style="margin-bottom: 15px;">Create New</a>

    <?php if(Session::has('message')): ?>
    <div class="alert-custom <?php echo e(Session::get('alert-class', 'alert-info')); ?>">
        <p><strong>Success:</strong><?php echo Session('message'); ?></p>
    </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="padding-left: 15px;">#</th>
            <th>User Name</th>
            <th>Events</th>
            <th width="10px;">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
            <tr>
                <form action="/events/assign-events" method="post">
                <td style="padding-left: 15px;"><?php echo $key+1; ?></td>
                <td><?php echo $user->name; ?></td>
                <?php echo e(Form::hidden('id', $user->id)); ?>

                <td>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="checkbox" <?php echo e($user->hasEvent($event->event_name) ? 'checked' : ''); ?> name="event_<?php echo $event->event_name; ?>"><?php echo $event->event_name; ?></br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                      <?php echo e(csrf_field()); ?>

                    <button type="submit" class = 'btn btn-primary pull-right'>Assign Events</button></td>
                
                </form>
            </tr>
         
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>