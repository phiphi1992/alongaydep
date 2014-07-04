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
			<li class="active"><?php echo translate('Cài đặt');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Cài đặt');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'system-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					<div class="control-group">
						<div class="controls">
							<img style="max-width: 500px; max-height:200px;" src="<?php 
								if(!empty($model)) echo getImageFullSize($model->logo);
							?>"/>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'logo',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->fileField($model,'logo',array('id'=>'id-input-file-1', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'logo'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'title',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'title',array('placeholder'=>'Tiêu đề trang','class'=>'span12')); ?>
							<?php echo $form->error($model,'title'); ?>
						</div>
					</div>

					<div class="control-group">
						<?php echo $form->labelEx($model,'description',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textArea($model,'description',array('placeholder'=>'Mô tả', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'description'); ?>
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
						<?php echo $form->labelEx($model,'fax',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'fax',array('placeholder'=>'Fax', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'fax'); ?>
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
						<?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'email',array('placeholder'=>'Địa chỉ email', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'email'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'title_footer',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'title_footer',array('placeholder'=>'Tiêu đề cuối trang', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'title_footer'); ?>
						</div>
					</div>

					<div class="form-actions">
						<button id="submitForm" class="btn btn-primary" type="submit">
							<i class="icon-ok bigger-110"></i>
							<?php echo translate('Cập nhật');?>
						</button>

						&nbsp; &nbsp; &nbsp;
						<button type="button" onclick="location.href='<?php echo PIUrl::createUrl('/admin');?>'" class="btn " >
							<i class="icon-undo bigger-110"></i>
							<?php echo translate('hủy');?>
						</button>
					</div>
				<?php $this->endWidget(); ?>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<script>
	$("#system-form").submit(function(){
		$("#submitForm").attr("disabled", true);
	});
</script>
</div><!--/.main-content-->