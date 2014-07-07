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
			<li class="active"><?php echo translate('Thành viên hổ trợ trực tuyến');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Dánh sách thành viên');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
			<a href="<?php echo PIUrl::createUrl('/admin/support/create/');?>" class="btn btn-primary">
				<i class="icon-ok bigger-110"></i>
				<?php echo translate('Thêm');?>
			</a>
				<!--PAGE CONTENT BEGINS-->
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					
					'id'=>'support-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'htmlOptions'=>array(),
					'itemsCssClass'=>'table table-striped table-bordered table-hover',
					'selectableRows' => 2,
					'emptyText' => 'Không có kết quả hiển thị',
					'summaryText' => 'Hiển thị {start} - {end} của {count} kết quả ',
					'columns'=>array(
						array(
							'id' => 'id',
							'class' => 'CCheckBoxColumn',
						),
						array(
							'header'=>'STT',
							'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
						),
						'name',
						'group.name' => array(
							'name' => 'group_support_id',
							'type' => 'raw',
							'value' => 'isset($data->group->name) ? $data->group->name :  ""',
							'filter' => CHtml::dropDownList('Support[group_support_id]', 0, GroupSupport::model()->getGroupSupport1()),
						),
						'position'=>array(
							'name'=>'position',
							'filter'=>false,
							'type'=>'raw',
							'value'=>'$data->position',
						),
						'yahoo'=>array(
							'name'=>'yahoo',
							'filter'=>false,
							'type'=>'raw',
							'value'=>'$data->yahoo',
						),
						'skype'=>array(
							'name'=>'skype',
							'filter'=>false,
							'type'=>'raw',
							'value'=>'$data->skype',
						),
						'phone'=>array(
							'name'=>'phone',
							'filter'=>false,
							'type'=>'raw',
							'value'=>'$data->phone',
						),
						'created'=>array(
							 'name'=>'created',
							 'filter'=>false,
							'type'=>'raw',
							'value'=>'date(Yii::app()->params["date"],$data->created)',
						),
						array(
							'header' => '<input type="button" name="deleteAll" class="deleteAll btn btn-mini btn-danger icon-trash bigger-120" value="Xóa" />',
							'class'=>'CButtonColumn',
							'template' => '{update}{delete}',	
							'buttons'  => array(
								'update' => array(
									'options'=>array('class'=>'btn btn-mini btn-info icon-edit bigger-120','title'=>'Sửa danh mục' ),																							
									'imageUrl' => false,
									'label'=>false,
								),
								'delete' => array(
									'label'=>false,
									'options'=>array('class'=>'btn btn-mini btn-danger icon-trash bigger-120','title'=>'Xóa danh mục' ),
									'imageUrl' => false,
									
								)										
							 ),
							'deleteConfirmation'=>'Bạn có muốn xóa thành viên này không?',
						),
					),
					
				)); ?>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
<style>
.grid-view .filters input, .grid-view .filters select {
    width: 95%;
}
.btn-info{margin-right:3px;}
input[type="checkbox"]{opacity:1;}
.select-on-check-all{ margin-top:-7.3px !important; }
</style>
<script>
	$("document").ready(function(){
		$(".deleteAll").live('click', function(){
			var arrIdNew = $("#support-grid").yiiGridView('getSelection');
			if(arrIdNew != ""){
				var answer = confirm ("Bạn có muốn xóa các thành viên được chọn không?");
				if(answer){
					var arrIdNew = $("#support-grid").yiiGridView('getSelection');
					window.location.href = '<?php echo PIUrl::createUrl('/admin/support/deleteAll') ?>'+"?id="+arrIdNew;
				}
			}
		});
	})
</script>