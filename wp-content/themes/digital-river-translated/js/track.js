jQuery(document).ready(function($){
    
    createCookie = function(name,value,days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/";
    }
    readCookie = function(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    eraseCookie = function(name) {
        createCookie(name,"",-1);
    }


    var get_device = function(){
      if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        return "Mobile";
      }

      return "Desktop";
    }


    var get_browser = function(){

        var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
        if(isOpera) return "Opera";
            // Firefox 1.0+
        var isFirefox = typeof InstallTrigger !== 'undefined';
        if(isFirefox) return "Firefox";

            // At least Safari 3+: "[object HTMLElementConstructor]"
        var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
        if(isSafari) return "Safari";

            // Internet Explorer 6-11
        var isIE = /*@cc_on!@*/false || !!document.documentMode;
        if(isIE) return "IE";

            // Edge 20+
        var isEdge = !isIE && !!window.StyleMedia;
        if(isEdge) return "Edge";

            // Chrome 1+
        var isChrome = !!window.chrome && !!window.chrome.webstore;
        if(isChrome) return "Chrome";

            // Blink engine detection
        var isBlink = (isChrome || isOpera) && !!window.CSS;
        if(isBlink) return "Blink";


        return false;
    }


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

    var send_info = function(geoipResponse, type){


        if(type == undefined){
          type  = page_info.type;
        }

        $.post( global_var.template_path+"/smart.php", {
            info: get_user_id(),
            type: type,
            page_info: page_info,
            location_data:geoipResponse,
            longitude: geoipResponse.location.longitude,
            latitude: geoipResponse.location.latitude,
            browser:get_browser(),
            device:get_device()
          })
        .done(function( user_cookie ) {

            if(user_cookie == "false"){

                var cookieNames = document.cookie.split(/=[^;]*(?:;\s*|$)/);
                for (var i = 0; i < cookieNames.length; i++) {
                    if (/^dr_/.test(cookieNames[i])) {
                        document.cookie = cookieNames[i] + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT; ';
                    }
                }
                return false;
            }

          try {


              user_info = JSON.parse(user_cookie);

              for (var key in user_info) {
                if (user_info.hasOwnProperty(key)) {
                  eraseCookie("dr_"+key);
                  createCookie("dr_"+key, user_info[key], 365);
                }
              }

          } catch (e) {
            
                var cookieNames = document.cookie.split(/=[^;]*(?:;\s*|$)/);
                for (var i = 0; i < cookieNames.length; i++) {
                    if (/^dr_/.test(cookieNames[i])) {
                        document.cookie = cookieNames[i] + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT; ';
                    }
                }
          }

        }).fail(function(xhr, status, error) {
           // console.log(xhr.status);
           // console.log(xhr.responseText);
           // console.log(error);
      });
    }
 
    var onError = function (error) {
        return;
    };
 
    geoip2.city( send_info, onError );

});
