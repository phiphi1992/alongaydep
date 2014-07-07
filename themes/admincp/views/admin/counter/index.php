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
			<li class="active"><?php echo translate('Quản lý thống kê truy cập');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Quản lý thống kê truy cập');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'counter-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'current',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'current',array('placeholder'=>'Số lượt thành viên đang truy cập','class'=>'span12')); ?>
							<?php echo $form->error($model,'current'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'day',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'day',array('placeholder'=>'Số lượt truy cập trong ngày','class'=>'span12')); ?>
							<?php echo $form->error($model,'day'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'week',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'week',array('placeholder'=>'Số lượt truy cập trong tuần','class'=>'span12')); ?>
							<?php echo $form->error($model,'week'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'month',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'month',array('placeholder'=>'Số lượt truy cập trong tháng','class'=>'span12')); ?>
							<?php echo $form->error($model,'month'); ?>
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
	$("#counter-form").submit(function(){
		$("#submitForm").attr("disabled", true);
	});
</script>
</div><!--/.main-content-->