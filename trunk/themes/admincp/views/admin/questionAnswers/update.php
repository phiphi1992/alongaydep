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
			<li class="active"><?php echo translate('Cập nhập câu hỏi') ;?></li>
		</ul><!--.breadcrumb-->	
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Cập nhập câu hỏi');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'questionanswers-form',
					'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'question'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'question',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textArea($model,'question',array('placeholder'=>'Câu Hỏi','class'=>'span12','style'=>'height:60px')); ?>
							<?php echo $form->error($model,'question'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'answer',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textArea($model,'answer',array('placeholder'=>'Câu Trả Lời','class'=>'span12','style'=>'height:300px','id'=>'textAnswer')); ?>
							<?php echo $form->error($model,'answer'); ?>
						</div>
					</div>
					
					<div class="form-actions">
						<button class="btn btn-info" type="submit">
							<i class="icon-ok bigger-110"></i>
							<?php echo translate('Cập nhập');?>
						</button>

						&nbsp; &nbsp; &nbsp;
						<button type="button" onclick="location.href='<?php echo PIUrl::createUrl('/admin/questionAnswers');?>'" class="btn" >
							<i class="icon-undo bigger-110"></i>
							<?php echo translate('hủy');?>
						</button>
					</div>
				<?php $this->endWidget(); ?>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
<script>
  CKEDITOR.replace( 'textAnswer',{
	toolbar: [
		{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },
		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
		{ name: 'colors', items: [ 'TextColor' ] },
		{ name: 'links', items: [ 'Link', 'Unlink'] },
	]
});
	$('#questionanswers-form').submit(function(){
    $('button[type=submit]', this).attr('disabled', 'disabled');
	});
</script>