<?php
if (isset($_POST["submit"])) {
if (!isset($_POST['name'])) {
$error="<br />Please enter your name";
}
if (!isset($_POST['email'])) {
$error.="<br />Please enter your email address";
}
if (!isset($_POST['subject'])) {
$error.="<br />Please enter a subject";
}
if (!isset($_POST['message'])) {
$error.="<br />Please enter a message";
}
if ($_POST['email']!="" AND !filter_var($_POST['email'],
FILTER_VALIDATE_EMAIL)) {
$error.="<br />Please enter a valid email address";
}
$recaptcha_secret = "6LehmgETAAAAAHAzhqDMvdn5VwDsf6hMC_wXbgIr";
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
$response = json_decode($response, true);
if(!$response["success"] === true) {            
$error.="<br />You are a robot!";
}

if ($error) {
$result='<div class="alert alert-danger"><strong>There were error(s)
in your form:</strong>'.$error.'</div>';
} else {
$db_name = "mlawdayc_contactform"; 
$db_pass = ""; 
$db_user = ""; 
$db_host = "localhost"; 

$con = mysql_connect($db_host,$db_user,$db_pass) or die("Couldn't connect because:".mysql_error()); 

mysql_select_db($db_name,$con) or die("Couldn't select Db because:".mysql_error());




$query="INSERT INTO `users` (`name`, `email`, `subject`, `message`) VALUES ('".$_POST['name']."', '".$$_POST['email']."',
                   '".$_POST['subject']."', '".$_POST['message']."');";

mysqli_query($query);

if (mail("mlawday@gmail.com", $_POST['subject'], "Name: ".
$_POST['name']."
Email: ".$_POST['email']."
message: ".$_POST['message'])) {
$result='<div class="alert alert-success"><strong>Thank
you!</strong> I\'ll be in touch.</div>';
} else {
$result='<div class="alert alert-danger">Sorry, there was
an error sending your message. Please try again later.</div>';
}
}
}
?>
