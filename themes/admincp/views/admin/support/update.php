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
			<li class="active"><?php echo translate('Thành viên hổ trợ trực tuyến');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Cập nhập thành viên');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'support-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'group_support_id',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->dropDownList($model,'group_support_id',$groupSupport, array('class'=>'span12 groupSupport')); ?>
							<?php echo $form->error($model,'group_support_id'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'name',array('placeholder'=>'Tên nhóm', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'name'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'position',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'position',array('placeholder'=>'Chức vụ', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'position'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'yahoo',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'yahoo',array('placeholder'=>'Địa chỉ yahoo', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'yahoo'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'skype',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'skype',array('placeholder'=>'Địa chỉ skype', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'skype'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'phone',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'phone',array('placeholder'=>'Điện thoại', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'phone'); ?>
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
							<?php echo translate('hủy');?>
						</button>
					</div>
				<?php $this->endWidget(); ?>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
	</div><!--/.main-content-->
<script>
	$(document).ready(function(){
	
			$("#submitForm").click(function(){
				var cateNew = $(".groupSupport").val()
				if(cateNew == 0){
				alert("Vui lòng chọn nhóm hổ trợ trực tuyến");
				return false;
			}else{
				$("#support-form").submit(function(){
					$("#submitForm").attr("disabled", true);
				});
			}
			
		});
	});
	
</script>