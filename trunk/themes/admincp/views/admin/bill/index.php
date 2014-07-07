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
			<li class="active"><?php echo translate('Quản lý đơn hàng');?></li>
		</ul>
	</div>
	<div class="page-content">
		<div class="page-header position-relative">	
			<h1>Danh sách đơn hàng</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<form method="post">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'bill-grid',
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
								'name' => array(
									'name'=>'name',
									'type'=>'raw',
									'filter'=>false,
									'value'=>'$data->name',
								),						
								'address' => array(
									'name'=>'address',
									'type'=>'raw',
									'filter'=>false,
									'value'=>'$data->address',
								),
								'phone'=> array(
									'name'=>'phone',
									'type'=>'raw',
									'filter'=>false,
									'value'=>'$data->phone',
								),
								'email' => array(
									'name'=>'email',
									'type'=>'raw',
									'filter'=>false,
									'value'=>'$data->email',
								),
								'created'=>array(
									'name'=>'created',
									'type'=>'raw',
									'filter'=>false,
									'value'=>'date(Yii::app()->params["date"],$data->created)',

								),
								array(
									'header' => '<input type="button" name="deleteAll" class="deleteAll btn btn-mini btn-danger icon-trash bigger-120" value="Xóa" />',
									'class'=>'CButtonColumn',
									'template' => '{update}{delete}',
									'buttons'  => array(
										'update' => array(
											'options'=>array('class'=>'btn btn-mini btn-info icon-edit bigger-120','title'=>'Xem chi tiết đơn hàng' ),																							
											'imageUrl' => false,
											'label'=>false,
											'url' => 'PIUrl::createUrl("/admin/billDetail/", array("id"=>$data->id))',  
										),
										'delete' => array(
											'label'=>false,
											'options'=>array('class'=>'btn btn-mini btn-danger icon-trash bigger-120','title'=>'Xóa tin tức' ),
											'imageUrl' => false,
										),						
									 ),
									'deleteConfirmation'=>'Bạn có muốn xóa đơn hàng này không?',
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
			var arrIdNew = $("#bill-grid").yiiGridView('getSelection');
			if(arrIdNew != ""){
				var answer = confirm ("Bạn có muốn xóa các đơn hàng được chọn không?");
				if(answer){
					var arrIdNew = $("#bill-grid").yiiGridView('getSelection');
					window.location.href = "<?php echo PIUrl::createUrl('/admin/bill/deleteAll/');?>"+"?id="+arrIdNew;
				}
			}
		});
	})
</script>