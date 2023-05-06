
<?php $__env->startSection('title',__('Backup Manager')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
	    <h4 class="page-title"><?php echo e(__('Database Backup')); ?></h4>
	    <div class="breadcrumb-list">
	        <ol class="breadcrumb">
	          <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
	          <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Database Backup')); ?></li>
	        </ol>
	    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar"> 
    <div class="row">
		<?php if($errors->any()): ?>
		<div class="alert alert-danger" role="alert">
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
					<span aria-hidden="true" style="color:red;">&times;</span></button></p>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<?php endif; ?>
		<div class="col-lg-12">
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="box-title"><?php echo e(__('Database Backup Manager')); ?></h5>
				</div>
				<div class="card-body ml-2">
					<form action="<?php echo e(route('admin.backup.path')); ?>" method="POST">
						<?php echo csrf_field(); ?>

						<div class="col-md-6">
							<label for=""><?php echo e(__('MySQL Dump Path:')); ?></label>
							<div class="input-group">
								<input name="DUMP_BINARY_PATH" required type="text" class="form-control"
									placeholder="/usr/bin/mysql/mysql-5.7.24-winx64/bin" value="<?php echo e(env('BINARY_PATH') ? env('BINARY_PATH') : ''); ?>" aria-describedby="basic-addon2">
								<span class="input-group-addon" id="basic-addon2">
									<button type="submit" class="btn btn-primary" title="<?php echo e(__('Save!')); ?>"><?php echo e(__('Save!')); ?></button>
								</span>
							</div>
						</div>
						<div class="col-md-12">
							<br>
							<div class="card bg-primary-rgba m-b-30">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="text-primary process-fonts"><i class="fa fa-primary-circle"></i>
											<?php echo e(__('Important Note for MySQL Dump Path :')); ?>


											<ul class="process-font">
												<li>
													<?php echo e(__('Usually in all hosting dump path for MYSQL is /usr/bin')); ?>

												</li>

												<li>
													<?php echo e(__('If that path not work than contact your hosting provider with
													subject "What is my
													MYSQL DUMP Binary path ?"')); ?>'
												</li>
												<li>
													<?php echo e(__('Enter the path without')); ?> <b> <?php echo e(__('mysqldump')); ?></b><?php echo e(__(' in path')); ?>

												</li>
											</ul>


										</div>
									</div>
								</div>
							</div>
						</div>

					</form>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 p-1 mb-2 bg-danger text-white rounded">
								<i class="fa fa-info-circle"></i> <?php echo e(__('Note:')); ?>

								<ul>
									<li>
										<?php echo e(__('It will generate only database backup of your site.')); ?>

									</li>

									<li>
										<b><?php echo e(__('Download URL is valid only for 1 minute.')); ?></b>
									</li>

									<li>
										<?php echo e(__('Make sure')); ?> <b> <?php echo e(__('mysql dump is enabled on your server')); ?> </b> <?php echo e(__(' for database backup and
										before run
										this or
										run only database backup command make sure you save the mysql dump path in')); ?>

										<b> <?php echo e(__('config/database.php')); ?></b>.
									</li>
								</ul>
							</div>
						</div>

						<div class="col-md-6">
							<br>
							<a <?php if(env('BINARY_PATH') != '' ): ?> href="<?php echo e(url('admin/backups/process?type=onlydb')); ?>"
								<?php else: ?> href="#" disabled <?php endif; ?> class="btn btn-md btn-primary-rgba" title="Generate database backup">
								<i class="fa fa-refresh"></i> <?php echo e(__('Generate database backup')); ?>

							</a>
						</div>

					</div>
					<div class="row">
						<div class="text-center col-md-8">
							
						</div>

						<div class="col-md-4">
							<div class="well">
								<p class="text-success"> <b><?php echo e(__('Download the latest backup')); ?></b> </p>

								<?php

								$dir17 = storage_path() . '/app/'.config('app.name');
								?>

								<ul>

									<?php $__currentLoopData = array_reverse(glob("$dir17/*")); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<?php if($loop->first): ?>
									<li><a href="<?php echo e(URL::temporarySignedRoute('admin.backup.download', now()->addMinutes(1), ['filename' => basename($file)])); ?>"><b><?php echo e(basename($file)); ?>

												(Latest)</b></a></li>
									<?php else: ?>
									<li><a href="<?php echo e(URL::temporarySignedRoute('admin.backup.download', now()->addMinutes(1), ['filename' => basename($file)])); ?>"><?php echo e(basename($file)); ?></a>
									</li>
									<?php endif; ?>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								</ul>

							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
   

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\halkut.oxs\resources\views/admin/backup/index.blade.php ENDPATH**/ ?>