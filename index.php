<?php
	
	if ($_POST["submit"]) {
		$result='<div class="alert alert-success">Form submitted</div>';
	

		if (!$_POST['name']) {
			$error.="<br />Please enter your name";
		}

		if (!$_POST['email']) {
			$error.="<br />Please enter your email";
		}

		if (!$_POST['comment']) {
			$error.="<br />Please enter your comment or question";
		}

		if ($_POST['email'] AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 
			$error.="<br />Please enter a valid email address";
		}

		if ($error) {
			$result='<div class="alert alert-danger"><strong>There were error(s) submitting your form:</strong>'.$error.'</div>';
		} else {
			if (mail("briangroat93@gmail.com", "Comment from Website", 

				"Name: ".$_POST['name']."

				Email: ".$_POST['email']."

				Comment: ".$_POST['comment'])) {

				$result='<div class="alert alert-success"><strong>Thank you!</strong> I\'ll be in touch shortly!</div>';
			} else {
				$result='<div class="alert alert-danger">I\'m afraid there was an error sending your message. Please try again.</div>';
			}
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<style type="text/css">
		.emailForm {
			border:1px solid grey;
			border-radius: 10px;
			margin-top: 20px;
		}

		form {
			padding-bottom: 20px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 emailForm">
			<h1>My email Form</h1>
			<?php echo $result; ?>
			<p class="lead">Please leave a message, and I'll personally get in touch with you as soon as possible</p>
			<form method="post">
				<div class="form-group">
					<label for="name">Your Name:</label>
					<input type="text" name="name" class="form-control" placeholder="Your Name" />
				</div>
				<div class="form-group">
					<label for="email">Your email:</label>
					<input type="email" name="email" class="form-control" placeholder="Your email" />
				</div>
				<div class="form-group">
					<label for="comment">Questions or Comments?:</label>
					<textarea name="comment" class="form-control"></textarea>
				</div>
				<input name="submit" type="submit" class="btn btn-success btn-lg" value="Submit" />
			</form>
		</div>
	</div>
</div>
</body>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>