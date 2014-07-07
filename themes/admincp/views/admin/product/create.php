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
			<li class="active"><?php echo translate('Sản phẩm');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Thêm sản phẩm');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'product-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'product_category_id',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->dropDownList($model,'product_category_id',$dataCategories, array('class'=>'span12 category')); ?>
							<?php echo $form->error($model,'product_category_id'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'name',array('placeholder'=>'Tên tin tức', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'name'); ?>
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
						<?php echo $form->labelEx($model,'content',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textArea($model,'content',array('placeholder'=>'Nội dung', 'class'=>'ckeditor ')); ?>
							<?php echo $form->error($model,'content'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'price',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'price',array('placeholder'=>'Giá', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'price'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'image',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->fileField($model,'image',array('id'=>'id-input-file-1', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'image'); ?>
						</div>
					</div>
					
					<div class="widget-box  collapsed">
						<div class="widget-header">
							<h4>Thêm Hình Ảnh</h4>

							<span class="widget-toolbar ">
								<button class="btn btn-primary" data-action="collapse">
								<i class="icon-chevron-up"></i>
								<?php echo translate('Thêm');?>
								</button>
								<a href="#" data-action="close">
									<i class="icon-remove"></i>
								</a>
							</span>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<input type="file" name="images[]" id="id-input-file-3" multiple='true' />
								<label>
									<input checked="true" type="checkbox" name="file-format" id="id-file-format" />
									<span class="lbl"> Chỉ cho phép hình ảnh</span>
								</label>
							</div>
						</div>
					</div>

					<div class="form-actions">
						<button id="submitForm" class="btn btn-primary" type="submit">
							<i class="icon-ok bigger-110"></i>
							<?php echo translate('Lưu');?>
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
			var cateNew = $(".category").val()
			if(cateNew == 0){
				alert("Vui lòng chọn danh mục sản phẩm");
				return false;
			}else{
				$("#product-form").submit(function(){
					$("#submitForm").attr("disabled", true);
				});
			}
		});
	});
	
</script>