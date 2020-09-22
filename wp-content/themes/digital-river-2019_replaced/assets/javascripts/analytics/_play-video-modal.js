jQuery(document).ready(function($){

	$('.videos-modal').on('hidden.bs.modal', function(){
		dataLayer.push({'modal_type':'Video','modal_action':'close','modal_progress':window.currentVideo.getCurrentTime(),'event': 'modal'});
	});
	
});