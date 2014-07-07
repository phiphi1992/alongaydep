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
			<li class="active"><?php echo translate('Sản phẩm');?></li>
		</ul>
	</div>
	<div class="page-content">
		<div class="page-header position-relative">
			<?php $id = (isset($_GET['id']) && !empty($_GET['id'])) ? $_GET['id'] : 1;  ?>
			<h1><?php 
				if($id == 1) echo "Danh sách sản phẩm điện hoa";
				else{
					if($id == 2) echo "Danh sách sản phẩm du lịch";
					else	echo "Danh sách thiết bị an ninh";
				}
			?></h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<a href="<?php echo PIUrl::createUrl('/admin/product/create/', array('id'=>$id));?>" class="btn btn-primary">
					<i class="icon-ok bigger-110"></i>
					<?php echo translate('Thêm');?>
				</a>
				<form method="post">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'product-grid',
							'dataProvider'=>$model->search($id),
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
								'image'=>array(
									'name' => 'image',
									'type'=>'raw',
									'filter'=>false,
									'value'=>'CHtml::image(getImage($data->image,"80", "60" ))',
									'htmlOptions'=> array("class"=>"image"),
								),
								'name',								
								'productCategory.name' => array(
									'name' => 'product_category_id',
									'type' => 'raw',
									'value' => 'isset($data->productCategory->name) ? $data->productCategory->name :  ""',
									'filter' => CHtml::dropDownList('Product[product_category_id]', 0, ProductCategory::model()->getDataCategories($id)),
								),
								'price'=>array(
									'name' => 'price',
									'type'=>'raw',
									'filter'=>false,
									'value' => '$data->name',
								),
								'created'=>array(
									'name'=>'created',
									'type'=>'raw',
									'filter'=>false,
									'value'=>'date(Yii::app()->params["date"],$data->created)',

								),
								'updated'=>array(
									'name'=>'updated',
									'type'=>'raw',
									'filter'=>false,
									'value'=>'($data->updated != "") ? date(Yii::app()->params["date"],$data->updated) : "" ',
									
								),
								array(
									'header' => '<input type="button" name="deleteAll" class="deleteAll btn btn-mini btn-danger icon-trash bigger-120" value="Xóa" />',
									'class'=>'CButtonColumn',
									'template' => '{update}{delete}',
									'buttons'  => array(
										'update' => array(
											'options'=>array('class'=>'btn btn-mini btn-info icon-edit bigger-120','title'=>'Sửa tin tức' ),																							
											'imageUrl' => false,
											'label'=>false,
											'url' => 'PIUrl::createUrl("/admin/product/update", array("id"=>$data->id, "type"=>'.$id.'))',  
										),
										'delete' => array(
											'label'=>false,
											'options'=>array('class'=>'btn btn-mini btn-danger icon-trash bigger-120','title'=>'Xóa tin tức' ),
											'imageUrl' => false,
										),						
									 ),
									'deleteConfirmation'=>'Bạn có muốn xóa sản phẩm này không?',
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
			var arrIdNew = $("#product-grid").yiiGridView('getSelection');
			if(arrIdNew != ""){
				var answer = confirm ("Bạn có muốn xóa các sản phẩm được chọn không?");
				if(answer){
					var arrIdNew = $("#product-grid").yiiGridView('getSelection');
					window.location.href = "<?php echo PIUrl::createUrl('/admin/product/deleteAll/');?>"+"?id="+arrIdNew;
				}
			}
		});
	})
</script>