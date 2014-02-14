<!-- Global Head -->
<?php include('views/partials/global-head.php'); ?>
<!-- End Global Head -->

<body>
	
	<header>
		
		
		<?php include('views/partials/global-navigation.php'); ?>
		

	</header>

	<main role="main">
		<div class="wrapper inner-content">
			<div class="gd-row gt-row">
				<div class="gd-quarter gd-columns gt-quarter gt-columns">

					<!-- Product Navigation -->
					<?php include('views/partials/product-navigation.php'); ?>
					<!-- End Product Navigation -->

					
				</div>
				<div class="gd-three-quarters gd-columns gt-three-quarters gt-columns">

					<!--Featured Offers-->
					<div class="gd-row gt-row">
						<div class="gd-full gd-columns gt-full gt-columns">
							<img src="images/featured/free-shipping.jpg">
						</div>
					</div>
					<div class="gd-row gt-row mts mbxl">
						<div class="gd-half gd-columns gt-half gt-columns">
							<img src="images/featured/featured-swingset-photo.jpg">
						</div>
						<div class="gd-half gd-columns gt-half gt-columns">
							<img src="images/featured/featured-swingset-desc.jpg">
						</div>
					</div>
					<!--End Featured Offers-->



					<!-- Product Listing -->
					<?php include('views/partials/product-grid.php'); ?>
					<!-- End Product Listing -->

					
				</div>
				
			</div>

		</div>


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