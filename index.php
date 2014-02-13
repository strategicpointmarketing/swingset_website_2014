<!-- Global Head -->
<?php include('views/partials/global-head.php'); ?>
<!-- End Global Head -->

<body>
	
	<header>
		
		
		<?php include('views/partials/global-navigation.php'); ?>

		

	</header>

	<main role="main">

	<section class="home-slider">
		<!-- Home Slider -->
		<?php include('views/partials/home-slider.php'); ?>
		<!-- End Home Slider -->
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