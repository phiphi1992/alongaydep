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
			<li class="active"><?php echo translate('Tin tức');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Câp nhập tin tức');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'news-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
				
					<div class="control-group">
						<div class="controls">
							<img style="max-width: 500px; max-height:200px;" src="<?php 
								if(!empty($model)) echo getImageFullSize($model->image);
							?>"/>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'image',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->fileField($model,'image',array('id'=>'id-input-file-1', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'image'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'category_news_id',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->dropDownList($model,'category_news_id',$dataCategories, array('class'=>'span12 cateNew')); ?>
							<?php echo $form->error($model,'category_news_id'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Danh mục con</label>
						<div class="controls">
							<select name="sub_category" class="span12 cate_sub">
								<?php foreach($dataSubCate as $k=>$v){ ?>
									<option value="<?php echo $k ?>" <?php echo ($k == $model->	sub_category_id) ? 'selected' : ''; ?>><?php echo $v; ?></option>
								<?php } ?>
							</select>
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
	
		$(".cateNew").change(function(){
			var data = $(this).val();
			if(data == 0)	return false;
			else{
				$.ajax({
					url: "<?php echo PIUrl::createUrl('/admin/news/getCate');?>"+'?id='+data,
					dataType : 'json',
					success : function(data){
						var html = '';
						for(i=0; i<data.length; i++){
							html+= "<option value = "+data[i].id+">"+data[i].name+"</option>";
						}
						$(".cate_sub").html(html);
					},
				});
			}
		});
	
		$("#submitForm").click(function(){	
			var cateNew = $(".cate_sub").val()
			if(cateNew == 0){
				alert("Vui lòng chọn danh mục tin tức");
				return false;
			}else{
				$("#news-form").submit(function(){
					$("#submitForm").attr("disabled", true);
				});
			}
		});
	});
	
</script>