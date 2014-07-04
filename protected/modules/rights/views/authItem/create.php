<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Create :type', array(':type'=>Rights::getAuthItemTypeName($_GET['type']))),
); ?>
<section class="panel">
	<header class="panel-heading"> <?php echo Rights::t('core', 'Create :type', array(
		':type'=>Rights::getAuthItemTypeName($_GET['type']),
	)); ?></header>
	<div class="panel-body">
		<div class="adv-table">
			<div class="alert alert-warning fade in">
               <?php echo UserModule::t('Trường có dấu <span class="required">*</span> là bắt buộc.'); ?>
            </div>
			<?php $this->renderPartial('_form', array('model'=>$formModel)); ?>
		</div>
	  </div>
</section>