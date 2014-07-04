<div class="wide form" style="margin-top:10px">
<div class="alert alert-warning fade in">
                Bạn có thể tùy chọn nhập một toán tử so sánh (<, <=,>,> =, <> hoặc =) vào đầu của mỗi giá trị tìm kiếm của bạn để chỉ định cách so sánh nên được thực hiện.
            </div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal tasi-form well '),
)); ?>
<fieldset>
	<div class="form-group">
	        <?php echo $form->label($model,'id',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
			<div class="col-sm-10">
	        <?php echo $form->textField($model,'id',array('class'=>'form-control input-sm m-bot15')); ?>
			</div>
	</div>
	
	<div class="form-group">
	        <?php echo $form->label($model,'username',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
			<div class="col-sm-10">
	         <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'form-control input-sm m-bot15')); ?>
			</div>
	</div>
	
	<div class="form-group">
	        <?php echo $form->label($model,'email',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
			<div class="col-sm-10">
	         <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control input-sm m-bot15')); ?>
			</div>
	</div>
	
	<div class="form-group">
	        <?php echo $form->label($model,'fullname',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
			<div class="col-sm-10">
	         <?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>128,'class'=>'form-control input-sm m-bot15')); ?>
			</div>
	</div>
	
	<!--<div class="form-group">
	        <?php echo $form->label($model,'activkey',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
			<div class="col-sm-10">
	         <?php echo $form->textField($model,'activkey',array('size'=>60,'maxlength'=>128,'class'=>'form-control input-sm m-bot15')); ?>
			</div>
	</div>-->
	<!--
	<div class="form-group">
	        <?php echo $form->label($model,'create_at',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
			<div class="col-sm-10">
	         <?php echo $form->textField($model,'create_at',array('class'=>'form-control input-sm m-bot15')); ?>
			</div>
	</div>-->
	<!--
	<div class="form-group">
	        <?php echo $form->label($model,'lastvisit_at',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
			<div class="col-sm-10">
	         <?php echo $form->textField($model,'lastvisit_at',array('class'=>'form-control input-sm m-bot15')); ?>
			</div>
	</div>-->
	<!--
	<div class="form-group">
	        <?php echo $form->label($model,'superuser',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
			<div class="col-sm-10">
	         <?php echo $form->dropDownList($model,'superuser',$model->itemAlias('AdminStatus'),array('class'=>'form-control m-bot15')); ?>
			</div>
	</div>-->
	
	<div class="form-group">
	        <?php echo $form->label($model,'status',array('class'=>'col-sm-2 col-sm-2 control-label')); ?>
			<div class="col-sm-10">
	         <?php echo $form->dropDownList($model,'status',$model->itemAlias('UserStatus'),array('class'=>'form-control m-bot15')); ?>
			</div>
	</div>
	
	<div class="form-group">
			<div class="col-sm-10">
	         <?php echo CHtml::submitButton(UserModule::t('Tìm kiếm'),array('class'=>'btn btn-default')); ?>
			</div>
	</div>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- search-form -->