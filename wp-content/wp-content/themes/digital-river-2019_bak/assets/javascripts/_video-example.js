// $(function() {
//     $("#playlist li").on("click", function() {
//         $("#videoarea").attr({
//             "src": $(this).attr("movieurl"),
//             "poster": "",
//             "autoplay": "autoplay"
//         })
//     })
//     $("#videoarea").attr({
//         "src": $("#playlist li").eq(0).attr("movieurl"),
//         "poster": $("#playlist li").eq(0).attr("moviesposter")
//     })
// })

// // svg play button 

// var videoPlayButton,
//     videoWrapper = document.getElementsByClassName('video-wrapper')[0],
//     video = document.getElementsByTagName('img')[0],
//     videoMethods = {
//         renderVideoPlayButton: function() {
//             if (videoWrapper.contains(video)) {
//                 this.formatVideoPlayButton()
//                 video.classList.add('has-media-controls-hidden')
//                 videoPlayButton = document.getElementsByClassName('video-overlay-play-button')[0]
//                 videoPlayButton.addEventListener('click', this.hideVideoPlayButton)
//             }
//         },

//         formatVideoPlayButton: function() {
//             videoWrapper.insertAdjacentHTML('beforeend', '\
//                 <svg class="video-overlay-play-button" viewBox="0 0 200 200" alt="Play video">\
//                     <a href="" data-toggle="modal" data-target="#exampleModal"><polygon points="70, 55 70, 145 145, 100" fill="transparent" stroke="#fff"/></a>\
//                 </svg>\
//             ')
//         },

//         hideVideoPlayButton: function() {
//             // video.play()
//             // videoPlayButton.classList.add('is-hidden')
//             // video.classList.remove('has-media-controls-hidden')
//             // video.setAttribute('controls', 'controls')
//         }
//     }

// videoMethods.renderVideoPlayButton()

// // equal col height

// var maxHeight = 0;
// $(".equalHeight").each(function(){
//   maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
// }).height(maxHeight)