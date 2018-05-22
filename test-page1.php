<?php 
function hide_update_notice_to_all_but_admin_users()
{
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );
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

<div class="container-fluid">
  <h1>Control Panel</h1>
  
<div class="row">
  <div class="col-sm-2">
  	<div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control" id="sel1">
  	<option selected>Select</option>
    <option>Parent Theme</option>
    <option>Child Theme</option>
    <option>Plugin</option>
  </select>
</div>
  </div>
  <div class="col-sm-6">optins</div>
</div>

</div>

</body>
</html>
