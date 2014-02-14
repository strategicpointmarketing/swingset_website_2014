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

					<!--Product Detail-->
					
					<div class="gd-row gt-row">
						<div class="gd-half gd-columns gt-full gt-columns">
							<img class="mbm "src="images/featured/featured-swingset-photo.jpg">
						</div>
						<div class="gd-half gd-columns gt-full gt-columns">
							<h3 class="tertiary-heading paragon-text mtn">Adventure Treehouse Swingset</h3>
							<div class="product-stock"><span class="in-stock">In Stock.</span><span class="items-available">35 available.</span></div>
							<h4 class="product-price">$1,999.00</h4>
							
							<!--Product Options-->
							<div class="product-options">
								<h4 class="secondary-font option-label">Configuration</h4>
								<select class="option-select">
								  <option value="config1">Configuration 1</option>
								  <option value="config2">Configuration 2</option>
								  <option value="config3">Configuration 3</option>
								  <option value="config4">Configuration 4</option>
								</select>		
							</div>	
							<!--End Product Options-->
							
							<!--Product Actions-->
							<div class="product-actions">
								<div class="quantity-container">
									<span class="quantity-label">Qty</span>
									<input class="quantity-value" type="text" value="1">
								</div>
								<div class="add-cart-container">
									<a class="button--add" href="#">Add To Cart</a>
								<div>
							</div>
							<!--Product Actions-->
						</div>
					</div>
					<!--End Product Detail-->


				</div>
			


			</div>
			<!--Product Tabs-->
			<div class="gd-row gt-row">
				<div class="gd-full gd-columns gt-full gt-full">
					<ul class="tabs">
					  <li class="tab-heading">Description</li>
					  <li class="tab-content">
					      <p><strong>A Smart Choice. The Right Choice.</strong></p>
					      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel odio non elit tincidunt placerat. Donec quis dolor eleifend, venenatis urna nec, feugiat purus. Morbi dapibus leo lorem, vel tempor quam euismod ac. Pellentesque elementum ac ante ut gravida.</p>
					  </li>

					  <li class="tab-heading">Configuration</li>
					  <li class="tab-content">
					      <p><strong>A Configuration For Any Need.</strong></p>
					      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel odio non elit tincidunt placerat. Donec quis dolor eleifend, venenatis urna nec, feugiat purus. Morbi dapibus leo lorem, vel tempor quam euismod ac. Pellentesque elementum ac ante ut gravida.</p>
					  </li>

					

					</ul>
				</div>
			</div>	
				<!--End Product Tabs-->
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