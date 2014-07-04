$(document).ready(function(){
	
});
function message(msg,type,time,position){
	if(typeof(time) == 'undefined'){
		time = 3000;
	}
	if(typeof(type) == 'undefined'){
		type = 'notice';
	}
	if(typeof(position) == 'undefined'){
		position = 'top-right';
	}
	$().toastmessage('showToast', {
		text     : msg,
		sticky   : false,
		position : position,
		stayTime : time,
		type     : type,
		closeText: '',
	});
}