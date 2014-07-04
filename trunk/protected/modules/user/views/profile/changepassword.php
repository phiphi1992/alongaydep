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
			<li class="active"><?php echo translate('Thay đổi mật khẩu');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Thay đổi mật khẩu');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
			
			
				<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
					'id'=>'changepassword-form',
					'enableAjaxValidation'=>true,
					'htmlOptions' => array(
						'enctype'=>'multipart/form-data','class'=>'form-horizontal tasi-form'
					),
				)); ?>
					<?php //echo $form->errorSummary($model); ?>
					<div class="control-group">
						<?php echo $form->labelEx($model,'oldPassword',array('class'=>'col-sm-offset-0 col-sm-2 control-label')); ?>
						<div class="controls">
							<?php echo $form->passwordfield($model,'oldPassword',array('class'=>'form-control'));?>
							<?php echo $form->error($model,'oldPassword',array('style'=>'color: red;'));?>
						</div>
					</div>

					<div class="control-group">
						<?php echo $form->labelEx($model,'password',array('class'=>'col-sm-offset-0 col-sm-2 control-label')); ?>
						<div class="controls">
							<?php echo $form->passwordfield($model,'password',array('class'=>'form-control'));?>
							<?php echo $form->error($model,'password',array('style'=>'color: red;'));?>
						</div>
					</div>

					<div class="control-group">
						<?php echo $form->labelEx($model,'verifyPassword',array('class'=>'col-sm-offset-0 col-sm-2 control-label')); ?>
						<div class="controls">
							<?php echo $form->passwordfield($model,'verifyPassword',array('class'=>'form-control'));?>
							<?php echo $form->error($model,'verifyPassword',array('style'=>'color: red;'));?>
						</div>
					</div>

					<div class="form-actions">
							<?php echo CHtml::submitButton(UserModule::t("Cập nhật"),array('class'=>'btn btn-primary')); ?>
							<a href="<?php echo PIUrl::createUrl("/admin");?>" class="btn btn-default" role="button" style="width: 80px;"><?php echo UserModule::t("Hủy");?></a>
					</div>
				<?php $this->endWidget(); ?>
				</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
