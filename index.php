<?php
	$output = "";
	if( isset($_POST['email']) && isset($_POST['password']) && isset($_POST['message']) && $_POST['email']!='' && $_POST['password']!='' && $_POST['message']!='')
	{
		$output = shell_exec('/usr/bin/python /var/www/demopostfb/demo_post_fb.py -e "'.$_POST['email'].'" -p "'.$_POST['password'].'" -m "'.$_POST['message'].'"');
	}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Demo Automate Post Facebook.</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-xs-12 col-xs-offset-0">
			<h3>Demo Automate Post Facebook.</h3>
			<form method="POST">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputMessage1">Message</label>
			    <input name="message" type="text" class="form-control" id="exampleInputMessage1" placeholder="Message">
			  </div>  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
        <div class="row">
                <div class="col-md-4 col-md-offset-4 col-xs-12 col-xs-offset-0">
			<br><br><br>
			<pre>
				<?php echo htmlentities($output); ?>
			</pre>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
