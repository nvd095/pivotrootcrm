<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Howdy, <?php echo e(Auth::user()->name); ?> </div></br>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(isset(Auth::user()->events)): ?>
                    Events assigned to you are:
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="padding-left: 15px;">#</th>
                        <th>Event Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        <?php $__currentLoopData = Auth::user()->events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr><td><?php echo $key+1; ?></td>
                        
                        <td><?php echo $event->event_name; ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>