<?php
if($_SESSION["googleTransaction"]) {
	$googleTransaction = $_SESSION["googleTransaction"];
	unset($_SESSION["googleTransaction"]);
}
?>

<?php if(!empty($googleTransaction["customerId"]) && (isset($googleTransaction["isTest"]) && $googleTransaction["isTest"] !== true)) { ?>
	<script>
		dataLayer = [];
		dataLayer.push({
			'ecommerce': {
				'purchase': {
					'actionField': {
						'id': '<?php echo $googleTransaction["customerId"];?>',	// Transaction ID. Required for purchases and refunds.
						'affiliation': '<?php echo $analyticsObj->googleAffiliation;?>',
						'revenue': '<?php echo $googleTransaction["orderTotal"];?>',	// Total transaction value (incl. tax and shipping)
						'tax':'<?php echo $googleTransaction["tax"];?>',
						'shipping': '0',
						'coupon': ''
					},
					'products': [{                            // List of productFieldObjects.
						'name': '<?php echo $googleTransaction["product"];?>',	// Name or ID is required.
						'id': '<?php echo $googleTransaction["orderSku"];?>',
						'price': '<?php echo $googleTransaction["price"];?>',
						'brand': '<?php echo $googleTransaction["brand"];?>',
						'category': '<?php echo $googleTransaction["orderCategory"];?>',
						'variant': '<?php echo $googleTransaction["orderCategory"];?>',
						'quantity': <?php echo $googleTransaction["orderQty"];?>
					}]
				}
			}
		});
	</script>
<?php } ?>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PKJP8K" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PKJP8K');
</script>
<!-- End Google Tag Manager -->