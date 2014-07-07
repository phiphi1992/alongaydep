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
			<h1>Chi tiết đơn hàng</h1>
		</div><!--/.page-header-->
		<a href="<?php echo PIUrl::createUrl('/admin/bill/');?>" class="btn btn-primary">
			<i class="icon-ok bigger-110"></i>
			<?php echo translate('Quay lại');?>
		</a>
		<div class="row-fluid">
			<div class="span12">
				<form method="post">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'billDetail-grid',
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
								'product.name' => array(
									'name' => 'product_id',
									'type' => 'raw',
									'value' => 'isset($data->product->name) ? $data->product->name :  ""',
									'filter' => false,
								),
								'number'=>array(
									'name' => 'number',
									'type' => 'raw',
									'filter' => false,
									'value' => '$data->number',
								),
								'price'=>array(
									'name' => 'price',
									'type' => 'raw',
									'filter' => false,
									'value' => '$data->price',
								),	
							),
						)); ?>
			</form>	
			</div><!--/.span-->
			<?php if($total != null){ ?>
				<div class="total">Tổng tiền : <?php echo $total." VNĐ"; ?></div>
			<?php } ?>
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
.total{float:right; font-weight:bold;}
</style>