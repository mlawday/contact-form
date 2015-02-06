<?php
if ($_POST["submit"]) {
if (!$_POST['name']) {
$error="<br />Please enter your name";
}
if (!$_POST['email']) {
$error.="<br />Please enter your email address";
}
if (!$_POST['subject']) {
$error.="<br />Please enter a subject";
}
if (!$_POST['message']) {
$error.="<br />Please enter a message";
}
if ($_POST['email']!="" AND !filter_var($_POST['email'],
FILTER_VALIDATE_EMAIL)) {
$error.="<br />Please enter a valid email address";
}
if ($error) {
$result='<div class="alert alert-danger"><strong>There were error(s)
in your form:</strong>'.$error.'</div>';
} else {
if (mail("mlawday@gmail.com, trevyn.meyer@gmail.com", $_POST['subject'], "Name: ".
$_POST['name']."
Email: ".$_POST['email']."
message: ".$_POST['message'])) {
$result='<div class="alert alert-success"><strong>Thank
you!</strong> I\'ll be in touch.</div>';
unset($_POST['name']);
unset($_POST['email']);
unset($_POST['subject']);
unset($_POST['message']);
} else {
$result='<div class="alert alert-danger">Sorry, there was
an error sending your message. Please try again later.</div>';
}
}
}
?>
