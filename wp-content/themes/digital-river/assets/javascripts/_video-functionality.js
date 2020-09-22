jQuery(document).ready(function($){

  var video = {videos:[]};
  video.play = function(vimeoId) {
    if($("#video-"+vimeoId).length === 0){
      var $div = $("<div>", {id: "video-"+vimeoId, "class": "a"});
      $("#videosWrapper").append($div);
    }
    window.currentVideo = new Vimeo.Player("video-"+vimeoId, {id:vimeoId});
    video.videos.push(window.currentVideo);
    window.currentVideo.play().then(function() {
      // the video was played
      console.log("test");

    }).catch(function(error) {

      console.log(error);

      switch (error.name) {
        case 'PasswordError':
            // the video is password-protected and the viewer needs to enter the
            // password first
            break;

        case 'PrivacyError':
            // the video is private
            break;

        default:
            // some other error occurred
            break;
      }
    });

  }

  $(document).on("click",".play-video", function(){ 
    video.play($(this).data("vimeoid"));
  });

  $('.videos-modal').on('hidden.bs.modal', function () {
    for(var i = 0; i < video.videos.length; i++) {
    	video.videos[i].pause();
    }
  });

});
