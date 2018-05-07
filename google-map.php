<?php
/*
Template Name: Google Map
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
<form method="post" action="process.php">
	Address : <input type="text" value="" name="address" /><br/>
	City :<input type="text" value="" name="city" /><br/>
	State : <input type="text" value="" name="state" /><br/>
	Country : <input type="text" value="" name="country" /><br/>
	Zip code :<input type="text" value="" name="zip" /><br/>
	<input type="submit" name="submit" value="Find Location" />
</form>
</div>

</body>
</html>
