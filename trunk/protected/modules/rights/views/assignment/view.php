<style>.pagination{margin:0}</style>
<section class="panel">
	<header class="panel-heading"> <?php echo Rights::t('core', 'Phân bổ vai trò'); ?></header>
	<div class="panel-body">
		<div class="adv-table">
			<div class="alert alert-warning fade in" style="margin-bottom: 0;">
                <?php echo Rights::t('core', 'Ở đây bạn có thể xem các điều khoản đã được chỉ định cho mỗi người dùng.'); ?>
            </div>
			<?php $this->widget('bootstrap.widgets.TbGridView', array(
			    'dataProvider'=>$dataProvider,
			    //'template'=>"{items}\n{pager}",
				'summaryText'=>'Hiển thị {start} đến {end} của {count} bản ghi',
			    'emptyText'=>Rights::t('core', 'Không tìm thấy user nào.'),
			    'htmlOptions'=>array('class'=>'grid-view assignment-table'),
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
		    			'name'=>'name',
		    			'header'=>Rights::t('core', 'Name'),
		    			'type'=>'raw',
		    			'htmlOptions'=>array('class'=>'name-column'),
		    			'value'=>'$data->getAssignmentNameLink()',
		    		),
		    		array(
		    			'name'=>'assignments',
		    			'header'=>Rights::t('core', 'Roles'),
		    			'type'=>'raw',
		    			'htmlOptions'=>array('class'=>'role-column'),
		    			'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_ROLE)',
		    		),
					array(
		    			'name'=>'assignments',
		    			'header'=>Rights::t('core', 'Tasks'),
		    			'type'=>'raw',
		    			'htmlOptions'=>array('class'=>'task-column'),
		    			'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_TASK)',
		    		),
					array(
		    			'name'=>'assignments',
		    			'header'=>Rights::t('core', 'Operations'),
		    			'type'=>'raw',
		    			'htmlOptions'=>array('class'=>'operation-column'),
		    			'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_OPERATION)',
		    		),
			    )
			)); ?>

			</div>
	  </div>
</section>