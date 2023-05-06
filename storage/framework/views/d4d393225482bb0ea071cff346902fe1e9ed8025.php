<?php if($config->blog == '1'): ?>
<?php if(isset($menu->getblogs) && count($menu->getblogs)>0): ?>
<div class="genre-prime-block">
  <div class="container-fluid">
    <h5 class="section-heading"><?php echo e(__('Recently Blog')); ?></h5>
    <div class="genre-prime-slider owl-carousel">
      <?php $__currentLoopData = $menu->getblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($blog->blogs['is_active'] == 1): ?>
      <div class="genre-prime-slide">
        <div class="genre-slide-image  protip" data-pt-placement="outside"
          data-pt-title="#prime-mix-description-block-blog<?php echo e($blog->id); ?>">
          <a href="<?php echo e(url('account/blog/'.$blog->blogs['slug'])); ?>">
            <?php if($blog->blogs->image != null): ?>
            <img data-src="<?php echo e(asset('images/blog/'.$blog->blogs['image'])); ?>" class="img-responsive owl-lazy"
              alt="blog-image">
            <?php else: ?>
            <img data-src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive owl-lazy" alt="blog-image">
            <?php endif; ?>
          </a>
        </div>
        <div id="prime-mix-description-block-blog<?php echo e($blog->id); ?>" class="prime-description-block">
          <h5 class="description-heading"><?php echo e($blog->blogs['title']); ?></h5>
          <ul class="description-list">
            <li><i class="fa fa-clock-o"></i> <?php echo e(date ('d.m.Y',strtotime($blog->blogs['created_at']))); ?></li>
            <li><i class="fa fa-user"></i> <?php echo e($blog->blogs->users['name']); ?></li>
          </ul>
          <div class="main-des">
            <p><?php echo str_limit($blog->blogs->detail, 100); ?></p>
            <a href="<?php echo e(url('account/blog/'.$blog->blogs['slug'])); ?>"><?php echo e(__('Read More')); ?></a>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\halkut.oxs\resources\views/bloghome.blade.php ENDPATH**/ ?>