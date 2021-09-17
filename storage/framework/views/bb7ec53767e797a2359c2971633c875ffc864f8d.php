<?php $__env->startSection('title'); ?>
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8## News
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <p>News</p>
                        <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <h2><?php echo e($item->title); ?></h2>
                        <div class="card-image" style="background-image: url(<?php echo e($item->image ?? asset('storage/bmw.jpg')); ?>)"></div>
                            <?php if(!$item->isPrivate): ?>
                                <a href="<?php echo e(route('news.show', $item->id)); ?>">More details...</a><br>
                             <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>No news here</p>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
    <h3></h3>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Пользователь\Documents\GitHub\PHP-junior\resources\views/news/index.blade.php ENDPATH**/ ?>