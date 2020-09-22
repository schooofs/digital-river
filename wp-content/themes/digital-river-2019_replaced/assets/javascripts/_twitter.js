jQuery(function ($) {
    $(".tweet").tweet({
        username: "DigitalRiverInc", // define your twitter username
        avatar_size: 16, // avatar size in px
        count: 3, // how many tweets to show
        loading_text: "loading tweets..."
    });
});