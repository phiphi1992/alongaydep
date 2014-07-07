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
			<?php $id = (isset($_GET['id']) && !empty($_GET['id'])) ? $_GET['id'] : 1;  ?>
			<li class="active"><?php 
				if($id == 1) echo "Sản phẩm điện hoa";
				else{
					if($id == 2) echo "Sản phẩm thiết bị an ninh";
					else	echo "Sản phẩm du lịch";
				}
			?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Thêm danh mục');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'categoriesnews-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'name',array('placeholder'=>'Tên danh mục', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'name'); ?>
						</div>
					</div>

					<div class="form-actions">
						<button id="submitForm" class="btn btn-primary" type="submit">
							<i class="icon-ok bigger-110"></i>
							<?php echo translate('Thêm');?>
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
	$("#categoriesnews-form").submit(function(){
		$("#submitForm").attr("disabled", true);
	});
</script>