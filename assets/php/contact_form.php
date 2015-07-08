<?php
//Fetching Values from URL
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
//sanitizing email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
//After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
if (!preg_match("/^[0-9]{10}$/", $contact)) {

$subject = $name;
// To send HTML mail, the Content-type header must be set
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:' . $email. "\r\n"; // Sender's Email
$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
$template = '<div style="color:black;">
Name: ' . $name . '<br/>'
. 'Email: ' . $email . '<br/>'
. 'Message: ' . $message . '';
$sendmessage = "<div style=color:#black;\">" . $template . "</div>";
// message lines should not exceed 70 characters (PHP rule), so wrap it
$sendmessage = wordwrap($sendmessage, 70);

// Send mail by PHP Mail Function
mail("rawr@huskilla.com", $subject, $sendmessage, $headers);
echo "Thanks for dropping us a line! We shall be in touch.";
}
} else {
echo "<span>* invalid email *</span>";
}

?>