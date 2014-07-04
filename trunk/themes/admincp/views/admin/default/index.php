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
			<li class="active"><?php echo translate('Tổng quan');?></li>
		</ul><!--.breadcrumb-->
	</div>
	<div class="page-content">
		

		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<div class="row-fluid">	
					<article class="post-content"><p><span style="font-size: medium;"><strong>KOVO.VN – Giải pháp trực tuyến tiết kiệm nhất !</strong> </span></p>
					<p>Chúng tôi cam kết với việc hỗ trợ tối đa 24/7 để phục vụ website của quý khách hàng tốt nhất có thể.</p>
					<p><em>Bạn có thể liên hệ ngay:</em><br>
					<em>VP giao dịch: 44 Trần Quý Cáp, Hải Châu, Đà Nẵng</em><br>
					<em>Tổng đài : 1900 8003 </em><br>
					<em>Hotline: 0913 33 44 69</em></p>
					</article>	
				</div><!--/row-->
				<div class="hr hr-18 dotted hr-double"></div>
				<div class="row-fluid">				
					<div class="span12">
						<div class="widget-box transparent">
							<div class="widget-header widget-header-flat">
								<h4 class="lighter">
									<i class="icon-signal"></i>
									Thư liên hệ
								</h4>

								
							</div>

							<div class="widget-body">
								<div class="widget-main padding-4">									
									<div id="sales-charts">
										<table id="sample-table-1" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>												
												<th>STT</th>
												<th>Tiêu đề</th>
												<th>Tên</th>
												<th>Email</th>												
												<th>Ngày góp ý</th>
												<th></th>
											</tr>
										</thead>
																				
										<tbody>
										<?php if(!empty($contact)){
											$i=1;
											foreach($contact as $comment):?>	
											<tr>
											
												<td>
												<?php echo $i;?>	
												</td>
												<td><?php echo $comment->title ;?></td>
												<td><?php echo $comment->name ;?></td>
												<td><?php echo $comment->email ;?></td>
												<td><?php echo date(Yii::app()->params["date"],$comment->created) ;?></td>																							
												<td>													
														<button rel="<?php echo  $comment->id;?>" class="btn btn-mini btn-success" data-target="#myModal" data-toggle="modal">
															<i class="icon-ok bigger-120"></i>
														</button>																																						
												</td>
											</tr>
											<?php $i++; endforeach;}else{?>
											<span>Không có thư liên hệ</span>
											<?php }?>											
										</tbody>
									</table>
									<button type="button" onclick="location.href='<?php echo PIUrl::createUrl('/admin/contact');?>'" class="btn btn-small btn-success" ><i class="icon-arrow-right icon-on-right bigger-110"></i><?php echo translate('Xem Tất Cả');?></button>
									</div>								
								</div><!--/widget-main-->
							</div><!--/widget-body-->
						</div><!--/widget-box-->
					</div>
				</div>
			</div>	<!--PAGE CONTENT ENDS-->
		</div><!--/.span-->
	</div><!--/.row-fluid-->
</div><!--/.page-content-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <i class="icon-spinner icon-spin orange bigger-125"></i> Đang tải...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
	$("document").ready(function(){				
		// display content 
		$(".btn-success").on('click', function(){
			var id= $(this).attr('rel');
			$.ajax({url: webroot +"/admin/contact/getContentByID/id/"+id,dataType: "json",success:function(data){
				$('#myModal .modal-body').html(data[0]);
				$('#myModal .modal-title').html("Tiêu đề: "+data[1]);
			}});
		});
	})
</script>