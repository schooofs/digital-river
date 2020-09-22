var getParameterByName = function(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
          results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, " "));
}


jQuery(document).ready(function($) {

    var getRandom = function(min, max) {
      return Math.random() * (max - min) + min;
    }

    var get_user_id = function(){
        var user_id = readCookie("dr_id");

        if(user_id == undefined || user_id == "undefined" || user_id == null){
            user_id = false;
        }

        return user_id;
    }

    var send_info = function(){
        if(getParameterByName("account") !== null) {
          var account = getParameterByName("account");
        } else if(typeof window.abm_info != "undefined") {
          var account = window.abm_info.account_name;
        } else {
          var account = null;
        }

        $.post( global.ajaxurl, {
            action: "get_abm_info",
            account: account
        })
        .done(function( user_cookie ) {
          try {
            user_info = JSON.parse(user_cookie);
            for (var key in user_info) {
              if (user_info.hasOwnProperty(key)) {
                Cookie.create("dr_"+key, user_info[key], 365);
              }
            }
          } catch (e) {
            
                var cookieNames = document.cookie.split(/=[^;]*(?:;\s*|$)/);
                for (var i = 0; i < cookieNames.length; i++) {
                    if (/^dr_/.test(cookieNames[i])) {
                  		Cookie.erase(cookieNames[i]);
                    }
                }
          }

        })
    }
    send_info();
 
});

// @koala-prepend "_personalization.js"