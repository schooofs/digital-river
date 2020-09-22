<?php

add_action( 'amp_post_template_css', 'dr_amp_additional_css_styles' );

function dr_amp_additional_css_styles( $amp_template ) {
  // only CSS here please...
  ?>

  a {
    color: #00a7e1;
    text-decoration: none;
    font-size: 19px;
  }
    
  p {
    margin: 0 0 13.5px;
    font-weight: 300;
    line-height: 1.6;
    letter-spacing: .75px;
    font-size: 19px;
    color: #666;
    }

  ul {
    margin-top: 0;
    margin-bottom: 13.5px;
    padding-left: 15px;
    font-size: 19px;
    font-weight: 400;
    line-height: 1.428571429;
    color: #666;
  }

  header.amp-wp-header {
    padding: 12px 15px 6px;
    top: 0px;
    left:0px;
    box-sizing:border-box;
    z-index: 1;
    width:100%;
    background: #fff;
    position:fixed;
  }

  header.amp-wp-header::after {
    content: "";
    display: table;
    clear: both;
}
  .amp-wp-header .dr-logo {
    display: block;
    float:left;
    padding-top:4px;
  }

  .amp-wp-header .back-btn {
    float: right;
    display: block;
    border: solid 1px #ccc;
    padding: 7px 10px;
    border-radius: 3px;
  }

.amp-wp-footer-logo {
  background-image: url( '/wp-content/themes/digital-river/assets/images/logo-two-tone.png' );
  background-repeat: no-repeat;
  background-size: contain;
  display: block;
  height: 45px;
  margin: 0 auto;
  text-indent: -9999px;
  margin-bottom: 15px;
}

  @font-face {
  font-family: 'mr-eaves-xl-modern';
  src: url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Reg.eot");
  /* IE9 Compat Modes */
  src: url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Reg.eot?#iefix") format("embedded-opentype"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Reg.woff2") format("woff2"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Reg.woff") format("woff"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Reg.ttf") format("truetype"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Reg.svg#svgFontName") format("svg");
  /* Legacy iOS */
  font-weight: normal;
  font-style: normal; }
@font-face {
  font-family: 'mr-eaves-xl-modern';
  src: url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Bold.eot");
  /* IE9 Compat Modes */
  src: url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Bold.eot?#iefix") format("embedded-opentype"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Bold.woff2") format("woff2"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Bold.woff") format("woff"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Bold.ttf") format("truetype"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-Bold.svg#svgFontName") format("svg");
  /* Legacy iOS */
  font-weight: bold;
  font-style: normal; }
@font-face {
  font-family: 'mr-eaves-xl-modern';
  src: url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-RegItalic.eot");
  /* IE9 Compat Modes */
  src: url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-RegItalic.eot?#iefix") format("embedded-opentype"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-RegItalic.woff2") format("woff2"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-RegItalic.woff") format("woff"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-RegItalic.ttf") format("truetype"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-RegItalic.svg#svgFontName") format("svg");
  /* Legacy iOS */
  font-style: italic;
  font-weight: normal; }
@font-face {
  font-family: 'mr-eaves-xl-modern';
  src: url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-BoldItalic.eot");
  /* IE9 Compat Modes */
  src: url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-BoldItalic.eot?#iefix") format("embedded-opentype"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-BoldItalic.woff2") format("woff2"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-BoldItalic.woff") format("woff"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-BoldItalic.ttf") format("truetype"), url("/wp-content/themes/digital-river/assets/fonts/MrEavesXLModOT-BoldItalic.svg#svgFontName") format("svg");
  /* Legacy iOS */
  font-style: italic;
  font-weight: bold; }
body { 
  font-family: mr-eaves-xl-modern,Helvetica,Arial,sans-serif;
  background-color: #e9e9e9;
}

.amp-wp-title {
  margin: 0;
}

.amp-wp-article{
  background-color: #fff;
  margin-top: 60px;
}

.amp-wp-blog-header {
  background-color: #002c57cc;
}

.amp-wp-blog-header .blog-label {
    margin: 0;
    text-transform: uppercase;
    padding: 8px 15px;
    font-size: 26px;
    font-weight: 500;
    display: inline-block;
    color: #fff;
}

.amp-wp-article-header {
    background-color: #03b5e8cc;
    color: #fff;
}

.amp-wp-title {
    margin: 0;
    font-size: 35px;
    font-weight: 500;
    padding: 12px 15px;
}

.amp-wp-article-content {
  padding: 0 18px;
  margin: 0 auto;
  background-color: #fff;
  background-image: url(/wp-content/themes/digital-river/images/pattern.png);
  background-size: 100% auto;
  padding-top: 2rem;
  padding-bottom: 25px;
}

.amp-wp-article-content h2{
    font-size: 35px;
    font-family: inherit;
    font-weight: 500;
    line-height: 1;
    color: #003058;
}

.amp-wp-article-content h3 {
    font-family: inherit;
    font-weight: 500;
    line-height: 1;
    color: #003058;
    font-size: 26px;
}

p:last-child {
  margin-bottom: 0;
  padding-bottom: 15px;
}

.amp-wp-footer{
  background-color: #003058;
}

.amp-wp-footer-inner{
  padding: 12px 12px;
}

.copy-right{
  margin-left: 5px;
  color: #fff;
  padding-top: 25px
}

.amp-wp-footer-menu {
  margin-left: 5px;
  padding-bottom: 15px;
}

.amp-wp-footer-menu p {
  margin-bottom: 0;
  color: #00a7e1;
}

.amp-wp-footer-menu p:last-child {
  padding: 0
}

blockquote {
    padding: 13.5px 27px;
    margin: 0 0 27px;
    font-size: 23.75px;
    border-left: 1px solid #e9e9e9;
    position: relative;
}
blockquote::before {
    top: 0;
}

blockquote::after {
    bottom: 0;
}

blockquote::after, blockquote::before {
    content: "";
    position: absolute;
    left: -5px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #e9e9e9;
}

.amp-share amp-img {
  display: inline-block;
  padding: 5px;
  margin: 5px;
}

#breadcrumbs {
  padding-left: 5px;
  font-size: 19px;
  padding-top: 25px;
  padding-bottom:25px;
}

#breadcrumbs span {
    color: #fff;
}

#breadcrumbs a:not(btn) {
    color: #00a7e1;
    text-decoration: none;
}

hr {
    margin-top: 27px;
    margin-bottom: 27px;
    border: 0;
    border-top: 1px solid #eee;
}

.back-link {
  color: #00a7e1;
  text-decoration: none;
  font-weight: 500;
  line-height: 1;
  font-size: 19px;
  float: right;
  padding-right: 5px;
}

.modified-date {
  margin-top: 1rem;
}

.amp-share {
  padding-bottom: 1rem;
}

.author-meta {
  padding-left: 20px;
  color: #fff;
  font-size: 21px;
}

.amp-wp-blog-header img {
    width: 100%;
}

ol {
  padding: 12px;
  font-family: mr-eaves-xl-modern,Helvetica,Arial,sans-serif;
  font-size: 19px;
  font-weight: 400;
  line-height: 1.428571429;
  color: #666;
}

.amp-wp-footer-contact a {
  display: inline-block;
  margin-bottom: 0;
  font-weight: 400;
  text-align: center;
  vertical-align: middle;
  touch-action: manipulation;
  background-image: none;
  border: 1px solid transparent;
  white-space: nowrap;
  text-transform: uppercase;
  padding: 9px 24px 9px;
  font-size: 19px;
  line-height: 1.35;
  border-radius: 2px;
  padding-top: 10px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  color: #fff;
  background-color: #00a7e1;
  border-color: #00a7e1;
  text-decoration: none;
}

.amp-wp-article-content blockquote:last-child {
  margin-bottom: 0;
}

  <?php
}