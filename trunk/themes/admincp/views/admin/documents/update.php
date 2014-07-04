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
			<li class="active"><?php echo translate('Cập nhập văn bản');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Cập nhập văn bản');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'documents-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					<div class="control-group">
						<?php echo $form->labelEx($model,'category_document_id',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->dropDownList($model,'category_document_id',$dataCategory,array('class'=>'span12')); ?>
							<?php echo $form->error($model,'category_document_id'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'name',array('placeholder'=>'Tên văn bản', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'name'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'filename',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->fileField($model,'filename',array('id'=>'id-input-file-1', 'class'=>'span12 id-input-file-1')); ?>
							<?php echo $form->error($model,'filename'); ?>
						</div>
					</div>
					
					<div class="form-actions">
						<button id="submitForm" class="btn btn-info" type="submit">
							<i class="icon-ok bigger-110"></i>
							<?php echo translate('Cập nhập');?>
						</button>

						&nbsp; &nbsp; &nbsp;
						<button type="button" onclick="location.href='<?php echo PIUrl::createUrl('/admin');?>'" class="btn" >
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
	$("#documents-form").submit(function(){
		$("#submitForm").attr("disabled", true);
	});
	$(document).ready(function(){
		$('.id-input-file-1').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Chọn file',
			btn_change:'Thay đổi',
			droppable:false,
			onchange:null,
			before_change:before_change,
			thumbnail:false, //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			blacklist:'exe|php'
			//onchange:''
		});
	});
	before_change = function(files, dropped) {
		var allowed_files = [];
		for(var i = 0 ; i < files.length; i++) {
			var file = files[i];
			if(typeof file === "string") {
				//IE8 and browsers that don't support File Object
				if(! (/\.(doc|docx|xlsx|xls)$/i).test(file) ) return false;
			}
			else {
				var type = $.trim(file.type);
				if( ( type.length > 0 && ! (/[document|sheet|excel|pdf]$/).test(type) )
						|| ( type.length == 0 && ! (/\.(doc|docx|xlsx|xls|pdf)$/).test(file.name) )//for android's default browser which gives an empty string for file.type
					) continue;//not an image so don't keep this file
			}
			
			allowed_files.push(file);
		}
		if(allowed_files.length == 0) {message('Chỉ cho phép tải file word or excel.','error'); return false};
		if(allowed_files[0].size > 2048000) {message('Kích thước file quá lớn(phải nhỏ hơn 2048KB).','error'); return false};
		return allowed_files;
		}
</script>