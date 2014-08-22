<?php
if($_SESSION["googleTransaction"]) {
	$googleTransaction = $_SESSION["googleTransaction"];
	unset($_SESSION["googleTransaction"]);
}
?>
<!-- Google Analytics -->
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', '<?php echo $analyticsObj->googleAccount;?>', 'auto');

	<?php if(!empty($googleTransaction["customerId"])) { ?>

	ga('require', 'ec');   // Load the ecommerce plug-in.

	ga('ec:addProduct', {               // Provide product details in an productFieldObject.
		'id': '<?php echo $googleTransaction["orderSku"];?>',  // Product ID (string).
		'name': '<?php echo $googleTransaction["product"];?>', // Product name (string).
		'brand': '<?php echo $analyticsObj->googleAffiliation;?>', // Product brand (string).
		'category': '<?php echo $googleTransaction["orderCategory"];?>',            // Product category (string).
		'price': '<?php echo $googleTransaction["price"];?>',                 // Product price (currency).
		'quantity': <?php echo $googleTransaction["orderQty"];?>                     // Product quantity (number).
	});

	ga('ec:setAction', 'purchase', {          // Transaction details are provided in an actionFieldObject.
		'id': '<?php echo $googleTransaction["customerId"];?>',                         // (Required) Transaction id (string).
		'affiliation': '<?php echo $analyticsObj->googleAffiliation;?>', // Affiliation (string).
		'revenue': '<?php echo $googleTransaction["orderTotal"];?>',                     // Revenue (currency).
		'tax': '<?php echo $googleTransaction["tax"];?>',                          // Tax (currency).
		'shipping': '0',                     // Shipping (currency).
	});


	<?php } ?>

	ga('send', 'pageview');

</script>
<!-- End Google Analytics -->
