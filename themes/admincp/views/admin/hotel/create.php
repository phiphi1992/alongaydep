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
			<li class="active"><?php echo translate('Danh bạ khách sạn');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Thêm khách sạn');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'hotel-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'name',array('placeholder'=>'Tên tin tức', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'name'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'type',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->dropDownList($model,'type',$typeHotel, array('class'=>'span12 typeHotel')); ?>
							<?php echo $form->error($model,'type'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Tỉnh/Thành phố</label>
						<div class="controls">
							<select class="span12 provinces" name="provinces">
								<?php foreach($provinces as $pro){ ?>
									<option value="<?php echo $pro->id; ?>" <?php echo ($pro->id==57) ? 'selected' : ''; ?>><?php echo $pro->title; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Quận/Huyện</label>
						<div class="controls">
							<select class="span12 wards" name="wards">
								<?php foreach($wards as $k=>$v){ ?>
									<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'address',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textArea($model,'address',array('placeholder'=>'Địa chỉ', 'class'=>'span12')); ?>
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
						<?php echo $form->labelEx($model,'phone',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'phone',array('placeholder'=>'Điện thoại', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'phone'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'image',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->fileField($model,'image',array('id'=>'id-input-file-1', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'image'); ?>
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
	$(document).ready(function(){
	
		$(".provinces").change(function(){
			var id = $(this).val();
			
			$.ajax({
				url : "<?php echo PIUrl::createUrl('/admin/hotel/getWards');?>"+"?id="+id,
				dataType : "json",
				success : function(result){
					var data = "";
					for(i=0; i<result.length; i++){
						data+="<option value='" + result[i].id +"'>" +result[i].title + "</option>";
					}
					$(".wards").html(data);
				},
			});
		});
	
		$("#submitForm").click(function(){	
			var cateNew = $(".typeHotel").val()
			if(cateNew == 0){
				alert("Vui lòng loại khách sạn");
				return false;
			}else{
				$("#hotel-form").submit(function(){
					$("#submitForm").attr("disabled", true);
				});
			}
		});
	});
	
</script>