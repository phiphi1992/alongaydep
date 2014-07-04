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
			<li class="active"><?php echo translate('Danh sách câu hỏi') ;?></li>
		</ul><!--.breadcrumb-->
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1><?php echo translate('Danh sách câu hỏi');?></h1>
		</div><!--/.page-header-->

		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->

				<div class="row-fluid">
					<div class="span12">
					<!--PAGE CONTENT BEGINS-->
						<a href="<?php echo PIUrl::createUrl('/admin/questionAnswers/create/');?>" class="btn btn-primary">
							<i class="icon-ok bigger-110"></i>
							<?php echo translate('Thêm câu hỏi');?>
						</a>
						<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'questionanswers-grid',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'summaryText' => 'Hiển thị {start} - {end} của {count} kết quả ',
								'htmlOptions'=>array(),
								'emptyText' => 'Không có kết quả hiển thị',
								'selectableRows' => 2,
								'itemsCssClass'=>'table table-striped table-bordered table-hover dataTable',								
								'columns'=>array(
									array(
										'name'=>'id',										
										'class' => 'CCheckBoxColumn',
									),
									array(
										
										'header'=>'STT',
										'htmlOptions'=>array('style'=>'width: 30px'),
										'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
									),
									'question',									
									'created'=>array(
										 'name'=>'created',
										 'filter'=>false,
										'type'=>'raw',
										'value' => 'date("d-m-Y", $data->created)',
									),
									
									array(	
										'header' => '<input type="button" name="deleteAll" class="deleteAll btn btn-mini btn-danger icon-trash bigger-120" value="Xóa" />',	
										'class'=>'CButtonColumn',											
										'template'=>'{update}{delete}',
										'buttons'  => array(
											'update' => array(
												'options'=>array('class'=>'btn btn-mini btn-info icon-edit bigger-120','title'=>'Xem,Sửa câu hỏi' ),																							
												'imageUrl' => false,
												'label'=>false,												
											),
											'delete' => array(
												'label'=>false,
												'options'=>array('class'=>'btn btn-mini btn-danger icon-trash bigger-120','title'=>'Xóa câu hỏi' ),
												'imageUrl' => false,
												'beforeSend' => 'abc',
												
											)										
										 ),
										'deleteConfirmation'=>'Bạn có muốn xóa câu hỏi này không?',
									),
								),
							)); ?>
						
					</div><!--/span-->
				</div><!--/row-->

				
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
<style>
.grid-view .filters input, .grid-view .filters select {
    width: 95%;
}
.btn-info{margin-right:3px;}
input[type=checkbox], input[type=radio] {
opacity: 0.5;
position: absolute;
z-index: 12;
width: 18px;
height: 18px;
}
input[type="checkbox"]{opacity:1;}
.select-on-check-all{ margin-top:-7.3px !important; }
</style>
<script>
 $("document").ready(function(){
  $(".deleteAll").click(function(){
   var arrIdNew = $("#questionanswers-grid").yiiGridView('getSelection');
   if(arrIdNew != ""){
    var answer = confirm ("Bạn có muốn xóa các tin tức được chọn không?");
    if(answer){
     var arrIdNew = $("#questionanswers-grid").yiiGridView('getSelection');
     window.location.href = '/admin/questionAnswers/deleteAll/id/'+arrIdNew;
    }
   }
  });
 })
</script>