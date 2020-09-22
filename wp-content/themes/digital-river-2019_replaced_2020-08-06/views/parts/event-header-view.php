<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<style>
  body .body-wrapper .body-inner-wrapper {
    background-color:transparent;
    background-image:none;
  }
  body.fixed .body-wrapper .body-inner-wrapper {
    background-color:#00a7e1;
  }
  header.navbar.main-nav {
    box-shadow:0 1px 1px rgba(0,0,0,0.1);
    border:0;
  } 
  .navbarContents {
    display:flex;
    justify-content:space-between;
    align-items:center;
    min-height:100px;
  }
  .main-nav .main-nav-items {
    display:flex;
    align-items:center;
  }
  .navbar-nav>li>a {
    color:#fff;
    padding-right:15px;
  }
  /*.navbar-nav>li>a.btn {
    padding:9px 24px 9px;
  }*/
  .fixed .navbar-nav>li>.btn-primary {
    background-color:#003058;
  }
  .nav>li>a:active,
  .nav>li>a:hover {
    color:rgba(255,255,255,0.75);
  }
   .nav>li>a:focus {
    color:#fff;
  }
  .logo {
    display:block;
    width:auto !important;
  }
  .logo > svg {
    width:272px;
    height:46px;
    display:block
  }
  .logo-digital {
    fill:#fff;
  }
  .logo-river {
    fill:#00a7e1;
  }
  .fixed .logo-river {
    fill:#fff;
  }
  .navbar-toggle .icon-bar {background-color:#fff;}
  .navbar-toggle {border-color:#fff;}
  .overlayBG {
    background:rgba(0,0,0,0.2);
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
  }
  .heroHeader {
    padding:calc(10rem + 100px) 0 10rem;
    background-image:url('/wp-content/uploads/cc-hero.jpg') !important;
    background-position:center;
  }
  .ccHeadline {
    font-size:4.6rem;
    margin:0 0 5px;
  }
  .reason {
    max-width:420px;
    margin:auto;
  }
  .reasonSVG {
    margin-bottom:30px;
  }
  .reasonTitle {
    font-size:2.4rem;
    color:#00a7e1;
    margin-bottom:15px;
  }
  .reasonCopy {
    font-size:16px;
    line-height:1.4;
  }
  .bg-white {
    background-color:#fff;
  }
  #about {overflow:hidden;}
  #about > .row {
    display:flex;
    flex-wrap:wrap;
  }
  #about .blankBG {
    background-image:url('/wp-content/uploads/cc-about.jpg');
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
  }
  #about .blankBG + div {
    padding:100px 50px 100px 30px;
  }
  #sponsors .sponsors .sponsor img {
    width:auto;
    height:auto;
    margin:0 0 40px 0;
    display:block;
    max-width:100%;
    max-height:125px;
  }
  #sponsors .sponsors .sponsor p {
    margin:0 0 66px 0;
  }
  #sponsors .speaker_sponsors {
    display:flex;
    flex-wrap:wrap;
  }
  #sponsors .speaker_sponsors .speaker_sponsor {
    display:flex;
    justify-content:center;
    align-items:center;
    width:33.33333333%;
    height:200px;
    padding:15px;
    border:1px solid #e9e9e9;
    margin:-1px 0 0 -1px;
  }
  #sponsors .speaker_sponsors .speaker_sponsor img {
    width:auto;
    height:auto;
    margin:auto;
    display:block;
    max-width:100%;
    max-height:170px;
  }
  #agenda {
    background-image:url('/wp-content/uploads/cc-agenda.jpg');
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
  }
  #agenda .agenda-item {
    display:flex;
    align-items:center;
    flex-wrap:wrap;
    padding:5px 50px;
  }
  #agenda [data-toggle="collapse"].agenda-item {
    cursor:pointer;
  }
  #agenda [data-toggle="collapse"].agenda-item:hover {
    background-color:#00a7e1;
    color:#fff;
  }
  #agenda .row {
    margin-left: -20px !important;
    margin-right: -20px !important; 
  }
  #agenda .collapse,
  #agenda .collapsing,
  #agenda [aria-expanded="true"] {
    background-color:rgba(255,255,255,0.1);
  }
  #agenda .description {
    padding:10px 50px;
  }
  #agenda .description .speaker-info {
    display:block;
    margin-bottom:15px;
  }
  #agenda .description .speaker-info > span:not(:empty)::after {
    content:' - ';
  }
  #agenda .description .speaker-info > span:last-of-type::after {
    content:'';
  }
  #agenda .headline {
    margin-top:15px;
    margin-bottom:15px;
    position:relative;
    padding-right:20px;
  }
  #agenda [data-toggle="collapse"] .headline::after {
    content:"\f077";
    font-family:"Font Awesome 5 Free";
    font-weight:900;
    -webkit-font-smoothing:antialiased;
    display:inline-block;
    font-style:normal;
    text-rendering:auto;
    line-height:1;
    font-variant:normal;
    transition:transform 200ms;
    position:absolute;
    right:0;
    top:50%;
    transform:translateY(-50%);
  }
  #agenda [data-toggle="collapse"].collapsed .headline::after {
    transform:rotate(-180deg) translateY(50%);
  }
  #agenda .date_time {
    color:#00a7e1;
  }
  #agenda [data-toggle="collapse"].agenda-item:hover .date_time {
    color:#fff;
  }
  #agenda .session-content {
    border-bottom:1px solid #bebebe;
    padding:5px 0;
  }
  #speakers .speaker-row {
    display:flex;
    flex-wrap:wrap;
  }
  #speakers .speaker {
    width:calc(25% - 20px);
    margin:10px;
    position:relative;
    background-position:center;
    background-repeat:no-repeat;
    display:flex;
    flex-flow:column;
  }
  /* ▼▼▼ Remove style for non IE/EDGE hack ▼▼▼ */
  @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
    /* IE10+ CSS */
    #speakers .speaker {width:calc(25% - 24px);}
  }
  @supports (-ms-accelerator:true) {
    /* Edge 12+ CSS */
    #speakers .speaker {width:calc(25% - 24px);}
  }
  @supports (-ms-ime-align:auto) {
    /* Edge 16+ CSS */
    #speakers .speaker {width:calc(25% - 24px);}
  }
  /* ▲▲▲ Remove style for non IE/EDGE hack ▲▲▲ */
  #speakers .speaker.expanded::after {
    content:'';
    position:absolute;
    top:100%;
    left:0;
    height:20px;
    width:100%;
    background:#003058;
  }
  #speakers .speaker-img {
    height:0;
    padding-top:100%;
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
  }
  #speakers .speaker-info {
    position: relative;
    padding:10px 50px 10px 10px;
    flex: 2 ;
  }
  #speakers .speaker-info p {
    line-height:1.2;
    margin:0;
  }
  #speakers .speaker-bio {
    position: relative;
    padding:30px;
    width:calc(100% - 20px);
    margin:10px;
    display:none;
  }
  #speakers .speaker .speaker-bio {
    display:none;
  }
  #speakers button {
    display:inline-block;
    margin:0;
    font-weight:400;
    text-align:center;
    vertical-align:middle;
    touch-action:manipulation;
    cursor:pointer;
    background-image:none;
    border:0;
    white-space:nowrap;
    padding:0;
    height:50px;
    width:50px;
    font-size:50px;
    line-height: 1;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
    -webkit-appearance:button;
    color:#00a7e1;
    background:transparent;
    position:absolute;
    right:0;
    bottom:0;
    transition:transform 200ms ease-out;
  }
  #speakers button:focus {outline:none;}
  #speakers .speaker.expanded button,
  #speakers .speaker-bio button {
    transform:rotate(-135deg);
  }
  #location {
    padding-left:8.3333333333%;
  }
  #location > .row {
    display:flex;
    flex-wrap:wrap;
  }
  #location.bg-lightBlue a:not(.btn) {
    color:#003058;
  }
  #gmap_canvas {
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100% - 20px);
    height: 100%;
  }
  #footer .copyright {
    font-size:14px;
    color:#000;
  }
  #footer .social {
    font-size:32px;
    text-align:right;
  }
  #footer .social a {
    display:inline-block;
    margin-left:20px;
    color:#000;
  }
  .heroHeader .box {min-width:780px;}
  @media (max-width:1199px) {
    #sponsors .speaker_sponsors .speaker_sponsor {width:50%;}
  }
  @media (max-width:991px) {
    .reason {max-width:600px;}
    .heroHeader .box {min-width:590px;}
    .navbarContents {display:block;min-height:1px;}
    .main-nav .logo {padding:14px 0px 7px;}
    .heroHeader {padding:calc(8rem + 67px) 0 8rem;}
    #location {padding:0;}
    #gmap_canvas {
      position:static;
      width:100%;
      min-height:300px;
    }
    /*#sponsors > .row > [class^="col"] {padding:0 29px 0 31px;}*/
    #sponsors .speaker_sponsors .speaker_sponsor {width:20%;}
    #speakers .speaker {width:calc(33.3333333333% - 20px);}
  }
  @media (max-width:767px) {
    .heroHeader .box {min-width:1px;}
    .main-nav .main-nav-items {display:block;text-align:right;}
    .navbar-nav .navbar-nav>li:last-child {margin-bottom:10px;}
    .heroHeader {background-position:bottom center;}
    .navbarContents {padding-left:0px;}
    .navbarContents .navbar-header {padding-left:20px;}
    body:not(.fixed) .navbar-collapse {background-color:rgba(0,0,0,0.75);}
    #agenda .description,
    #agenda .agenda-item {padding-left:15px;padding-right:15px;}
    #about .blankBG {display:none;}
    #about .blankBG + div {
      background-image:url('/wp-content/uploads/cc-about.jpg');
      background-position:center;
      background-repeat:no-repeat;
      background-size:cover;
      padding:80px 50px;
    }
    #about .blankBG + div > * {position:relative;z-index:9}
    #about .blankBG + div::after {
      content:'';
      position:absolute;
      top:0;
      left:0;
      width:100%;
      height:100%;
      background:rgba(255,255,255,0.9);
    }
    #sponsors .speaker_sponsors .speaker_sponsor {width:25%;}
    #footer .social {text-align:left;}
    #footer .social a {margin:20px;}
    #footer .social a:first-of-type {margin-left:0;}
  }
  @media (max-width:666px) {
    #speakers .speaker {width:calc(50% - 20px);}
    #sponsors .speaker_sponsors .speaker_sponsor {width:33.33333333%;}
  }
  @media (max-width:450px) {
    #speakers .speaker {width:calc(100% - 20px);}
    #sponsors .speaker_sponsors .speaker_sponsor {width:50%;}
  }
  @media (max-width:419px) {
    .main-nav .logo {padding:17px 0px 10px;}
    .logo > svg {width:212px;height:36px;}
    .heroHeader {padding:calc(6rem + 63px) 0 6rem;}
  }
  .logged-in .main-nav {top:0;}
</style>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCV324G" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- Maxymizer Tag-->
<script src="//service.maxymiser.net/api/us/digitalriver.com/410ef6/mmapi.js"></script>


<div class="body-inner-wrapper navbar-fixed-top">
    <header class="navbar main-nav">
        <div class="row">
            <div class="navbarContents col-md-10 col-md-offset-1 pad-r-sm-4 pad-r-md-2">
                <div class="navbar-header">
                    <button aria-controls="bs-navbar" aria-expanded="false" class="collapsed navbar-toggle" data-target="#main-navbar" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 301.09 51.09"><title>Go to the home page</title><path d="M9.42,38.84H16a19,19,0,0,0,7.53-1.52,19.39,19.39,0,0,0,0-35.76A19,19,0,0,0,16,0H0v38.8H5.49V5.56H16a13.78,13.78,0,0,1,5.32,1.06,13.56,13.56,0,0,1,7.53,7.53,14,14,0,0,1,0,10.68,13.63,13.63,0,0,1-7.53,7.5A13.76,13.76,0,0,1,16,33.39H11.46Zm30.76,0h5.49V11.56H40.18Zm0-33.31h5.49V0H40.18ZM54.72,48.65a23.21,23.21,0,0,0,10.19,2.44c6.4,0,13.94-3.62,13.94-14V11.56H73.36v3l-1.13-.86a15.57,15.57,0,0,0-3.85-2.11,13.94,13.94,0,0,0-5-.84A13.13,13.13,0,0,0,58,11.87,12.71,12.71,0,0,0,53.7,15a14.32,14.32,0,0,0-2.76,4.6,16.08,16.08,0,0,0-1,5.67,14,14,0,0,0,1.15,5.64,15,15,0,0,0,3.13,4.61,14.55,14.55,0,0,0,4.6,3.1,14.14,14.14,0,0,0,5.58,1.12h.12A14.44,14.44,0,0,0,69.17,39l-1.9-5.19a10.28,10.28,0,0,1-2.87.44,8.94,8.94,0,0,1-6.34-2.61,8.7,8.7,0,0,1-2.63-6.37,8.94,8.94,0,0,1,8.88-9h.12a8.69,8.69,0,0,1,6.35,2.62,9,9,0,0,1,2.62,6.35V36.73c0,7.9-5.91,9-9.15,9a20.58,20.58,0,0,1-7.64-2.06Zm30-9.81h5.49V11.56H84.72Zm0-33.31h5.49V0H84.72ZM96.08,4.2V30.06a8.48,8.48,0,0,0,.69,3.4,9.23,9.23,0,0,0,1.87,2.81,8.63,8.63,0,0,0,2.76,1.89,8.48,8.48,0,0,0,3.4.69h5.33l-2-5.49h-3.32a3.12,3.12,0,0,1-2.28-1,3.19,3.19,0,0,1-1-2.33V17h7.76l-2-5.49h-5.76V4.2Zm29.14,6.52a13.66,13.66,0,0,0-5.55,1.12,13.49,13.49,0,0,0-4.4,3.08,14.33,14.33,0,0,0-2.9,4.6,15.29,15.29,0,0,0-1,5.66,15.14,15.14,0,0,0,1,5.6,14.33,14.33,0,0,0,2.9,4.6,13.47,13.47,0,0,0,4.4,3.08,13.67,13.67,0,0,0,5.55,1.12,13.36,13.36,0,0,0,5.25-1l-1.81-5a10.24,10.24,0,0,1-2.87.43,9.31,9.31,0,0,1-3.45-.65,8.17,8.17,0,0,1-2.92-2A9,9,0,1,1,134.77,25s0,.08,0,.12V38.81h5.49V11.46h-5.49v3l-1.14-.9a14.42,14.42,0,0,0-3.63-2,12.9,12.9,0,0,0-4.74-.84Zm21.24,28.12H152V0h-5.5Z" class="logo-digital"/><path d="M189.83,38.84h6.55l-8-12.34.72-.34a13.36,13.36,0,0,0,3.19-2.1,13.67,13.67,0,0,0,2.46-2.87,14.07,14.07,0,0,0,1.59-3.47,13.59,13.59,0,0,0,.57-4,13.14,13.14,0,0,0-1.09-5.32,14,14,0,0,0-7.31-7.31A13.14,13.14,0,0,0,183.19,0H168.9V38.8h5.49V5.56h8.86A8,8,0,0,1,189.09,8a8.18,8.18,0,0,1,1.76,8.92,8.81,8.81,0,0,1-1.75,2.64A8,8,0,0,1,183.25,22H180l-2,5.54h4.51Zm12,0h5.49V11.56h-5.49Zm0-33.31h5.49V0h-5.49Zm20,33.31h7.58l9.85-27.28h-5.85l-7.88,21.53-7.88-21.53H211.8ZM246.6,27.93h22.79a14,14,0,0,0,.26-2.75,14.28,14.28,0,0,0-1.12-5.64,14.43,14.43,0,0,0-7.7-7.7,14.74,14.74,0,0,0-11.28,0,14.43,14.43,0,0,0-7.7,7.7,14.27,14.27,0,0,0-1.12,5.64c0,10.07,8.13,14.35,15.74,14.22a22.14,22.14,0,0,0,8.81-2.06l-1.71-4.71a20.38,20.38,0,0,1-7.66,1.47c-5.83,0-8.63-3.24-9.4-6.17Zm17.19-5.49H246.51l.43-1a8.52,8.52,0,0,1,1.81-2.63,9,9,0,0,1,6.35-2.62,8.69,8.69,0,0,1,6.35,2.62,8.56,8.56,0,0,1,1.81,2.63Zm16-7.2V11.46H274.3V38.83h5.49V25.12a9,9,0,0,1,2.61-6.34,8.65,8.65,0,0,1,5.66-2.6v-5.5a10.58,10.58,0,0,0-8.33,4.55Z" class="logo-river"/><path d="M292.13,13.47a4.48,4.48,0,1,1,4.49,4.47h0A4.47,4.47,0,0,1,292.13,13.47Zm8.37,0a3.9,3.9,0,1,0-3.91,3.89,3.9,3.9,0,0,0,3.91-3.89Zm-5.8-2.76h2.15a1.61,1.61,0,0,1,1.8,1.64,1.52,1.52,0,0,1-1.08,1.55l1.6,2.26H298L296.51,14h-.68v2.17H294.7Zm2,2.49a.85.85,0,1,0,0-1.7h-.89v1.7Z" class="logo-river"/></svg>
                    </a>
                </div>
                <nav class="collapse navbar-collapse" id="main-navbar">
                    <ul class="nav navbar-nav main-nav-items">
                        <div class="menu-main-container">
                          <ul id="menu-main" class="nav navbar-nav main-nav-items">
                            <li class="ccAbout menu-item menu-item-type-post_type menu-item-object-page"><a href="#about">ABOUT</a></li>
                            <li class="ccSponsors menu-item menu-item-type-post_type menu-item-object-page"><a href="#sponsors">SPONSORS</a></li>
                            <li class="ccAgenda menu-item menu-item-type-post_type menu-item-object-page"><a href="#agenda">AGENDA</a></li>
                            <li class="ccSpeakers menu-item menu-item-type-post_type menu-item-object-page"><a href="#speakers">SPEAKERS</a></li>
                            <li class="ccLocation menu-item menu-item-type-post_type menu-item-object-page"><a href="#location">LOCATION</a></li>
                            <li class="ccRegister menu-item menu-item-type-post_type menu-item-object-page"><button class="btn btn-primary" data-toggle="modal" data-target="#ccRegister">RSVP NOW</button></li>
                          </ul>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</div>
<?php do_action("abm_bar"); ?>
<div class="body-inner-wrapper">