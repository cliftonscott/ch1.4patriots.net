<?php
if($_SESSION["googleTransaction"]) {
	$googleTransaction = $_SESSION["googleTransaction"];
	unset($_SESSION["googleTransaction"]);
}
?>

<?php if(!empty($googleTransaction["customerId"])) { ?>
	<script>
		dataLayer = [{
			'transactionId': '<?php echo $googleTransaction["customerId"];?>',
			'transactionAffiliation': '<?php echo $analyticsObj->googleAffiliation;?>',
			'transactionTotal': <?php echo $googleTransaction["orderTotal"];?>,
			'transactionTax': <?php echo $googleTransaction["tax"];?>,
			'transactionShipping': 0,
			'transactionProducts': [{
				'sku': '<?php echo $googleTransaction["orderSku"];?>',
				'name': '<?php echo $googleTransaction["product"];?>',
				'category': '<?php echo $googleTransaction["orderCategory"];?>',
				'price': <?php echo $googleTransaction["price"];?>,
				'quantity': <?php echo $googleTransaction["orderQty"];?>
			}]
		}];
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