<li class="nav-item">
    <a class="nav-link"<?php echo e(request()->routeIs('Home')?'active':''); ?> href="<?php echo e(route('Home')); ?>">Main</a>
</li>
<li class="nav-item">
    <a class="nav-link"href="/about">About us</a>
</li>
<li class="nav-item">
    <a class="nav-link" <?php echo e(request()->routeIs('news.index')?'active':''); ?> href="<?php echo e(route('news.index')); ?>">News</a>
</li>
<li class="nav-item">
    <a class="nav-link" <?php echo e(request()->routeIs('news.category.index')?'active':''); ?> href="<?php echo e(route('news.category.index')); ?>">Categories</a>
</li>
<li class="nav-item">
    <a class="nav-link" <?php echo e(request()->routeIs('admin.news.index') ?'active':''); ?> href="<?php echo e(route('admin.news.index')); ?>">AdminBorder</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('vklogin')); ?>">VK login</a>
</li>
<?php /**PATH C:\Users\Пользователь\Documents\GitHub\PHP-junior\resources\views/menu.blade.php ENDPATH**/ ?>