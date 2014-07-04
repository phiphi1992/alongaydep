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
			<li class="active"><?php echo translate('Danh sách văn bản');?></li>
		</ul>
	</div>
	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Danh sách văn bản');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
			<a href="<?php echo PIUrl::createUrl('/admin/documents/create/');?>" class="btn btn-primary">
				<i class="icon-ok bigger-110"></i>
				<?php echo translate('Thêm');?>
			</a>
			<form method="post">
				<!--PAGE CONTENT BEGINS-->
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'documents-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'htmlOptions'=>array(),
					'itemsCssClass'=>'table table-striped table-bordered table-hover',
					'emptyText' => 'Không có kết quả hiển thị',
					'selectableRows' => 2,
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
						'category_document.name' => array(
							'name' => 'category_document_id',
							'type' => 'raw',
							'value' => 'isset($data->category_document->name) ? $data->category_document->name :  ""',
							'filter' => CHtml::dropDownList('Documents[category_document_id]', 0, CategoriesDocuments::model()->getCategoriesDocument1()),
						),
						
						'type'=>array(
							'name'=>'type',
							'filter'=>false,
						),
						'filename'=>array(
							'name'=>'filename',
							'filter'=>false,
						),
						
						'created'=>array(
							'name'=>'created',
							'filter'=>false,
							'type'=>'raw',
							'value'=>  'date(Yii::app()->params["date"],$data->created)',

						),
						array(
							'header' => '<input type="button" name="deleteAll" class="deleteAll btn btn-mini btn-danger icon-trash bigger-120" value="Xóa" />',
 							'class'=>'CButtonColumn',
							'template' => '{update}{delete}',
							'buttons'  => array(
								'update' => array(
									'options'=>array('class'=>'btn btn-mini btn-info icon-edit bigger-120','title'=>'Sửa văn bản' ),																							
									'imageUrl' => false,
									'label'=>false,
								),
								'delete' => array(
									'label'=>false,
									'options'=>array('class'=>'btn btn-mini btn-danger icon-trash bigger-120','title'=>'Xóa văn bản' ),
									'imageUrl' => false,
								),						
							 ),
							'deleteConfirmation'=>'Bạn có muốn xóa văn bản này không?',
						),	
					),
				)); ?>
			</form>	
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
<style>
.grid-view .filters input, .grid-view .filters select {
    width: 92%;
}
.image img{
	width:80px;
	height:60px;
}
.btn-info{margin-right:3px;}
input[type="checkbox"]{opacity:1;}
.select-on-check-all{ margin-top:-7.3px !important; }
</style>
<script>
	$("document").ready(function(){
		$(".deleteAll").live('click', function(){
			var arrIdNew = $("#documents-grid").yiiGridView('getSelection');
			if(arrIdNew != ""){
				var answer = confirm ("Bạn có muốn xóa các văn bản được chọn không?");
				if(answer){
					var arrIdNew = $("#documents-grid").yiiGridView('getSelection');
					window.location.href = '/admin/documents/deleteAll/id/'+arrIdNew;
				}
			}
		});
	})
</script>