<section class="panel">
	<header class="panel-heading"> <?php echo  UserModule::t('Chỉnh sửa người dùng').' <strong>'.$model->username.'</strong>'; ?></header>
	<div class="panel-body">
		<div class="adv-table">
			<div class="alert alert-warning fade in">
			<?php echo UserModule::t('Trường có dấu <span class="required">*</span> là bắt buộc.'); ?>
            </div>
			<?php
			$this->renderPartial('_form', array('model'=>$model,'profile'=>$profile,'allRoles'=>$allRoles,'userCurrenRole'=>$userCurrenRole));
			?>
		</div>
	  </div>
</section>