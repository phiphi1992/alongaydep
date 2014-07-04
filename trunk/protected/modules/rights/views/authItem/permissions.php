<section class="panel" id="permissions">
	<header class="panel-heading"> <?php echo Rights::t('core', 'Phân quyền'); ?>
	<?php echo CHtml::link(Rights::t('core', 'Generate items for controller actions'),array('authItem/generate'),array('class'=>'generator-link btn btn-default')); ?>
	</header>
	<div class="panel-body">
		<div class="adv-table">
			<div class="alert alert-warning fade in" style="margin-bottom: 0;">
                <?php echo Rights::t('core', 'Ở đây bạn có thể xem và quản lý các quyền được gán cho mỗi vai trò. <br />Các items ủy quyền có thể được quản lý theo vai trò, nhiệm vụ và hoạt động.'); ?>
            </div>
			<?php $this->widget('bootstrap.widgets.TbGridView', array(
					'dataProvider'=>$dataProvider,
					'template'=>'{items}',
					'emptyText'=>Rights::t('core', 'No authorization items found.'),
					'htmlOptions'=>array('class'=>'grid-view permission-table'),
					'itemsCssClass' => 'table-default items table table-striped table-bordered',
					'columns'=>$columns,
				)); ?>

			</div>
			<p class="info">*) <?php echo Rights::t('core', 'Hover to see from where the permission is inherited.'); ?></p>
	  </div>
</section>
<script type="text/javascript">

	/**
	* Attach the tooltip to the inherited items.
	*/
	jQuery('.inherited-item').rightsTooltip({
		title:'<?php echo Rights::t('core', 'Source'); ?>: '
	});

	/**
	* Hover functionality for rights' tables.
	*/
	$('#rights tbody tr').hover(function() {
		$(this).addClass('hover'); // On mouse over
	}, function() {
		$(this).removeClass('hover'); // On mouse out
	});

</script>
