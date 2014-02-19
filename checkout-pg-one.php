<!-- Global Head -->
<?php include('views/partials/global-head.php'); ?>
<!-- End Global Head -->

<body>
	
	<header>
		
		
		<?php include('views/partials/global-navigation.php'); ?>
		

	</header>

	<main role="main">
		<div class="wrapper inner-content">
			<h1 class="tertiary-heading great-text mtn">Checkout</h1>
			<p>Please enter your Name and Address then click "Continue" below before selecting Shipping and Payment Method.</p> 

			<p>If you already have an account please sign in here.</p>

		<div class="gd-row gt-row">
			
			<!--Shipping Info-->
			<div class="gd-third gd-columns gt-third gt-columns">
				<h3 class="primary-color paragon-text secondary-font mbs">Shipping Information</h3>
				<div class="form-container colored">
					<label for="first-name" class="input-label data-required"><span class="is-hidden">First Name</span><input type="text" id="first-name" placeholder="First Name"></label>
					<label for="last-name" class="input-label data-required"><span class="is-hidden">Last Name</span><input type="text" id="last-name" placeholder="Last Name"></label>
					<label for="phone-number" class="input-label data-required"><span class="is-hidden">Phone</span><input type="text" id="phone-number" placeholder="Phone Number"></label>
					<label for="email-address" class="input-label data-required"><span class="is-hidden">Email</span><input type="text" id="email-address" placeholder="Email Address"></label>
					<label for="address-primary" class="input-label data-required"><span class="is-hidden">Address</span><input type="text" id="address-primary" placeholder="Address"></label>
					<label for="address-secondary" class="input-label data-required"><span class="is-hidden">Address (cont'd)</span><input type="text" id="address-secondary" placeholder="Address (cont'd)"></label>
					<label for="select-city" class="input-label data-required"><span class="is-hidden">City</span>
						<select type="text" id="select-city">
							<option value="" selected="selected">Select a City</option> 
						</select>
					<label for="select-state" class="input-label data-required"><span class="is-hidden">State</span>
						<select type="text" id="select-state">
							<option value="" selected="selected">Select a State</option> 
							<option value="AL">Alabama</option> 
							<option value="AK">Alaska</option> 
							<option value="AZ">Arizona</option> 
							<option value="AR">Arkansas</option> 
							<option value="CA">California</option> 
							<option value="CO">Colorado</option> 
							<option value="CT">Connecticut</option> 
							<option value="DE">Delaware</option> 
							<option value="DC">District Of Columbia</option> 
							<option value="FL">Florida</option> 
							<option value="GA">Georgia</option> 
							<option value="HI">Hawaii</option> 
							<option value="ID">Idaho</option> 
							<option value="IL">Illinois</option> 
							<option value="IN">Indiana</option> 
							<option value="IA">Iowa</option> 
							<option value="KS">Kansas</option> 
							<option value="KY">Kentucky</option> 
							<option value="LA">Louisiana</option> 
							<option value="ME">Maine</option> 
							<option value="MD">Maryland</option> 
							<option value="MA">Massachusetts</option> 
							<option value="MI">Michigan</option> 
							<option value="MN">Minnesota</option> 
							<option value="MS">Mississippi</option> 
							<option value="MO">Missouri</option> 
							<option value="MT">Montana</option> 
							<option value="NE">Nebraska</option> 
							<option value="NV">Nevada</option> 
							<option value="NH">New Hampshire</option> 
							<option value="NJ">New Jersey</option> 
							<option value="NM">New Mexico</option> 
							<option value="NY">New York</option> 
							<option value="NC">North Carolina</option> 
							<option value="ND">North Dakota</option> 
							<option value="OH">Ohio</option> 
							<option value="OK">Oklahoma</option> 
							<option value="OR">Oregon</option> 
							<option value="PA">Pennsylvania</option> 
							<option value="RI">Rhode Island</option> 
							<option value="SC">South Carolina</option> 
							<option value="SD">South Dakota</option> 
							<option value="TN">Tennessee</option> 
							<option value="TX">Texas</option> 
							<option value="UT">Utah</option> 
							<option value="VT">Vermont</option> 
							<option value="VA">Virginia</option> 
							<option value="WA">Washington</option> 
							<option value="WV">West Virginia</option> 
							<option value="WI">Wisconsin</option> 
							<option value="WY">Wyoming</option>
						</select>
					
					<label for="postal-code" class="input-label data-required"><span class="is-hidden">Postal Code</span><input type="text" id="postal-code" placeholder="Postal Code"></label>
					
				</div>
				
				<div class="mvs">	
					<input class="inline-selector" type="checkbox" id="create-account" name="create-account" value="Y" class="mrs"><span class="semibold secondary-font minion-text">Create Account With This Email</span>
				</div>
				<div class="mvs">
					<input class="inline-selector" type="checkbox" id="create-account" name="create-account" value="Y" class="mrs"><span class="semibold secondary-font minion-text">Ship To A Different Address</span>
				</div>

				<a class="button--secondary gm-full" href="#">Continue</a>

			</div>
			<!--Shipping Info-->	

			<!--Shipping & Payment-->
			<div class="gd-third gd-columns gt-third gt-columns">
				<div class="form-container">
						<h3 class="primary-color paragon-text secondary-font mbs">Shipping Method</h3>
						<p>Shipping is not applicable or an address hasn't been selected.</p>

						<h3 class="primary-color paragon-text secondary-font mbs">Payment Method</h3>
						<ul class="unstyled">
							<li><input class="inline-selector" type="radio"><span class="semibold secondary-font minion-text">Credit Card</span></li>
							<li><input class="inline-selector" type="radio"><span class="semibold secondary-font minion-text">PayPal</span></li>
						</ul>
					
					

				</div>
			</div>
			<!--Shipping & Payment-->

			<!--Order Summary-->
			<div class="gd-third gd-columns gt-third gt-columns">
				<h3 class="primary-color paragon-text secondary-font mbs">Order Summary</h3>
				<p class="secondary-font"><span class="subtotal-cost bold">Subtotal</span><span class="float-right">$17.99</span></p>
				<p class="secondary-font"><span class="shipping-cost bold">Shipping</span><span class="float-right">$4.99</span></p>
				<hr>
				<p class="secondary-font"><span class="total-cost secondary-font bold">Total</span><span class="float-right">$22.98</span></p>
				<p><a class="primer-text secondary-font secondary-color dotted-underline" href="#">Have a promotional code?</a></p>

				<div class="mvl">	
					<input class="inline-selector" type="checkbox" id="create-account" name="create-account" value="Y" class="mrs"><span class="semibold secondary-font minion-text">I accept the <a href="#">Terms & Conditions</a>.</span>
				</div>

				<a class="button--secondary gm-full" href="#">Checkout</a>

			</div>
			<!--Order Summary-->
				


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