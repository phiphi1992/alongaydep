<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="<?php echo PIUrl::createUrl('/admin');?>">Trang chủ</a>

				<span class="divider">
					<i class="icon-angle-right arrow-icon"></i>
				</span>
			</li>
			<li class="active"><?php echo translate('Cập nhật thông tin tài khoản');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Cập nhật thông tin tài khoản');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">

			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'profile-form',
				'enableAjaxValidation'=>true,
				'htmlOptions' => array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal'),
			)); ?>

			<?php 
					$profileFields=$profile->getFields();
					if ($profileFields) {
						foreach($profileFields as $field) {
						?>
				<div class="control-group">
					<?php echo $form->labelEx($profile,$field->varname,array('class'=>'control-label'));?>
					<div class="controls">
					<?php
					if ($widgetEdit = $field->widgetEdit($profile)) {
						echo $widgetEdit;
					} elseif ($field->range) {
						echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
					} elseif ($field->field_type=="TEXT") {
						echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
					} else {
						echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
					}
					echo $form->error($profile,$field->varname); ?>
					</div>
				</div>	
						<?php
						}
					}
			?>
				<div class="control-group">
					<?php echo $form->labelEx($model,'username',array('class'=>'control-label')); ?>
					<div class="controls">
					<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
					<?php echo $form->error($model,'username'); ?>
					</div>
				</div>

				<div class="control-group">
					<?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
					<div class="controls">
					<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
					<?php echo $form->error($model,'email'); ?>
					</div>
				</div>

				<div class="form-actions">
					<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Cập nhật'),array('class'=>'btn btn-info')); ?>
					<button type="button" onclick="location.href='<?php echo PIUrl::createUrl("/admin");?>'" class="btn"><i class="icon-undo bigger-110"></i>hủy</button></div>

			<?php $this->endWidget(); ?>



</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
