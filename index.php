<!-- Global Head -->
<?php include('views/partials/global-head.php'); ?>
<!-- End Global Head -->

<body>

	<header>

		<!-- Main Navigaiton -->
		<?php include('views/partials/global-navigation.php'); ?>
		<!-- End Main Navigaiton -->

	</header>

	<main role="main">

	<section class="home-slider">
		<!-- Home Slider -->
		<div class="relative-container flex-js">
			<div class="flexslider">

				  <ul class="slides">
				    <li class="flex-slide--1">

				      	<div class="align-center">
							<h2 class="great-text white secondary-font semibold">Make them smile this time.</h2>
							<h2 class="great-text white secondary-font bold mtn">And every time.</h2>
							<p class="flex-caption white mbl">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
							<a class="semibold paragon-text button--primary" href="#">View Now</a>
						</div>
				    </li>
				    <li class="flex-slide--2">
				    	<div class="align-center">
							<h2 class="great-text white secondary-font semibold">Testing Main Headline 2.</h2>
							<h2 class="great-text white secondary-font bold mtn">Headline 2 Subtext.</h2>
							<p class="flex-caption white mbl">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
							<a class="semibold paragon-text button--primary" href="#">View Now</a>
						</div>
				    </li>
				    <li class="flex-slide--3">
				    	<div class="align-center">
							<h2 class="great-text white secondary-font semibold">Testing Main Headline 3.</h2>
							<h2 class="great-text white secondary-font bold mtn">Headline 3 Subtext.</h2>
							<p class="flex-caption white mbl">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
							<a class="semibold paragon-text button--primary" href="#">View Now</a>
						</div>
				    </li>
				  </ul>
			</div>
	</div>
		<!-- End Home Slider -->
	</section>

	<section class="business-since mobile-none">
		<div class="wrapper align-center pvm">
			<h3 class="business-since__heading mtn">Celebrating our 30th Year In Business <span class="business-since__year">Since 1984</span></h3> 
		</div>
	</section>

	<section class="products-specials">

		<!-- Product Grid -->
		<?php include('views/partials/home-products.php'); ?>
		<!-- End Product Grid -->

	</section>

	<section class="featured-section">

		<!-- Featured -->
		<?php include('views/partials/home-featured.php'); ?>
		<!-- Featured -->

	</section>


	</main>

	<footer class="main-footer" id="main-footer" role="contentinfo">

		<!-- Footer -->
		<?php include('views/partials/global-footer.php'); ?>
		<!-- End Footer -->

	</footer>

	<!-- Loading Scripts -->
	<?php include('views/partials/scripts.inc.php'); ?>
	<!-- End Loading Scripts -->

</body>
</html>