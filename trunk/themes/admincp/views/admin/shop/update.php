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
			<li class="active"><?php echo translate('Cập nhập quầy hàng');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Cập nhập quầy hàng');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'shop-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'logo'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					<div class="control-group">
						<div class="controls">
							<img src="
								<?php echo getImage($model->logo, 80, 80); ?>
							"/>
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
						<?php echo $form->labelEx($model,'name_shop',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'name_shop',array('placeholder'=>'Tên quầy hàng', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'name_shop'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'license',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'license',array('placeholder'=>'Giấy phép', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'license'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'name',array('placeholder'=>'Tên chủ quầy', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'name'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'lot_number',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'lot_number',array('placeholder'=>'Số lô', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'lot_number'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'other',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'other',array('placeholder'=>'Khác', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'other'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'detail_shop',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textArea($model,'detail_shop',array('placeholder'=>'Chi tiết quầy hàng', 'class'=>'ckeditor')); ?>
							<?php echo $form->error($model,'detail_shop'); ?>
						</div>
					</div>
					

					<div class="form-actions">
						<button id="submitForm" class="btn btn-primary" type="submit">
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
<script>
	$("#shop-form").submit(function(){
		$("#submitForm").attr("disabled", true);
	});
</script>