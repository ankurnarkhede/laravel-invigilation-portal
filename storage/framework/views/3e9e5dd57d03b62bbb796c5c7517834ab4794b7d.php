

<?php if(count($errors)>0): ?>
    <div>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(Session::has('msg')): ?>
    <div>
        <p>
            <?php echo e(Session::get('msg')); ?>


        </p>
    </div>
<?php endif; ?>

<?php if(Session::has('result')): ?>
    <div>
        <p>

            <?php echo e(Session::get('result')); ?>

        </p>
    </div>
<?php endif; ?>