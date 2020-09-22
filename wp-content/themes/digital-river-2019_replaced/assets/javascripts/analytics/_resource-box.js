// Send Impression Event
$(".resource").one('classChange', function() {
	if($(this).data("name") !== undefined) {
		dataLayer.push({'resourceName':$(this).data("name"), 'event':'resource-box-impression'});
	}
});