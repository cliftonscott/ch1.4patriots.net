<? include_once('helpers/session.php'); ?>

<!doctype html>
<html><head>
<meta charset="utf-8" />
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1" />
<!--hide address bar in iOS-->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<title>Food4Patriots</title>
<link href="css/style-mobile.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
	
	<div id="header-container"></div>
	
	<div id="main-container">

		<div id="main" class="wrapper clearfix">
		<div>
		  <h1>Thank You For Your Order <? echo $_SESSION['fnameShip']; ?>!</h1>
		</div>
		<article>
	      
        <div id="index-box1">
        
          <h2>Tracking Info</h2>
           <div style="margin-right:auto;margin-left:auto;">	
          <table style="margin-right:auto;margin-left:auto;">
  <tr>
    <td class="label">Tracking #:</td>
    <td><a href="<? echo $_SESSION['trackinglink'] ?>" target="_blank"><? print $_SESSION['tracking']; ?></a></td>
  </tr>
  <tr>
    <td class="label">Order #:</td>
    <td><? echo $_SESSION['order_id']; ?></td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="label">Shipped:</td>
    <td><? echo $_SESSION['shipdate']; ?></td>
  </tr>
  <tr>
    <td class="label">Method:</td>
    <td><? echo $_SESSION['method'] ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="label">Name:</td>
    <td><? echo $_SESSION['fnameShip']; ?> <? echo $_SESSION['lnameShip']; ?></td>
  </tr>
  <tr>
    <td class="label">Address:</td>
    <td><? print $_SESSION['address']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><? echo $_SESSION['city']; ?>, <? echo $_SESSION['sate']; ?> <? print $_SESSION['postcode']; ?></td>
  </tr>
  <tr>
    <td class="label">Country:</td>
    <td><? echo $_SESSION['country']; ?></td>
  </tr>
</table>
          <br>
	      </div>
        </div>
        <div id="index-box2">
        <h2>Would You Like To?</h2>
        <div style="max-width:300px;margin-right:auto;margin-left:auto;">
        <ul>
          <li><a href="https://secure.food4patriots.com/portal/index.php" target="_self">Track Another Order</a></li>
          <li><a href="http://food4patriots.com/info/faq.php" target="_blank">Read Our Frequently Asked Questions </a></li>
          <li><a href="mailto:help@food4patriots.com?Subject=Support%20Ticket">Email A Customer Service Agent</a></li>
          <li><a href="http://food4patriots.com/blog/">Read The Latest Posts From Our Blog</a></li>
          </ul>
        </div>
        </div>
        <div class="clearfix"></div>


			<footer>
				 <?php include 'helpers/footer.php';?>			
		  </footer>


		</article>
		</div>
         <div class="copyrightbg">
    	<div class="copyright">© <?=date('Y');?>
   	      Food4Patriots.com <br>
   	      All rights reserved.</div>    
    	</div>
	</div>

<!-- Add clicky tracking scripts -->
<?php include '../checkout/helpers/analyticstrack.php';?>
<?php include '../checkout/helpers/clickytrack.php';?>

<script type="text/javascript">
	//hide address bar in Android / iOS
	document.addEventListener('DOMContentLoaded', function() {
		window.scrollTo(0, 1);
	})
</script>
</body>
</html>
<?  
    	/*$length = count($_SESSION['orderArray']);
        for ($i = 0; $i < $length; $i++) {
			if ($_SESSION['orderArray'][$i] == $_SESSION['order_id']){
			} else {
			print '<a href="';
			print 'https://secure.food4patriots.com/portal/index.php?action=process&order_id=';
			print $_SESSION['orderArray'][$i];
			print '&user_email='.$_SESSION['email'];
			print '">';
			print $_SESSION['orderArray'][$i];
			print '</a>  ';
			}
        }*/
    	?>