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
$dbhost = 'localhost';
$dbuser = 'mlawdayc_main';
$dbpass = 'xpiWZDypDfOP';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$query="INSERT INTO users ".
       "(name, email, subject, message) ".
       "VALUES ".
       "('$name','$email','$subject', '$message')";

mysql_select_db('mlawdayc_contactform');
mysql_query( $query, $conn );

mysql_close($conn);

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
