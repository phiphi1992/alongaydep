<!--inline scripts related to this page-->
<script type="text/javascript">
	$(function() {
		var errorMsg = '<?php echo (yii::app()->user->hasFlash('error')) ? yii::app()->user->getFlash('error') : ''; ?>';
		var successMsg = '<?php echo (yii::app()->user->hasFlash('success')) ? yii::app()->user->getFlash('success') : ''; ?>';
		if(errorMsg != ''){
			message(errorMsg,'error');
		}
		if(successMsg != ''){
			message(successMsg,'success');
		}
		$('.dialogs,.comments').slimScroll({
			height: '300px'
		});
		//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
		//so disable dragging when clicking on label
		var agent = navigator.userAgent.toLowerCase();
		if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
		  $('#tasks').on('touchstart', function(e){
			var li = $(e.target).closest('#tasks li');
			if(li.length == 0)return;
			var label = li.find('label.inline').get(0);
			if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
		});
	
		$('#tasks').sortable({
			opacity:0.8,
			revert:true,
			forceHelperSize:true,
			placeholder: 'draggable-placeholder',
			forcePlaceholderSize:true,
			tolerance:'pointer',
			stop: function( event, ui ) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
				$(ui.item).css('z-index', 'auto');
			}
			}
		);
		$('#tasks').disableSelection();
		$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
			if(this.checked) $(this).closest('li').addClass('selected');
			else $(this).closest('li').removeClass('selected');
		});
		$('#id-input-file-1 , #id-input-file-2').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Chọn file',
			btn_change:'Thay đổi',
			droppable:false,
			onchange:null,
			thumbnail:false //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});
		$('#id-input-file-3').ace_file_input({
		style:'well',
		btn_choose:'Drop files here or click to choose',
		btn_change:null,
		no_icon:'icon-cloud-upload',
		droppable:true,
		thumbnail:'small'
		//,icon_remove:null//set null, to hide remove/reset button
		/**,before_change:function(files, dropped) {
			//Check an example below
			//or examples/file-upload.html
			return true;
		}*/
		/**,before_remove : function() {
			return true;
		}*/
		,
		preview_error : function(filename, error_code) {
			//name of the file that failed
			//error_code values
			//1 = 'FILE_LOAD_FAILED',
			//2 = 'IMAGE_LOAD_FAILED',
			//3 = 'THUMBNAIL_FAILED'
			//alert(error_code);
		}

	}).on('change', function(){
		//console.log($(this).data('ace_input_files'));
		//console.log($(this).data('ace_input_method'));
	});
	

	//dynamically change allowed formats by changing before_change callback function
	$('#id-file-format').removeAttr('checked').on('change', function() {
		var before_change
		var btn_choose
		var no_icon
		if(this.checked) {
			btn_choose = "Thả hình ảnh ở đây hoặc nhấn vào đây để chọn";
			no_icon = "icon-picture";
			before_change = function(files, dropped) {
				var allowed_files = [];
				for(var i = 0 ; i < files.length; i++) {
					var file = files[i];
					if(typeof file === "string") {
						//IE8 and browsers that don't support File Object
						if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
					}
					else {
						var type = $.trim(file.type);
						if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
								|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
							) continue;//not an image so don't keep this file
					}
					
					allowed_files.push(file);
				}
				if(allowed_files.length != files.length) {message('Chỉ cho phép tải lên hình ảnh.','error'); return false};
				if(allowed_files[0].size > 2097152) {message('Kích thước ảnh quá lớn(phải nhỏ hơn 2048KB).','error'); return false};
				if(files.length > 5) {message('Chỉ được tải lên tối đa 5 hình ảnh.','error'); return false};
				return allowed_files;
			}
		}
		else {
			btn_choose = "Drop files here or click to choose";
			no_icon = "icon-cloud-upload";
			before_change = function(files, dropped) {
				return files;
			}
		}
		var file_input = $('#id-input-file-3');
		file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
		file_input.ace_file_input('reset_input');
	});
	
	})
</script>