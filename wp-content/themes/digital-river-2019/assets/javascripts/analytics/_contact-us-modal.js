jQuery(document).ready(function($){
	$('.contact-us-modal').on('hidden.bs.modal', function(){
		dataLayer.push({'modal_type':'Contact Us Form','modal_action':'close','modal_progress':0,'event': 'modal'});
	});
});