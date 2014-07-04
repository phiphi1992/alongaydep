<style>.help-block.error, span.required{color:red}</style>
<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data','class'=>'form-horizontal tasi-form'),
));
?>
	<?php //echo $form->errorSummary(array($model,$profile)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $model->isNewRecord ? $form->labelEx($model,'password',array('class'=>'col-sm-2 col-sm-2 control-label')) : '<label class="col-sm-2 col-sm-2 control-label">Mật khẩu mới</span></label>'; ?>
		<div class="col-sm-10">
			<?php if($model->isNewRecord) {?>
				<?php echo $form->textField($model,'password',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'password'); ?>
			<?php }else{?>
				<input type="text" id ="User_password" name="newPassword" class="form-control" size="60" maxlength="128"/>
			<?php }?>
			<input checked="checked" type="checkbox" attr-select = "selected" class="showPass"> Hiển thị mật khẩu
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
	<!--
	<div class="form-group">
		<?php echo $form->labelEx($model,'superuser',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus'),array('class'=>'form-control m-bot15')); ?>
		<?php echo $form->error($model,'superuser'); ?>
		</div>
	</div>
	-->
	<div class="form-group">
		<?php echo CHtml::label('Vai trò <span class="required">*</span>','user_role',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php //echo CHtml::listBox("user_role",$userCurrenRole,CHtml::listData($allRoles,'name','description'),array('multiple' => false,'class'=>'form-control')); ?>
		<?php  echo CHtml::radioButtonList('user_role',$userCurrenRole[0],CHtml::listData($allRoles,'name','description'), array( 'separator' => "  "));  ?>
		</div>
	</div>
	<?php
		$classID = '';
		if($userCurrenRole[0] == 'student')
			$classID = $userCurrenRole[0];
	?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus'),array('class'=>'form-control m-bot15')); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="form-group">
		<?php echo $form->labelEx($profile,$field->varname,array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range),array('class'=>'form-control m-bot15'));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'class'=>'form-control'));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
		</div>
	</div>
			<?php
			}
		}
?>
	<div class="form-group">
		<div class="col-sm-10">
		<?php echo CHtml::submitButton(UserModule::t('OK'),array('class'=>'btn btn-primary','style'=>'width: 80px;'));?>
		<a href="/user" class="btn btn-default" role="button" style="width: 80px;">Hủy</a>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
	$(document).ready(function(){
		$('#user_role').find('input').change(function (){
			var type = $(this).val();
			if(type == 'student'){
				$(".typeRoles").show();
			}else{
				$(".typeRoles").hide();
			}
		});

		/*Show characters password*/
		$(".showPass").on('click',function(){
			var selected = $(this).attr('attr-select');
			if(selected == "selected") {
				$("#User_password").prop('type','password');
				$(this).attr("attr-select","");
			}else {
				$("#User_password").prop('type','text');
				$(this).attr("attr-select","selected");
			}
		});
	});
</script>
<?php if($model->isNewRecord):?>
<?php echo '<script>$(document).ready(function(){ $("#User_status option").removeAttr("selected") .filter("[value=1]").attr("selected","selected"); });</script>'; ?>
<?php endif;?>