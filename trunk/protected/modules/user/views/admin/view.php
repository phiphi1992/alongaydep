<section class="panel">
	<header class="panel-heading"> Xem thông tin người dùng <strong><?php echo $model->username;?></strong></header>
	<div class="panel-body">
		<div class="adv-table">
			<div class="panel-body" style="padding:0;">
					<?php echo CHtml::link(UserModule::t('Sửa'),array('update','id'=>$model->id), array("class"=>"btn btn-primary","style"=>"width: 80px")); ?>
					<?php echo CHtml::link(UserModule::t('Xóa'),"javascript:;", array("class"=>"btn btn-danger","style"=>"width: 80px; text-align: center;","submit"=>array('delete','id'=>$model->id), 'confirm' => UserModule::t('Bạn thực sự muốn xóa người dùng này?'))); ?>
					<a href="/user" class="btn btn-default" role="button" style="width: 80px;">Trở về</a>
			</div>
			<?php
				$attributes = array(
					'id',
					'username',
				);

				$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
				if ($profileFields) {
					foreach($profileFields as $field) {
						array_push($attributes,array(
								'label' => UserModule::t($field->title),
								'name' => $field->varname,
								'type'=>'raw',
								'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
							));
					}
				}

				array_push($attributes,
					//'password',
					'email',
					//'activkey',
					array(
						'name'=>'create_at',
						'value'=>date('d/m/Y',strtotime($model->create_at))
					),
					array(
						'name'=>'lastvisit_at',
						'value'=>$model->lastvisit_at!= "0000-00-00" ? date("d/m/Y",strtotime($model->lastvisit_at)) : ''
					),
					// array(
						// 'name' => 'superuser',
						// 'value' => User::itemAlias("AdminStatus",$model->superuser),
					// ),
					array(
						'type' => 'html',
						'label'=>'Vai trò',
						'value' => $model->getType(),
					),
					array(
						'name' => 'status',
						'value' => User::itemAlias("UserStatus",$model->status),
					)
				);

				$this->widget('bootstrap.widgets.TbDetailView', array(
					'htmlOptions'=>array('style'=>'margin-top:10px','class'=>'display table table-bordered table-striped dataTable'),
					'data'=>$model,
					'attributes'=>$attributes,
				));
			?>
		</div>
	  </div>
</section>

