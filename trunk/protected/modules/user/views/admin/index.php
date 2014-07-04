<section class="panel">
	<!-- <header class="panel-heading"> Quản lý người dùng <?php echo CHtml::link(UserModule::t('<i class="icon-small icon-search"></i> Tìm kiếm nâng cao'),'javascript:void(0)',array('class'=>'search-button btn btn-primary')); ?></header> -->
	<div class="panel-body">
		<div class="adv-table">
			<!-- <div class="search-form" style="display:none">
				<?php //$this->renderPartial('_search',array(
					//'model'=>$model,
				//)); ?>
			</div> -->
			<!-- search-form -->
			<a href="/user/admin/create" class="btn btn-primary" role="button">Thêm <i class="icon-plus"></i></a>
			<?php $this->widget('bootstrap.widgets.TbGridView', array(
				'id'=>'user-grid',
				'dataProvider'=>$model->searchNew(),
				'filter'=>$model,
				'summaryText'=>'Hiển thị {start} đến {end} của {count} bản ghi',
				'emptyText'=>Rights::t('core', 'Không tìm thấy người dùng nào.'),
				'itemsCssClass' => 'display table table-bordered table-striped dataTable',
				'pager'=>array(
						'header'=>'',
						'htmlOptions'=>array('class'=>'pagination pagination-sm pull-right'),
						'firstPageLabel'=>'«',
						'nextPageLabel'=>'→',
						'lastPageLabel'=>'»',
						'prevPageLabel'=>'←',
						'selectedPageCssClass'=>'active'
					),
				'columns'=>array(
					array(
						'name' => 'id',
						'type'=>'raw',
						'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
						'htmlOptions'=>array('style'=>'width:60px')
					),
					array(
						'name' => 'username',
						'type'=>'raw',
						'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
					),
					array(
						'header' => 'Tên người dùng',
						'type'=>'raw',
						'value' => '$data->profile->fullname',
						'filter' => CHtml::textField('User[fullname]'),
					),
					array(
						'name'=>'email',
						'type'=>'raw',
						'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
						'htmlOptions'=>array('style'=>'width:80px;'),
					),
					array(
						'name'=>'create_at',
						'type'=>'raw',
						'value'=>'date("d/m/Y",strtotime($data->create_at))',
						'filter' => false,
					),
					array(
						'name'=>'lastvisit_at',
						'type'=>'raw',
						'value'=>'$data->lastvisit_at!= "0000-00-00 00:00:00" ? date("d/m/Y",strtotime($data->lastvisit_at)) : ""',
						'filter' => false,
					),
					/*array(
						'name'=>'superuser',
						'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
						'filter'=>User::itemAlias("AdminStatus"),
					),*/
					array(
						'header' => 'Vai trò',
						'type'=>'raw',
						'value' => '$data->getType()',
						'filter'=>true
					),
					/*array(
						'name'=>'status',
						'value'=>'User::itemAlias("UserStatus",$data->status)',
						'filter' => User::itemAlias("UserStatus"),
					),*/
					array(
						'header'=>'Tác vụ',
						'class'=>'CButtonColumn',
						'deleteConfirmation'=>'Bạn thực sự muốn xóa người dùng này?',
						'htmlOptions'=>array('style'=>'width:100px;text-align:center'),
						'template' => '{view} {update} {delete}',
						'buttons' => array(
							'view' => array(
								'options' => array('class'=>'tooltips','data-placement'=>'top', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => translate('Xem')),
								'label' => '<button class="btn btn-success btn-xs"><i class="icon-eye-open"></i></button>',
								'imageUrl' => false,
							),
							'update' => array(
								'options' => array('class'=>'tooltips','data-placement'=>'top', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => translate('Sửa')),
								'label' => '<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>',
								'imageUrl' => false,
							),
							'delete' => array(
								'options' => array('class'=>'tooltips delete','data-placement'=>'top', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => translate('Xóa')),
								'label' => '<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>',
								'imageUrl' => false,
							)
						)
					)
				),
			)); ?>

			</div>
	  </div>
</section>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
	//$('.search-button').trigger('click');
	ScrollToTop('.grid-view');
    return false;
});
");
?>

