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
			<li class="active"><?php echo translate('Thêm văn bản');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Thêm văn bản');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<div class="center">
					<form method="post" enctype="multipart/form-data" id="documents-form">
						<div class="row-fluid row-num-document">
							<div class="span4">
								<input class="span12" type="text" id="form-field-1" name="Documents[name][]" placeholder="Tên biểu mẫu">
							</div>
							<div class="span4" id="select-document-category">
								<select class="span12" name="Documents[category_document_id][]">
									<?php
										foreach($dataCategory as $k => $v){
											echo "<option value='".$k."'>".$v."</option>";
										}
									?>
								</select>
							</div>
							<div class="span4">
								<input type="file" class="id-input-file-1" id="id-input-file-1" name="Documents[filename][]"/>
							</div>
						</div>
						
						<div class="form-actions">
							<button type="button" class="btn btn-purple btn-button-add-row"><i class="icon-plus bigger-110"></i> Thêm dòng</button>
							<button class="btn btn-primary" id="submitForm" type="submit"><i class="icon-ok bigger-110"></i><?php echo translate('Lưu thông tin');?></button>
							<button type="button" onclick="location.href='<?php echo PIUrl::createUrl('/admin/documents');?>'" class="btn" ><i class="icon-undo bigger-110"></i><?php echo translate('hủy');?></button>
						</div>
					</form>
				</div>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
	</div><!--/.main-content-->
<script>

$(document).ready(function(){
		$('.id-input-file-1').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Chọn file',
			btn_change:'Thay đổi',
			droppable:false,
			onchange:null,
			before_change:before_change,
			thumbnail:false, //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			blacklist:'exe|php'
			//onchange:''
		});
		$(".btn-button-add-row").live('click',function(){
			var counter = $(".row-num-document").length;
			if(counter < 5){
				var html = '<div class="row-fluid row-num-document">\
						<div class="span4">\
							<input class="span12" type="text" id="form-field-1" name="Documents[name][]" placeholder="Tên biểu mẫu">\
						</div>\
						<div class="span4" class="">'+$("#select-document-category").html()+'</div>\
						<div class="span4">\
							<input type="file" class="id-input-file-1" id="id-input-file-1" name="Documents[filename][]"/>\
						</div>\
					</div>';
				$('.form-actions').before(html);
			}else{
				message('Lỗi: Bạn chỉ được phép thêm 5 tài liệu cùng lúc.','error');
			}
			
			$('.id-input-file-1').ace_file_input({
				no_file:'No File ...',
				btn_choose:'Chọn file',
				btn_change:'Thay đổi',
				droppable:false,
				onchange:null,
				before_change:before_change,
				thumbnail:false, //| true | large
				//whitelist:'gif|png|jpg|jpeg'
				blacklist:'exe|php'
				//onchange:''
			});
		});
		
		$("#documents-form").submit(function(){
			var _this = $(this);
			var error = true;
			$(".row-num-document").each(function(){
				var txtName = $(this).find('input[name="Documents[name][]"]').val();
				var txtCategory = $(this).find('[name="Documents[category_document_id][]"]').val();
				var txtFileName = $(this).find('input[name="Documents[filename][]"]').val();
				
				if(txtName == ""){
					$(this).find('input[name="Documents[name][]"]').attr("class", "span12 error");
					error = false;
				}else{
					$(this).find('input[name="Documents[name][]"]').attr("class", "span12");
				}
				if(txtCategory == 0){
					$(this).find('[name="Documents[category_document_id][]"]').attr("class", "span12 error");
					error = false;
				}else{
					$(this).find('[name="Documents[category_document_id][]"]').attr("class", "span12");
				}
				if(txtFileName == 0){
					$(this).find('[name="Documents[filename][]"]').parent().find("label").attr("class", "span12 error");
					error = false;
				}else{
					$(this).find('[name="Documents[filename][]"]').parent().find("label").attr("class", "span12");
				}
			});
			if(error)
			{
				$("#submitForm").attr('disabled', true);
			}else{
				message('Lỗi kiểm tra lại thông tin.','error');
				return false;
			}
		});
});
before_change = function(files, dropped) {
	var allowed_files = [];
	for(var i = 0 ; i < files.length; i++) {
		var file = files[i];
		if(typeof file === "string") {
			//IE8 and browsers that don't support File Object
			if(! (/\.(doc|docx|xlsx|xls)$/i).test(file) ) return false;
		}
		else {
			var type = $.trim(file.type);
			if( ( type.length > 0 && ! (/[document|sheet|excel|pdf]$/).test(type) )
					|| ( type.length == 0 && ! (/\.(doc|docx|xlsx|xls|pdf)$/).test(file.name) )//for android's default browser which gives an empty string for file.type
				) continue;//not an image so don't keep this file
		}
		
		allowed_files.push(file);
	}
	if(allowed_files.length == 0) {message('Chỉ cho phép tải file word or excel.','error'); return false};
	if(allowed_files[0].size > 2048000) {message('Kích thước file quá lớn(phải nhỏ hơn 2048KB).','error'); return false};
	return allowed_files;
}
</script>
<style>
.row-num-document .error{border:1px solid #D15B47;}

</style>