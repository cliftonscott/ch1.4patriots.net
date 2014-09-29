<?
include_once('helpers/session.php');

$_SESSION['error_message'] = '';
$_SESSION['order_id'] = $_REQUEST['order_id'];
$_SESSION['usermail'] = $_REQUEST['user_email'];



$url = 'https://www.securecart1.com/admin/membership.php?username=secure.power4patriots.com&password=KVUJSuUv3rKtRx&order_id='.$_SESSION['order_id'].'&method=order_view';

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $order_params);
  $data_response_string = curl_exec($ch);
  curl_close($ch);

  parse_str($data_response_string, $data_response_string_as_array);
	
   $_SESSION['tracking'] = $data_response_string_as_array['tracking_number'];
   $_SESSION['email'] = $data_response_string_as_array['email_address'];
   $_SESSION['fnameShip'] = $data_response_string_as_array['shipping_first_name'];
   $_SESSION['lnameShip'] = $data_response_string_as_array['shipping_last_name'];
   $_SESSION['address'] = $data_response_string_as_array['shipping_street_address'];
   $_SESSION['city'] = $data_response_string_as_array['shipping_city'];
   $_SESSION['sate'] = $data_response_string_as_array['shipping_state_id'];
   $_SESSION['postcode'] = $data_response_string_as_array['shipping_postcode'];
   $_SESSION['country'] = $data_response_string_as_array['shipping_country'];
   $_SESSION['shipdate'] = $data_response_string_as_array['shipping_date'];
   $_SESSION['customer'] = $data_response_string_as_array['customer_id'];

   
   $_SESSION['email'] = strtolower($_SESSION['email']);
   $_SESSION['usermail'] = strtolower($_SESSION['usermail'] );

/*$url2 = 'https://www.securecart1.com/admin/membership.php?username=secure.power4patriots.com&password=KVUJSuUv3rKtRx&customer_id='.$_SESSION['customer'].'&method=customer_view';

  $ch2 = curl_init();
  curl_setopt($ch2, CURLOPT_URL, $url2);
  curl_setopt($ch2, CURLOPT_HEADER, 0);
  curl_setopt($ch2, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch2, CURLOPT_POST, 1);
  curl_setopt($ch2, CURLOPT_POSTFIELDS, $order_params2);
  $data_response_string2 = curl_exec($ch2);
  curl_close($ch2);
 
  parse_str($data_response_string2, $data_response_string2_as_array);  
  
  $_SESSION['order_list'] = $data_response_string2_as_array['order_list'];
  
  $_SESSION['orderArray'] = explode(',', $_SESSION['order_list']);*/
  
 // print $_SESSION['customer'];
 //print $_SESSION['order_list'];
  //print $_SESSION['usermail'];
 // print $_SESSION['email'];	
 // print $data_response_string2;
  //exit();

if($_SESSION['email'] != $_SESSION['usermail'] ) {
		 
		$_SESSION['error_message'] = 'Your E-Mail Does Not Match Or The Order Number Is Invalid';
		//print $_SESSION['error_message'];
		header('Location: https://secure.food4patriots.com/portal/index.php?action=index');
	    exit();
		
   }else {
	   
	   // print $_SESSION['tracking'];
  		//exit();
  


//print_r($_GET);
$no=trim($_SESSION['tracking']);
echo $no;
$no=str_replace (" ", "", $no);					//Just remove all the whitespaces
$no=str_replace ("	", "", $no);
$no=str_replace ("-", "", $no);

function checkupsmp($no)
{
	if(strlen($no)!=15)
		return 0;//"Not a UPS MAIL PIECE TRACKING number";
	else
	{
		$rem = 498;
		
		if((int)(substr($no,0,3))==$rem)
			return 1;//"Valid Number";
		else
			return 0;//"Not a Valid number";
	}
}
function checkfedex($no)
{
	if(strlen($no)!=12)
		return 0;//"Not a FedEx number";
	else
	{
		$temp=substr($no,0,11);
		$multiplier=7;
		$sum=0;
		for($i=10;$i>=0;$i--)
		{
			if($multiplier==7)
				$multiplier=1;
			else if($multiplier==1)
				$multiplier=3;
			else if($multiplier==3)
				$multiplier=7;			
			$sum+=$multiplier * (int)(substr($temp,$i,1));
		}
		$rem=$sum%11;
		if($rem==10)
			$rem=0;
		if((int)(substr($no,11,1))==$rem)
			return 1;//"Valid FedEx Number";
		else
			return 0;//"Not a FedEx number";
	}
}
function checkups($no)
{
	$upschar2num=array("A"=>"2","B"=>"3","C"=>"4","D"=>"5","E"=>"6","F"=>"7","G"=>"8","H"=>"9","I"=>"0","J"=>"1","K"=>"2","L"=>"3","M"=>"4","N"=>"5","O"=>"6","P"=>"7","Q"=>"8","R"=>"9","S"=>"0","T"=>"1","U"=>"2","V"=>"3","W"=>"4","X"=>"5","Y"=>"6","Z"=>"7");
	if(strlen($no)!=18)
		return 0;//"Not a UPS number";
	else
	{
		$temp=substr($no,0,2);
		if($temp!="1Z")
			return 0;//"Not a Valid UPS number";
		else
		{
			$temp=substr($no,2,15);
			//echo $temp;
			$sumodd=0;
			$sumeven=0;
			for($i=0;$i<15;$i++)
			{	
				$tempnum=strtoupper(substr($temp,$i,1));
				if(array_key_exists($tempnum,$upschar2num))
				{
					//$tempnum=strtoupper($tempnum);
					$tempnum=$upschar2num[$tempnum];
				}
				if($i%2==0)					//As we start from 0
					$sumodd+=(int)($tempnum);
				else
					$sumeven+=(int)($tempnum);
			}
			$sum=$sumodd + 2*$sumeven;
			//echo $sum;
			//echo (int)(substr($no,17,1));
			if((int)(substr($no,17,1))==(10-($sum%10))|| ($sum%10==0))
				return 1;//"Valid UPS number";
			else
				return 0;//"Not a Valid UPS number";
		}
	}
}
function checkfedexg($no)
{
	if((strlen($no)!=22) &&  (strlen($no)!=15))
		return 0;
	else
	{
		$temp="";
		if(strlen($no)==22)
		{
			if((int)substr($no,0,2)==96)
				$temp=substr($no,7);
			else
			{
				$temp="12";
				//echo "Not a FedEx Ground number";
			}
		}
		$temp=trim($temp);
		$len=strlen($temp);
		$chk=substr($temp,$len-1,1);
		//echo $chk;
		$temp=substr($temp,0,$len-1);
		$len=strlen($temp);
		//echo $temp."<br>";
		$sumodd=0;
		$sumeven=0;		
		$sum=0;
		for($i=$len-1;$i>=0;$i--)
		{
			$tempnum=substr($temp,$i,1);
			if($i%2==0)
				$sumodd+=(int)($tempnum);
			else
				$sumeven+=(int)($tempnum);
			//echo $i."--".$tempnum . "<br>";
		}
		$sum=$sumodd + (3*$sumeven);
		//echo (int)(substr($no,21,1));
		if((int)($chk)==(10-($sum%10))|| ($sum%10==0))
			return 1;
		else
			return 0;
	}
}

function checkusps($no)
{
	if(strlen($no)!=30 && strlen($no)!=22 && strlen($no)!=20 && strlen($no)!=13 )
		return 0;
	else
	{
		if(strlen($no)==13)
		{
			if(strtoupper(substr($no,-2))=="US") {
				$temp=substr($no,2,9);
			}else {
				return 0;
			}
		}else if(strlen($no)==30) {
				return 1;
		}else {
			$temp=$no;
		}
		
		$temp=$no;
		$temp=trim($temp);
		$len=strlen($temp);
		$chk=substr($temp,$len-1,1);
		//echo $chk;
		$temp=substr($temp,0,$len-1);
		$len=strlen($temp);
		//echo $temp."<br>";
		$sumodd=0;
		$sumeven=0;		
		$sum=0;
		for($i=$len-1;$i>=0;$i--)
		{
			$tempnum=substr($temp,$i,1);
			if($i%2==0)
				$sumeven+=(int)($tempnum);
			else
				$sumodd+=(int)($tempnum);
			//echo $i."--".$tempnum . "<br>";
		}
		//echo $sumodd ."<br>" . $sumeven;
		$sum=$sumodd + (3*$sumeven);
		//echo $sum;
		//echo (int)(substr($no,21,1));
		if((int)($chk)==(10-($sum%10))|| ($sum%10==0))
			return 1;
		else
			return 0;
	}
}

function checkuspsexpmail($no)
{
	if(strlen($no)!=13)
		return 0;
	else
	{
		if(strtoupper(substr($no,-2))=="US")
			$temp=substr($no,2,9);
		else
			return 0;
		//echo $temp."<br>";
		$temp=trim($temp);
		$len=strlen($temp);
		$chk=substr($temp,$len-1,1);
		//echo $chk."<br>";
		$temp=substr($temp,0,$len-1);
		$len=strlen($temp);
		//echo $temp."<br>";
		$sum=0;
		$sum+=8*(int)substr($temp,0,1);
		$sum+=6*(int)substr($temp,1,1);
		$sum+=4*(int)substr($temp,2,1);
		$sum+=2*(int)substr($temp,3,1);
		$sum+=3*(int)substr($temp,4,1);
		$sum+=5*(int)substr($temp,5,1);
		$sum+=9*(int)substr($temp,6,1);
		$sum+=7*(int)substr($temp,7,1);
		//echo $sum;
		$rem=$sum%11;
		if($rem==0)
			$rem=5;
		else if($rem==1)
			$rem=0;
		else
			$rem=11-$rem;
		if((int)($chk)==$rem)
			return 1;
		else
			return 0;
	}
}

function checknumber($tno)
{
		if(checkupsmp($tno)==0)
		{
			if(checkups($tno)==0)
			{
				if(checkfedex($tno)==0)
				{
					if(checkfedexg($tno)==0)
					{
						if(checkusps($tno)==0)
						{
							if(checkuspsexpmail($tno)==0){
								$_SESSION['error_message'] =  "No tracking information available at this time";
								header('Location: index.php?action=index');
							}else {
								$_SESSION['method'] =  "USPS";
								$_SESSION['trackinglink'] = 'https://tools.usps.com/go/TrackConfirmAction_input?qtc_tLabels1='.$_SESSION['tracking'].'';
								header('Location: https://secure.food4patriots.com/portal/index.php?action=results');
							}
						}
						else {
							$_SESSION['method'] =  "USPS";
							$_SESSION['trackinglink'] = 'https://tools.usps.com/go/TrackConfirmAction_input?qtc_tLabels1='.$_SESSION['tracking'].'';
							header('Location: https://secure.food4patriots.com/portal/index.php?action=results');
						}
					}
					else {
						$_SESSION['method'] =  "FedEx Ground";
						$_SESSION['trackinglink'] = 'http://www.fedex.com/Tracking?action=track&tracknumbers='.$_SESSION['tracking'].'';
						header('Location: https://secure.food4patriots.com/portal/index.php?action=results');
					}
				}
				else {
					$_SESSION['method'] =  "FedEx";
					$_SESSION['trackinglink'] = 'http://www.fedex.com/Tracking?action=track&tracknumbers='.$_SESSION['tracking'].'';
					header('Location: https://secure.food4patriots.com/portal/index.php?action=results');
				}
			}
			else {
				$_SESSION['method'] =  "UPS";
				$_SESSION['trackinglink'] = 'http://wwwapps.ups.com/WebTracking/track?track=yes&trackNums='.$_SESSION['tracking'].'';
				header('Location: https://secure.food4patriots.com/portal/index.php?action=results');
			}
		}else {
				$_SESSION['method'] =  "UPS Mail Piece";
				$_SESSION['trackinglink'] = 'http://www.ups-mi.net/packageID/packageid.aspx?pid='.$_SESSION['tracking'].'';
				header('Location: https://secure.food4patriots.com/portal/index.php?action=results');
				}
}

checknumber($no);

/*echo $_SESSION['tracking'];
echo '<br>';
echo $no;*/
}
 
 
exit();
?>

