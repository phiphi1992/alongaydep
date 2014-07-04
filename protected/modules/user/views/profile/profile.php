<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Thông tin cá nhân");?>
<div class="wrapper site-min-height">
<div class="row>
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading"><?php echo translate('Thông tin cá nhân'); ?></header>
			<?php 
			/*$this->breadcrumbs=array(
				UserModule::t("Profile"),
			);
			$this->menu=array(
				((UserModule::isAdmin())
					?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
					:array()),
				array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
				array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
				array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
				array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
			);*/
			?>
			<div class="panel-body">
				<a href="/" class="btn btn-default" role="button" style="width: 80px;margin-bottom: 10px;">Trở về</a>
				<table class="display table table-bordered table-striped dataTable table table-striped table-condensed">
					<tr>
						<th><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
						<td><?php echo CHtml::encode($model->username); ?></td>
					</tr>
					<?php 
						$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
						if ($profileFields) {
							foreach($profileFields as $field) {
								//echo "<pre>"; print_r($profile); die();
							?>
					<tr>
						<th><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
						<td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
					</tr>
							<?php
							}//$profile->getAttribute($field->varname)
						}
					?>
					<tr>
						<th><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
						<td><?php echo CHtml::encode($model->email); ?></td>
					</tr>
					<tr>
						<th><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
						<td><?php echo date('d/m/Y',strtotime($model->create_at)); ?></td>
					</tr>
					<tr>
						<th><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
						<td><?php echo date('d/m/Y',strtotime($model->lastvisit_at)); ?></td>
					</tr>
					<tr>
						<th><?php echo translate('Vai trò');?></th>
						<td><?php echo $model->getType();?></td>
					</tr>
					<tr>
						<th><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></th>
						<td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></td>
					</tr>
				</table>
			</div>
		</section>
	</div>
	</div>
</div>