<?php
  session_start();
  session_destroy();
	if (isset($_POST["submit"])) {
		if('a@a.a' === $_POST['email'] && 'aaa' === $_POST['password']) {
      header("Location: index.php");
      exit();   
		} else {
      $invalid = "Invalid login credentials.";
    }
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Math Game</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link rel="stylesheet" href="css/math.css" type="text/css" />
      <meta charset="utf-8" />
    </head>
    <body>
    	<h1>Please login to enjoy our math game.</h1>
    	<div class="container">
  			<form action="" method="post">
    			<div class="row">
      				<div class="col-xs-4 right">Email:</div>
      				<div class="col-xs-4"><input type="text" name="email" size="25" placeholder="Email" /></div>
   		 		</div>
    			<div class="row">
			      <div class="col-xs-4 right">Password:</div>
			      <div class="col-xs-4"><input type="text" name="password" size="25"/ placeholder="Password"></div>
    			</div>
    			<div class="row text-center">
      			<div class="col-xs-12"><input type="submit" class="blue" name="submit" value="Login" /></div>
      		</div>
          <div class="row invalid">
            <?php if(isset($_POST["submit"])){echo $invalid;} ?>
          </div>
    		</form>
    	</div>
    </body>
</html>