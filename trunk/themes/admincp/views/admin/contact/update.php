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
			<li class="active"><?php echo translate('Thư liên hệ');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Thư liên hệ');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'contact-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					<div class="control-group">
						<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'name',array('placeholder'=>'Họ tên', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'name'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'email',array('placeholder'=>'Địa chỉ email', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'email'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'title',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'title',array('placeholder'=>'Tiêu đề', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'title'); ?>
						</div>
					</div>

					<div class="control-group">
						<?php echo $form->labelEx($model,'address',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'address',array('placeholder'=>'Địa chỉ', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'address'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'phone',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'phone',array('placeholder'=>'Số điện thoại', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'phone'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'content',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textArea($model,'content',array('placeholder'=>'Nội dung', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'content'); ?>
						</div>
					</div>
					
					<div class="form-actions">
						<button class="btn btn-info" type="submit">
							<i class="icon-ok bigger-110"></i>
							<?php echo translate('Cập nhập');?>
						</button>

						&nbsp; &nbsp; &nbsp;
						<button type="button" onclick="location.href='<?php echo PIUrl::createUrl('/admin');?>'" class="btn" >
							<i class="icon-undo bigger-110"></i>
							<?php echo translate('Hủy');?>
						</button>
					</div>
				<?php $this->endWidget(); ?>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->