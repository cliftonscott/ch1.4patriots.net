<!-- begin GA -->
<?php
if(!empty($_SESSION['customerIdg'])) {
	$gorderTotal = $_SESSION['orderTotalg'];
	$gtax = $_SESSION['taxg'];
	$gproduct = $_SESSION['productg'];
	$gprice = $_SESSION['priceg'];
	$gcustomerId = $_SESSION['customerIdg'];
	$gorderId = $_SESSION['orderIdg'];
	$gqty = $_SESSION['orderQty'];
	$_SESSION['orderTotalg'] = null;
	$_SESSION['taxg'] = null;
	$_SESSION['productg'] = null;
	$_SESSION['priceg'] = null;
	$_SESSION['customerIdg'] = null;
	$_SESSION['orderIdg'] = null;
	$_SESSION['orderQty'] = null;
?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $analyticsObj->googleAccount;?>']);
  _gaq.push(['_setDomainName', '<?php echo $analyticsObj->googleDomain;?>']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);
  _gaq.push(['_addTrans',
    '<?php echo $gcustomerId;?>',           // transaction ID - required
    'PatriotPowerGenerator',  // affiliation or store name
    '<?php echo $gorderTotal;?>',          // total - required
    '<?php echo $gtax;?>',     
	'0',        // shipping	
  ]);
   // add item might be called for every item in the shopping cart
   // where your ecommerce engine loops through each item in the cart and
   // prints out _addItem for each
  _gaq.push(['_addItem',
    'F4P',           // SKU/code - required
    '<?php echo $gproduct;?>',        // product name
	'NA',   // category or variation
    '<?php echo $gprice;?>',          // unit price - required
    '<?php echo $gqty;?>'               // quantity - required
  ]);
  _gaq.push(['_trackTrans']); //submits transaction to the Analytics servers

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php
} else {
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $analyticsObj->googleAccount;?>', '<?php echo $analyticsObj->googleDomain;?>');
  ga('send', 'pageview');

</script>
<?php
}
?>
<!-- end GA -->