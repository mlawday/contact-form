<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dallas Cowboys Fans</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="_assets/css/jqm-demos.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link rel="icon" type="image/png" href="star.png"/>
	<script >
		
function validateContactForm()
{

	var error="<strong>There were error(s) in your form:</strong>";
	var errorMsg=new Array();
	
	
    var name = document.ContactForm.name;
    var email = document.ContactForm.email;
    var message = document.ContactForm.message; 
    var subject = document.ContactForm.subject;
	
	 if (name.value == "")
    {		
		errorMsg.push("<br />Please enter your name");
    }
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (email.val == "" || !re.test(email.value))
	{
        errorMsg.push("<br />Please enter a valid email.");
	}
	if (subject.value == "")
    {
        errorMsg.push("<br />Please enter a subject.");
	
    }
	if (message.value == "")
    {
		errorMsg.push("<br />Please enter a message.");
    }
	
	var messageHtml="";
	
	errorMsg.forEach(function(comment) {
		messageHtml += comment;
	}); 
		if(messageHtml.length > 0){
		$("#error").show();
		document.getElementById("error").innerHTML = error + messageHtml;
		return false;
		} else {
			$("#error").hide();
			$("#success").show();
			document.getElementById("success").innerHTML = "<strong>Thank you!</strong> I'll be in touch.";
			return true;
		}
	}	
	</script>
	 <script src='https://www.google.com/recaptcha/api.js'></script>
	<style>
	
	body { 
		background: url(dallas.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	
	.whiteBackground{
		background-color:white;
		padding:20px;
		border-radius:20px;
		margin-top:20px;
	}
	
	h1 {
        margin: 15px 0 25px 0;
		text-align: center;
      }
	  
	.g-recaptcha{
		padding-bottom:10px;
	}
	</style>
	
	
</head>
<body>	

	<? $link = mysqli_connect("localhost", "mlawdayc", "T4CRvuQ!D*R", "mlawdayc_contactform");
	
		$query = "SELECT * FROM users";?>

	<?php include 'email.php'; ?>
	<div class="container" style="margin-top:50px">
			
				<div class='row whiteBackground'>
					<h1>Contact Form</h1>
					<?php echo $result; ?>
						<div id="error" class='alert alert-danger'> </div>
						<div id="success" class="alert alert-success"></div>
						<form name="ContactForm" method="post" class="form-horizontal" id="validationForm" onsubmit="return validateContactForm();" >
							
							<div class="form-group name">
								<label for="name" class="col-sm-2 control-label">Name</label>
								<div class="col-sm-10">
									<input type="text" name="name" id="name" class="form-control" placeholder="Your Name"
									 />
								</div>
							</div>
							<div class="form-group email">
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="email" placeholder="Your Email"  />
								</div>
							</div>
							<div class="form-group subject">
								<label for="subject" class="col-sm-2 control-label">Subject</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="subject" placeholder="Subject Message" />
								</div>
							</div>
							<div class="form-group message">
								<label for="message" class="col-sm-2 control-label">Message</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="message" placeholder="Your message..."></textarea>
								</div>
							</div>
							<div class="g-recaptcha col-sm-offset-2" id="recaptcha" name="recaptcha" data-sitekey="6LehmgETAAAAAKSi_P8IFa9f7sqS5XXW0UK7PQDv" ></div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="submit" name="submit" class="btn btn-success btn-lg" value="Send Message"/>
									
								</div>
							</div>
							
						</form>		
		</div>
<script>$("#error").hide();</script>
<script>$("#success").hide();</script>
</body>
</html>
