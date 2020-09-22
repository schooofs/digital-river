$(function(){

	var personalize = function() {
		if(Cookie.read("dr_company_message") !== "false" && Cookie.read("Hide_Top_Bar") !== "true"){
			var $personalizeBar = $("<div>", {"id": "hideBar", "class": "bg-purple pad-t-xxs-1 pad-b-xxs-1 col-md-12 personalize-bar clearfix pull-right","style":"margin:0; z-index: 2; width: 100%;"});
			var $personalizeStatement = $("<div>", {"class": "h4 personalize-statement text-center txt-white"}).text(Cookie.read("dr_company_message"));
			var $personalizeRemove = $("<div>", {"class": "close h4 pull-right txt-white"}).html("&times;");
			$personalizeBar.append($personalizeStatement);
			$personalizeBar.append($personalizeRemove);
			$(".body-inner-wrapper.navbar-fixed-top").prepend($personalizeBar);
			dataLayer.push({'personalization_type':'Personalization Bar','personalization_action':'show', 'event': 'personalize'});

			setTimeout(function(){
				$(".body-inner-wrapper.main-body").css("margin-top", function (index, curValue) {
				    return (parseInt(curValue, 10) + $personalizeBar.outerHeight()) + 'px';
				});
			},50);
			$('.close').on('click', function() { 
				dataLayer.push({'personalization_type':'Personalization Bar','personalization_action':'hide', 'event': 'personalize'});
				Cookie.create("Hide_Top_Bar", true, 30); 
				$(".body-inner-wrapper.main-body").css("margin-top", function (index, curValue) {
				    return (parseInt(curValue, 10) - $personalizeBar.outerHeight()) + 'px';
				});
				document.getElementById('hideBar').style.display = 'none';
			});
		}
	}

	var check_for_personalization_cookie = function() {
		var personalize_count = 0;
		var personalize_interval = setInterval(function(){
		 	if(personalize_count > 9) {
				clearInterval(personalize_interval);
		 		return false;
			}
		 	if(Cookie.read("dr_company_name") !== null) {
				clearInterval(personalize_interval);
				personalize();
		 	}

		 	personalize_count++;
		}, 1000);
	}

	if(getParameterByName("abm") === "1") {
	    var cookieNames = document.cookie.split(/=[^;]*(?:;\s*|$)/);
	    for (var i = 0; i < cookieNames.length; i++) {
	        if (/^dr_/.test(cookieNames[i])) {
	      		Cookie.erase(cookieNames[i]);
	        }
	    }
	}

	if(window.location.href.search("request-demo") === -1)
    	check_for_personalization_cookie();

});