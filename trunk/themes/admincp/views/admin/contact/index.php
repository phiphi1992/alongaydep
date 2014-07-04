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
			<li class="active"><?php echo translate('Thư Góp Ý');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Thư Góp Ý');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					
					'id'=>'contact-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'htmlOptions'=>array(),
					'emptyText' => 'Không có kết quả hiển thị',
					'itemsCssClass'=>'table table-striped table-bordered table-hover',
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
						'email',
						'title',
						
						
						'created'=>array(
							 'name'=>'created',
							 'filter'=>false,
							'type'=>'raw',
							'value'=>'date(Yii::app()->params["date"],$data->created)',
						),
						array(
							'header' => '<input type="button" name="deleteAll" class="deleteAll btn btn-mini btn-danger icon-trash bigger-120" value="Xóa" />',
							'class'=>'CButtonColumn',
							'htmlOptions'=>array('style'=>'width: 90px'),
							'template' => '{view}{update}{delete}',		
							'buttons'  => array(
								'view' => array(
									'options'=>array('class'=>'btn btn-mini btn-success icon-ok bigger-120','data-toggle'=>'modal', 'data-target'=>'#myModal' ,'title'=>'Xem thư liên hệ' ),																							
									'imageUrl' => false,
									'label'=>false,
									
								),
								'update' => array(
									'options'=>array('class'=>'btn btn-mini btn-info icon-edit bigger-120','title'=>'Sửa thư liên hệ'),																							
									'imageUrl' => false,
									'label'=>false,
								),
								'delete' => array(
									'label'=>false,
									'options'=>array('class'=>'btn btn-mini btn-danger icon-trash bigger-120','title'=>'Xóa thư liên hệ'  ),
									'imageUrl' => false,
									
								),										
							 ),
							'deleteConfirmation'=>'Bạn có muốn xóa thư liên hệ này không?',
						),
					),
					
				)); ?>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
       <i class="icon-spinner icon-spin orange bigger-125"></i> Đang tải...
      </div>
	  <div class="page-content">

		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				
							
				<div class="control-group">
					
					<div class="controls">
						
					</div>
				</div>
				
				<div class="control-group">
					
					<div class="controls">
						
					</div>
				</div>
				
				
				<div class="hr hr-double dotted"></div>
			</div>
		</div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style>
.grid-view .filters input, .grid-view .filters select {
    width: 95%;
}
.btn-success{margin-right:3px;}
.btn-info{margin-right:3px;}
input[type="checkbox"]{opacity:0.5;}
input[type="checkbox"]{opacity:0.5;}
.select-on-check-all{ margin-top:-7.3px !important;}
</style>
<script>
	$("document").ready(function(){
		$(".deleteAll").click(function(){
			var arrIdNew = $("#contact-grid").yiiGridView('getSelection');
			if(arrIdNew != ""){
				var answer = confirm ("Bạn có muốn xóa các thư liên hệ được chọn không?");
				if(answer){
					var arrIdNew = $("#contact-grid").yiiGridView('getSelection');
					window.location.href = '<?php echo PIUrl::createUrl('admin/contact/deleteAll');?>'+"?id="+arrIdNew;
				}
			}
		});
		// display content 
		$(".btn-success").on('click', function(){
			var id= $(this).attr('href');
			var id = id.split("/");
			$.ajax({url: webroot +"/admin/contact/getContentByID/id/"+id,dataType: "json",success:function(data){
				$('#myModal .modal-body').html(data[0]);
				$('#myModal .modal-title').html("Tiêu đề: "+data[1]);
			}});
		});
	})
</script>