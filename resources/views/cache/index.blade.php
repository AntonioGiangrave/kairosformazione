
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kairos Formazione</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Kairos formazione" />
	<meta name="keywords" content="formazione job" />
	<meta name="author" content="GGallery" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<!-- <link rel="shortcut icon" href="favicon.ico"> -->

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />


</head>
<body class="boxed">


<!-- Loader -->
<div class="fh5co-loader"></div>



<div id="wrap">

	<div id="fh5co-page">
		<header id="fh5co-header" role="banner">
			<div class="container">
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
				<div id="fh5co-logo"><a href="index.html"><img src="images/logo.png" alt="Logo Kairos"></a></div>
				<nav id="fh5co-main-nav" role="navigation">
					<ul>
						<li><a href="about.html">About</a></li>
						<li class="has-sub">
							<div class="drop-down-menu">
								<a href="services.html">Services</a>
								<div class="dropdown-menu-wrap">
									<ul>
										<li><a href="#">Web Development</a></li>
										<li><a href="#">Web Design</a></li>
										<li><a href="#">Graphic Design</a></li>
										<li><a href="#">Branding</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li><a href="portfolio.html">Portfolio</a></li>
						<li class="has-sub">
							<div class="drop-down-menu">
								<a href="#">Sidebars</a>
								<div class="dropdown-menu-wrap">
									<ul>
										<li><a href="right-sidebar.html">Right Sidebar</a></li>
										<li><a href="left-sidebar.html">Left Sidebar</a></li>

									</ul>
								</div>
							</div>
						</li>
						<li class="cta"><a href="contact.html">Contact</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<!-- Header -->


		@yield('body')



		<footer id="fh5co-footer" role="contentinfo">
			<div class="container">
				<div class="row row-bottom-padded-sm">
					<div class="col-md-4 col-sm-12">
						<div class="fh5co-footer-widget">
							<h3>CONSORZIO KAIROS</h3>
							<p>Via Carlo Innocenzo Frugoni 15/5 - 16121 GENOVA
								Telefono- Fax:  010. 8683343
								Email: segreteria@kairosformazione.it
								PEC:consorziokairosge@pec.it
								Website: www.kairosformazione.it</p>
						</div>
					</div>
					<div class="col-md-3 col-md-push-1 col-sm-12 col-sm-push-0">
						<div class="fh5co-footer-widget">
							<h3>Links</h3>
							<ul class="fh5co-footer-link">
								<li><a href="#">Home</a></li>
								<li><a href="#">-</a></li>
								<li><a href="#">-</a></li>
								<li><a href="#">-</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-md-push-2 col-sm-12 col-sm-push-0">

						<div class="fh5co-footer-widget">
							<h3>Follow us</h3>
							<ul class="fh5co-social">
								<li class="facebook"><a href="#"><i class="icon-facebook2"></i></a></li>
								<li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
								<li class="linkedin"><a href="#"><i class="icon-linkedin"></i></a></li>
								<li class="message"><a href="#"><i class="icon-mail"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="fh5co-copyright">
							<p class="pull-left">&copy; 2016. All Rights Reserved. </p>
							<p class="pull-right">Designed by <a href="http://www.gallerygroup.it" target="_blank">GGallery</a> </p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-chevron-down"></i></a>
</div>

<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>


</body>
</html>

