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
			<li class="active"><?php echo translate('Danh sách tin tức');?></li>
		</ul>
	</div>
	<div class="page-content">
		<div class="page-header position-relative">
			<?php 
				$id = null;
					if(isset($_GET['id'])) $id = $_GET['id'];
					$title = "";
					
			?>
			<h1>
				<?php echo (isset($id) && $id ==1) ? "Lĩnh vực kinh doanh" : "Tin tức";?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
			<?php if($id == 1){ ?>
			<form method="post">
				<!--PAGE CONTENT BEGINS-->
			
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'news-grid',
					'dataProvider'=>$model->search($id),
					'filter'=>$model,
					'htmlOptions'=>array(),
					'itemsCssClass'=>'table table-striped table-bordered table-hover',
					'emptyText' => 'Không có kết quả hiển thị',
					'selectableRows' => 2,
					'summaryText' => 'Hiển thị {start} - {end} của {count} kết quả ',
					'columns'=>array(	
						
						array(
							'header'=>'STT',
							'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
						),
						'name',
						
						
						// 'content' =>array(
							// 'name' => 'content',
							// 'type' => 'raw',
							// 'value' => '$data->content',
						// ),
						'image'=>array(
							'name' => 'image',
							'type'=>'raw',
							'filter'=>false,
							'value'=>'CHtml::image(getImage($data->image,"80", "60" ))',
							'htmlOptions'=> array("class"=>"image"),
						),
						'created'=>array(
							'name'=>'created',
							'type'=>'raw',
							'filter'=>false,
							'value'=>'date(Yii::app()->params["date"],$data->created)',

						),
						array(
 							'class'=>'CButtonColumn',
							'template' => '{update}',
							'buttons'  => array(
								'update' => array(
									'options'=>array('class'=>'btn btn-mini btn-info icon-edit bigger-120','title'=>'Sửa tin tức' ),																							
									'imageUrl' => false,
									'label'=>false,
									'url' => 'PIUrl::createUrl("/admin/news/update", array("id"=>$data->id,"type"=>"1"))',  
								),
								'delete' => array(
									'label'=>false,
									'options'=>array('class'=>'btn btn-mini btn-danger icon-trash bigger-120','title'=>'Xóa tin tức' ),
									'imageUrl' => false,
								),						
							 ),
							'deleteConfirmation'=>'Bạn có muốn xóa tin tức này không?',
						),	
					),
				));?>
				</form>
				<?php }else{ ?>
				<a href="<?php echo PIUrl::createUrl('/admin/news/create/',array("type"=>2));?>" class="btn btn-primary">
					<i class="icon-ok bigger-110"></i>
					<?php echo translate('Thêm');?>
				</a>
				<form method="post">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'news-grid',
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
								'name',								
								'categories.name' => array(
									'name' => 'category_news_id',
									'type' => 'raw',
									'value' => 'isset($data->categories->name) ? $data->categories->name :  ""',
									'filter' => CHtml::dropDownList('News[category_news_id]', 0, CategoriesNews::model()->getDataCategories1()),
								),
								'image'=>array(
									'name' => 'image',
									'type'=>'raw',
									'filter'=>false,
									'value'=>'CHtml::image(getImage($data->image,"80", "60" ))',
									'htmlOptions'=> array("class"=>"image"),
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
											'options'=>array('class'=>'btn btn-mini btn-info icon-edit bigger-120','title'=>'Sửa tin tức' ),																							
											'imageUrl' => false,
											'label'=>false,
											'url' => 'PIUrl::createUrl("/admin/news/update", array("id"=>$data->id,"type"=>"2"))',  
										),
										'delete' => array(
											'label'=>false,
											'options'=>array('class'=>'btn btn-mini btn-danger icon-trash bigger-120','title'=>'Xóa tin tức' ),
											'imageUrl' => false,
										),						
									 ),
									'deleteConfirmation'=>'Bạn có muốn xóa tin tức này không?',
								),	
							),
						)); ?>
				
				<?php } ?>
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
			var arrIdNew = $("#news-grid").yiiGridView('getSelection');
			if(arrIdNew != ""){
				var answer = confirm ("Bạn có muốn xóa các tin tức được chọn không?");
				if(answer){
					var arrIdNew = $("#news-grid").yiiGridView('getSelection');
					window.location.href = "<?php echo PIUrl::createUrl('/admin/news/deleteAll/');?>"+"?id="+arrIdNew;
				}
			}
		});
		$(".deleteAll1").live('click', function(){
			var arrIdNew = $("#news-grid").yiiGridView('getSelection');
			if(arrIdNew != ""){
				var answer = confirm ("Bạn có muốn xóa các tin tức được chọn không?");
				if(answer){
					var arrIdNew = $("#news-grid").yiiGridView('getSelection');
					window.location.href = "<?php echo PIUrl::createUrl('/admin/news/deleteAll1/');?>"+"?id="+arrIdNew;
				}
			}
		});
	})
</script>