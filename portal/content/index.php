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
  <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>
  <script language="javascript" src="assets/jquery.validate.min.js" type="text/javascript"></script>
  <script language="javascript" src="assets/jquery.colorbox-min.js"></script>
  <link rel="stylesheet" href="assets/colorbox.css" />
  <script language="javascript">
    $(document).ready(function() {

        $(".scrypt").colorbox({iframe:true, innerWidth:500, innerHeight:120, slideshow:false, arrowKey:false, close:'', current:'', previous:'', next:''});
		
		$("#form11").validate({
    		rules: {
    			user_email: {
					required: true
    			},
    			order_id: {
					required: true
    			}
  			},
  			messages: { 
          user_email: "",
          order_id: "",
		 
        }
    	});
	});
  </script>
</head>
<body>
	
	<div id="header-container"></div>
	
	<div id="main-container">

		<div id="main" class="wrapper clearfix">

		<article>
	      
        <div id="index-box1">
        
          <h2>Tracking Info</h2>
          <div style="max-width:300px;margin-right:auto;margin-left:auto;">	
          <div id="formcheck" style="display:block;">
			 <?php if($_SESSION['error_message'] != '') {
            
            include_once('assets/error.php');
            
            } ?>
        </div>
          <form accept-charset='ISO-8859-1' enctype='application/x-www-form-urlencoded;charset=ISO-8859-1' name="form11" id="form11" method="post" action="index.php?action=process">
          <table style="margin-right:auto;margin-left:auto;">
  <tr>
    <td><span class="label">ORDER #: </span></td>
    <td><input type="text" name="order_id" id="order_id" value="<?php echo $_SESSION['order_id'];?>"></td>
  </tr>
  <tr>
    <td><span class="label">EMAIL: </span></td>
    <td><input name="user_email" type="text" id="user_email" value="<?php echo $_SESSION['usermail'];?>"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><input type=submit class="button" value="Submit"></td>
  </tr>
</table>
          <input type="hidden" name="method" value="order_view">
          </form> 
          <p>&nbsp;</p>
       		</div>
        </div>
        <div id="index-box2">
        <h2>Would You Like To?</h2>
        <div style="max-width:300px;margin-right:auto;margin-left:auto;">
        <ul>
          <li><a href="http://food4patriots.com/info/faq.php">Read Our Frequently Asked Questions </a></li>
          <li><a href="mailto:help@food4patriots.com?Subject=Support%20Ticket">Email A Customer Service Agent</a></li>
          <li><a href="http://power4patriots.com/blog/">Read The Latest Posts From Our Blog</a></li>
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

<script type="text/javascript">
	//hide address bar in Android / iOS
	document.addEventListener('DOMContentLoaded', function() {
		window.scrollTo(0, 1);
	})
</script>
</body>
</html>