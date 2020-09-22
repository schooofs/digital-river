	body {
		font-family: "DIN Next W01 Light", serif;
	}

	h1,h2,h3,h4,h5,h6,
	.h1,.h2,.h3,.h4,.h5,.h6{
		font-family: "DIN 1451 W01 Engschrift", serif;
	}

	a {
		color: #007eb5;
	}

	a:hover {
		color: #00a7e1;
	}

	p {
		margin: 0 0 2rem;
	}

	.h2 {
		font-size: 1.75rem;
	}

	.h3 {
		margin-bottom: 0.75rem;
	}

	.clear {
		clear: both;
	}

ul.list-unstyled {
		list-style-type: none;
		margin-top: 0;
		padding-left: 0;
}

	.logo-wrapper{
		max-width: 200px;
		margin: 10px auto 5px;
	}

	.blog-content,
	.blog-title,
	.related-posts {
		padding: 0 1rem;
	}

	.related-posts {
		padding: 2rem 1rem;
	}

		.related-posts .card.card-hr {
				margin: 0 0 1.5rem;
		}

				.related-posts a {
						text-decoration: none;
				}

				.related-posts .h2 {
						margin: 0 0 0.75rem;
				}

				.related-posts .h3 {
						margin: 0 0 0.5rem;
				}

	blockquote {
		background: #eeeeee;
		border: solid 1px #cccccc;
		margin: 2rem auto;
		padding: 1rem;
		position: relative;
	}

	blockquote::before,
	blockquote::after {
		content: "";
		background-repeat: no-repeat;
		width: 40px;
		height:40px;
		position: absolute;
	}

	blockquote::before {
		background-image:url('/wp-content/themes/digital-river-translated/img/svg/endquo-black.svg');
		left: 5px;
		top: 5px;
		transform:translateY(-50%);
	}

blockquote::after {
		background-image:url('/wp-content/themes/digital-river-translated/img/svg/startquo-black.svg');
		right: 5px;
		bottom: -25px;
	}

		blockquote p {
				margin: 0;
		}

footer > .container {
		padding: 0 1rem 2rem;
}

		footer .disclaimer {
				margin-bottom: 1rem;
		}

		footer .col-xs-6 {
				float: left;
				width: 50%;
		}





/* START HEADER STYLES */
#global_header {
	position: relative;
	z-index: 100;
}

#global_header nav ul {
	padding: 0;
	margin: 0;
}

#global_header nav ul li {
	list-style-type: none;
}

#global_header .header_container {
	background: #FFF;
}

#global_header .header_container .container {
	height: 50px;
}

#global_header .header_container .container .menu-item-language {
	position: relative;
}

#global_header .header_container .container .menu-item-language:after {
	font-family: FontAwesome;
	content: "\f0d7";
	position: absolute;
	top: 10px;
	right: 12px;
}

#global_header .header_container .container .menu-item-language ul li:after {
	content: "";
}

#global_header .header_container .container #logo {
	padding: 0;
	float: left;
	margin: .1em 0px .25em;
}

@media (min-width: 768px) {
	#global_header .header_container .container #logo {
		margin: 5px 0 3px;
	}
}

#global_header .header_container .container #logo a {
	display: block;
	margin: 0;
	width: 150px;
	padding: 11px 0 4px;
}

@media (min-width: 768px) {
	#global_header .header_container .container #logo a {
		width: 170px;
		padding: 5px 0px 5px;
	}
}

@media (min-width: 991px) {
	#global_header .header_container .container #logo a {
		width: 220px;
		padding: 0;
	}
}

@media (min-width: 1200px) {
	#global_header .header_container .container #logo a {
		width: 225px;
	}
}

#global_header .header_container .container #logo a svg {
	display: block;
	margin: 0;
	width: 100%;
}

#global_header .header_container .container .hamburger {
	float: right;
	overflow: hidden;
	margin-top: 10px;
}

@media (min-width: 768px) {
	#global_header .header_container .container .hamburger {
		display: none;
	}
}

#global_header .header_container .container .hamburger .icon-wrapper {
	position: relative;
	height: 1.9285714286em;
	width: 1.9285714286em;
	cursor: pointer;
}

#global_header .header_container .container .hamburger .icon-wrapper span {
	display: block;
	position: absolute;
	height: 0.2142857143em;
	width: 100%;
	background: #00a7e1;
	border-radius: 0.1428571429em;
	opacity: 1;
	left: 0;
	-webkit-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
	-o-transform: rotate(0deg);
	transform: rotate(0deg);
	-webkit-transition: 0.25s;
	-o-transition: 0.25s;
	transition: 0.25s;
}

#global_header .header_container .container .hamburger .icon-wrapper span:nth-child(1) {
	top: 0.4285714286em;
}

#global_header .header_container .container .hamburger .icon-wrapper span:nth-child(2), #global_header .header_container .container .hamburger .icon-wrapper span:nth-child(3) {
	top: 1em;
}

#global_header .header_container .container .hamburger .icon-wrapper span:nth-child(4) {
	top: 1.5714285714em;
}

#global_header .header_container .container .hamburger.active span:nth-child(1) {
	top: 1em;
	width: 0%;
	left: 50%;
}

#global_header .header_container .container .hamburger.active span:nth-child(2) {
	-webkit-transform: rotate(-45deg);
	-ms-transform: rotate(-45deg);
	-o-transform: rotate(-45deg);
	transform: rotate(-45deg);
}

#global_header .header_container .container .hamburger.active span:nth-child(3) {
	-webkit-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	transform: rotate(45deg);
}

#global_header .header_container .container .hamburger.active span:nth-child(4) {
	top: 1.5714285714em;
	width: 0%;
	left: 50%;
}

#global_header .header_container .container .phone_number {
	color: #a8c628;
	font-family: "DIN Next W01 Medium", sans-serif;
	line-height: 1;
	font-size: .9em;
	float: right;
	padding: 12px 0.1428571429em 0;
	cursor: pointer;
	margin-right: 15px;
}

#global_header .header_container .container .phone_number span {
	display: none;
}

@media (min-width: 768px) {
	#global_header .header_container .container .phone_number span {
		display: inline-block;
	}
}

#global_header .header_container .container .phone_number:after {
	font-family: FontAwesome;
	content: "\f098";
	font-size: 2.35em;
}

@media (min-width: 768px) {
	#global_header .header_container .container .phone_number:after {
		content: "";
		display: none;
	}
}

@media (min-width: 400px) {
	#global_header .header_container .container .phone_number {
		margin-right: 0;
	}
}

@media (min-width: 768px) {
	#global_header .header_container .container .phone_number {
		cursor: auto;
		pointer-events: none;
		margin: 20px 12px 16px;
		font-size: 1.2em;
		padding: 0;
		line-height: .8;
	}
}

#global_header .header_container .container .demo {
	float: right;
	padding: 0;
	margin: 0 20px 0 10px;
	display: none;
}

#global_header .header_container .container .demo span {
	display: none;
}

@media (min-width: 1200px) {
	#global_header .header_container .container .demo span {
		display: inline-block;
		padding-right: 3px;
	}
}

@media (min-width: 400px) {
	#global_header .header_container .container .demo {
		display: block;
	}
}

@media (min-width: 768px) {
	#global_header .header_container .container .demo {
		margin: 7px 0;
	}
}

@media (max-width: 768px) {
	#global_header .header_container .container .demo .btn {
		padding-top: 3px;
		padding-bottom: 1px;
		margin-top: 12px;
	}
}

#global_header .header_container .container nav.top-nav {
	margin: 0;
	display: none;
	font-size: 1.4em;
}

@media (min-width: 768px) {
	#global_header .header_container .container nav.top-nav {
		display: block;
		float: right;
		margin: 8px 0px;
	}
}

#global_header .header_container .container nav.top-nav .menu-header-container {
	float: right;
}

#global_header .header_container .container nav.top-nav #search_form {
	float: right;
	position: relative;
	cursor: pointer;
	display: none;
}

@media (min-width: 992px) {
	#global_header .header_container .container nav.top-nav #search_form {
		display: block;
	}
}

#global_header .header_container .container nav.top-nav #search_form .search_form {
	margin: 0;
}

#global_header .header_container .container nav.top-nav #search_form #search-label {
	font-family: "DIN 1451 W01 Engschrift", sans-serif;
	color: #343438;
	display: block;
	text-align: center;
	padding: 0.2142857143em 0.7142857143em;
	padding: 0 0.7142857143em;
	line-height: .7;
}

@media (min-width: 768px) {
	#global_header .header_container .container nav.top-nav #search_form #search-label {
		border: solid 1px #f1f2f4;
		border-top: none;
		border-bottom: none;
		padding: 10px .25em;
		margin: 0;
	}
}

@media (max-width: 991px) {
	#global_header .header_container .container nav.top-nav #search_form #search-label a {
		padding: 0px;
	}
}

#global_header .header_container .container nav.top-nav #search_form #search-label .fa {
	height: 0.2857142857em;
	padding: 0 0.25em;
	font-size: .7em;
	position: relative;
	top: -0.1428571429em;
}

#global_header .header_container .container nav.top-nav #search_form .search_box {
	display: none;
}

#global_header .header_container .container nav.top-nav #search_form .btn {
	display: none;
}

#global_header .header_container .container nav.top-nav #search_form.active {
	width: 178px;
	font-size: 16px;
	display: block;
}

@media (min-width: 768px) {
	#global_header .header_container .container nav.top-nav #search_form.active {
		margin-top: 3px;
	}
}

#global_header .header_container .container nav.top-nav #search_form.active #search-label {
	padding: 0;
	position: absolute;
}

#global_header .header_container .container nav.top-nav #search_form.active #search-label span {
	display: none;
}

#global_header .header_container .container nav.top-nav #search_form.active #search-label .fa {
	display: none;
}

#global_header .header_container .container nav.top-nav #search_form.active:after {
	position: absolute;
	font-family: FontAwesome;
	content: "\f002";
	color: #343438;
	left: 6px;
	top: 3px;
	font-size: 1em;
}

#global_header .header_container .container nav.top-nav #search_form.active .search_box {
	display: block;
	width: 100%;
	font-size: 1em;
	padding: 2px 5px 2px 1.75em;
	border: solid 1px #CCC;
	position: relative;
}

#global_header .header_container .container nav.top-nav .menu {
	font-family: "DIN 1451 W01 Engschrift", sans-serif;
	float: right;
}

#global_header .header_container .container nav.top-nav .menu li {
	float: left;
	padding: 0 0.7142857143em;
	line-height: .7;
}

@media (min-width: 768px) {
	#global_header .header_container .container nav.top-nav .menu li {
		padding: 0 5px;
	}
}

@media (min-width: 768px) {
	#global_header .header_container .container nav.top-nav .menu li.menu-item-language {
		padding: 0 15px 0 5px;
	}
}

#global_header .header_container .container nav.top-nav .menu li.dropdown-item ul {
	max-width: 220px;
	text-align: center;
}

#global_header .header_container .container nav.top-nav .menu li.green-menu a {
	background: #a8c628;
	color: #FFF;
}

#global_header .header_container .container nav.top-nav .menu li.green-menu a:hover {
	background: #81b315;
}

#global_header .header_container .container nav.top-nav .menu li a {
	font-family: "DIN 1451 W01 Engschrift", sans-serif;
	color: #343438;
	display: block;
	padding: 0 inherit;
	text-align: center;
}

#global_header .header_container .container nav.top-nav .menu li a .fa {
	padding: 0 0.2857142857em;
	line-height: .5;
}

@media (min-width: 768px) {
	#global_header .header_container .container nav.top-nav .menu li a {
		padding: 10px 0.5em;
	}
}

#global_header .header_container .container nav.top-nav .menu li a:hover {
	text-decoration: none;
}

#global_header .header_container .container nav.top-nav .menu ul {
	display: none;
	padding: 0.5em 1.4285714286em;
	background: #007eb5;
	position: relative;
	left: -2%;
	width: 104%;
	top: -1.25em;
	margin: 1em 0 0;
	z-index: 1;
}

@media (min-width: 768px) {
	#global_header .header_container .container nav.top-nav .menu ul {
		position: absolute;
		left: auto;
		width: auto;
		top: auto;
		margin: 0;
		border: solid 1px #f1f2f4;
		background: #f0f0f0;
	}
}

#global_header .header_container .container nav.top-nav .menu ul li {
	display: inline-block;
	white-space: nowrap;
	line-height: 1;
	width: 100%;
}

#global_header .header_container .container nav.top-nav .menu ul li a {
	font-family: "Arial", sans-serif;
	font-size: .8em;
	color: #FFF;
	border: none;
	padding: 0.65em 0.5em .65em 0;
}

@media (min-width: 768px) {
	#global_header .header_container .container nav.top-nav .menu ul li a {
		color: #343434;
		padding-bottom: 0.65em;
	}
}

@media (min-width: 768px) {
	#global_header .header_container .container nav.top-nav .menu ul li a:hover {
		color: #00a7e1;
	}
}

#global_header .main_nav_container {
	background: #00a7e1;
	border-bottom: 1px solid #007eb5;
}

@media (max-width: 768px) {
	#global_header .main_nav_container .container {
		padding: 0;
	}
}

#global_header .main_nav_container .nav-wrapper {
	z-index: 999;
}

@media (max-width: 768px) {
	#global_header .main_nav_container .nav-wrapper {
		padding: 0;
		display: none;
	}
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper {
		display: block;
	}
}

#global_header .main_nav_container .nav-wrapper nav {
	float: left;
	border-top: solid 0.0714285714em #646464;
	width: 100%;
}

#global_header .main_nav_container .nav-wrapper nav a {
	color: #646464;
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav {
		border: none;
		padding: 0;
		width: auto;
	}
}

#global_header .main_nav_container .nav-wrapper nav ul li:nth-of-type(1), #global_header .main_nav_container .nav-wrapper nav ul li:nth-of-type(2), #global_header .main_nav_container .nav-wrapper nav ul li:nth-of-type(3) {
	background: #007eb5;
}

#global_header .main_nav_container .nav-wrapper nav ul li {
	display: inline-block;
	margin: 0px;
	padding: 0px;
	position: relative;
	margin-right: -5px;
	width: 100%;
	border-bottom: solid 1px #007eb5;
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li {
		width: auto;
		border: none;
	}
}

#global_header .main_nav_container .nav-wrapper nav ul li.main-solution {
	background: #007eb5;
	margin-right: -5px;
	border-bottom: solid 1px #00a7e1;
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li.main-solution {
		border: none;
	}
}

#global_header .main_nav_container .nav-wrapper nav ul li.main-solution:hover a {
	background: #00a7e1;
}

#global_header .main_nav_container .nav-wrapper nav ul li.main-solution:hover ul li a {
	background: #007eb5;
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li.main-solution:hover ul li a {
		background: #f0f0f0;
	}
}

#global_header .main_nav_container .nav-wrapper nav ul li .menu-expand {
	position: absolute;
	right: 0;
	top: 1px;
	cursor: pointer;
	font-size: 1.7857142857em;
	color: #FFF;
	line-height: 1;
	padding: 7px 30px;
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li .menu-expand {
		display: none;
	}
}

#global_header .main_nav_container .nav-wrapper nav ul li .menu-expand .fa.fa-caret-down {
	position: relative;
	right: -0.1428571429em;
	top: 0;
	display: none;
}

#global_header .main_nav_container .nav-wrapper nav ul li a {
	color: #FFF;
	text-decoration: none;
	font-family: "DIN 1451 W01 Engschrift", sans-serif;
	padding: 0.5em 0.5em .4em;
	font-size: 1.45em;
	line-height: 1;
	display: inline-block;
	width: 100%;
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li a {
		padding: .3em 1.12em .2em;
		font-size: 1.635em;
		display: block;
	}
}

@media (min-width: 750px) {
	#global_header .main_nav_container .nav-wrapper nav ul li a {
		padding-left: .75em;
		padding-right: .75em;
	}
}

@media (min-width: 991px) {
	#global_header .main_nav_container .nav-wrapper nav ul li a {
		font-size: 1.84em;
		padding: 0.3em 1.1em 0.2em;
	}
}

@media (min-width: 1200px) {
	#global_header .main_nav_container .nav-wrapper nav ul li a {
		font-size: 2.125em;
		padding-right: 1.15em;
		padding-left: 1.3em;
	}
}

#global_header .main_nav_container .nav-wrapper nav ul li:hover a {
	background: #007eb5;
}

@media (max-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li:hover a {
		background: transparent;
		border-color: transparent;
	}
}

#global_header .main_nav_container .nav-wrapper nav ul li:hover ul {
	display: block;
	z-index: 999;
}

@media (max-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li:hover ul {
		display: none;
	}
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li:hover ul li a {
		background: #f0f0f0;
	}
}

#global_header .main_nav_container .nav-wrapper nav ul li ul {
	display: none;
	padding: 0.5em 1.4285714286em;
	background: #007eb5;
	position: relative;
	left: -2%;
	width: 104%;
	top: -1.25em;
	margin: 1em 0 0;
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li ul {
		position: absolute;
		left: auto;
		width: auto;
		top: auto;
		margin: 0;
		border: solid 1px #f1f2f4;
		background: #f0f0f0;
	}
}

#global_header .main_nav_container .nav-wrapper nav ul li ul li {
	display: block;
	white-space: nowrap;
	line-height: 1;
}

#global_header .main_nav_container .nav-wrapper nav ul li ul li a {
	font-family: "Arial", sans-serif;
	font-size: 1em;
	color: #FFF;
	border: none;
	padding: 0.65em 0.5em .65em 0;
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li ul li a {
		color: #343434;
		padding-bottom: 0.65em;
	}
}

@media (min-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li ul li a:hover {
		color: #00a7e1;
	}
}

@media (max-width: 768px) {
	#global_header .main_nav_container .nav-wrapper nav ul li ul.active {
		display: block;
	}
}

/* END HEADER STYLES */




