<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
//$_SESSION["soldout"]["flag"] = false; //this is the primary trigger
//$_SESSION["soldout"]["audio"] = null;
//$_SESSION["soldout"]["waitlist"] = false;
//if($_SESSION["soldout"]["flag"] !== true) {
//	$template["floatingTimer"] = 20; //minutes to pass to the timer / will not display if not greater than zero
//} else {
	$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
//}


$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
$_SESSION['productId'] = 40; //please keep as an integer
$_SESSION['quantity'] = 1;
$maxQuantity = 5;
include_once("Product.php");
$productObj = new Product();

//creates a product object that is available from every template
$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("checkout");

$platformCountDownToDate = true;

//include template top AFTER the product information is set
include_once ('template-top.php');
$platform->setCsrOrderFormUrl("/checkout/1year-firesale/index.php");
?>
<?php include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?>

<style>
	.navbar-default .container {margin-top: 36px !important;}*/
</style>
<script src="/js/audio.js"></script>
<?php
if($platformCountDownToDate) {
?>
<script>
	jsCountDownTextBox = document.getElementById("endofDateCountDown");
	var current="Sorry, this sale has ended."
	var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")

	function countdown(yr,m,d){
		theyear=yr;themonth=m;theday=d
		var today=new Date()
		var todayy=today.getYear()
		if (todayy < 1000)
			todayy+=1900
		var todaym=today.getMonth()
		var todayd=today.getDate()
		var todayh=today.getHours()
		var todaymin=today.getMinutes()
		var todaysec=today.getSeconds()
		var todaystring=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec
		futurestring=montharray[m-1]+" "+d+", "+yr
		dd=Date.parse(futurestring)-Date.parse(todaystring)
		dday=Math.floor(dd/(60*60*1000*24)*1)
		dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1)
		dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1)
		dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1)
		if(dday==0&&dhour==0&&dmin==0&&dsec==1){
			jsCountDownTextBox.innerHTML = "Sorry, this sale has ended.";
			window.location.href = "https://secure.food4patriots.com/checkout/1year-firesale/index-expired.php";
			return
		}
		else
			//jsCountDownTextBox.innerHTML ="Only "+dday+ " days, "+dhour+" hours, "+dmin+" minutes, and "+dsec+" seconds left until "+before
			//jsCountDownTextBox.innerHTML ="<p>This Year-End Fire Sale Ends in "+dday+ " days, "+dhour+" hours and "+dmin+" minutes!</p>";
			jsCountDownTextBox.innerHTML ="<p>This Year-End Fire Sale Ends in "+dday+ " days, "+dhour+" hours, "+dmin+" minutes and " +dsec+" seconds!</p>";
		setTimeout("countdown(theyear,themonth,theday)",1000)
	}
	countdown(2014,12,31)
</script>
<?php
}
?>
<div class="container-main">
<div id="content" style="display:block;">
	<div class="container oto-width">
		<div><h1 class="darkRed text-center">The Year-End Fire Sale Has Ended</h1></div>
		<div class="text-center">
			<img class="img-responsive center-block" src="/media/images/f4p/f4p-1-year-kit-06.jpg" alt="Food4Patriots 1 Year Kit" style="margin-bottom:20px;">
		</div>
		<div>
			<div style="text-align:center;">
				<p>Sorry friend, the Year-End Fire Sale has ended, but you can still purchase the Food4Patriots 1 Year Kit at a great discount. Just click the big orange "Click To Continue" button below.</p>
				<a href="/checkout/alt/f4p-1yearkit-offer.php"><img src="/assets/images/buttons/btn-orange-click-continue-01.png" class="img-responsive center-block" alt="Add To Cart"></a>
			</div>
		</div>
	</div>




	<hr>
</div>

<?php include_once ('template-bottom.php'); ?>
