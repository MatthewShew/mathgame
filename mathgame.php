<?php
  session_start();
  $correct = false;
  if(empty($_SESSION["total"])){
    $_SESSION["right"] = 0;
    $_SESSION["total"] = 0;
    $message = "";
  }
  if (isset($_POST["submit"])) {
    if(is_numeric($_POST["answer"])){
      $_SESSION["total"] = $_SESSION["total"] + 1;
      if($_SESSION["operator"] == 1){
        if($_POST["answer"] == $_SESSION["num1"] + $_SESSION["num2"]){
          $_SESSION["right"] = $_SESSION["right"] + 1;
          $message = "Correct!";
          $correct = true;
        } else {
          $message = "INCORRECT, " . $_SESSION["num1"] . " + " . $_SESSION["num2"] . " is " 
                      . ($_SESSION["num1"] + $_SESSION["num2"]);
        }
      } else {
        if($_POST["answer"] == $_SESSION["num1"] - $_SESSION["num2"]){
          $_SESSION["right"] = $_SESSION["right"] + 1;
          $message = "Correct!";
          $correct = true;
        } else {
          $message = "INCORRECT, " . $_SESSION["num1"] . " - " . $_SESSION["num2"] . " is " 
                      . ($_SESSION["num1"] - $_SESSION["num2"]);
        }
      }
    } else {
      $message = "You must enter a number";
    }
  }
  $num1 = rand(0,20);
  $num2 = rand(0,20);
  $operator = rand(0,1);
  $_SESSION["num1"] = $num1;
  $_SESSION["num2"] = $num2;
  $_SESSION["operator"] = $operator;
  $score = $_SESSION["right"] . "/" . $_SESSION["total"];
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
  	<h1>MATH</h1>
  	<div class="container">
			<form action="" method="post">
  			<div class="row bold">
  				<div class="col-xs-4"><?php echo $num1 ?></div>
  				<div class="col-xs-4"><?php echo ($operator==0)?"-":"+"; ?></div>
          <div class="col-xs-4"><?php echo $num2 ?></div>
 		 		</div>
        <div class="row info">
          <div class="col-xs-12"><input type="text" name="answer" size="25" /></div>
        </div>
        <div class="row info">
          <div class="col-xs-6"><input type="submit" class="blue" name="submit" value="Submit" 
            placeholder="Enter your answer" /></div>
          <div class="col-xs-6"><form><button formaction="index.php">Logout</button></form></div>  
        </div>	
        <div class="info">
          <hr/>
          <?php echo ($correct)?"<div class=\"r\">$message</div>": "<div class=\"w\">$message</div>"; ?>
          <br/>
          <?php echo $score ?>
        </div>
  		</form>
  	</div>
  </body>
</html>