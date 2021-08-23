<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="cs/style.css">
</head>
<body>
	<div class="appheader"><h2>Appointments</h2></div>
	<div class="container">
	<?php
    	$query = "SELECT * from appointment";
		$result =mysqli_query($db, $query); 
            if($result)
           	{
           		echo "<ol>";
             	while ($row=mysqli_fetch_array($result)) {
                  	$username=$row["username"];
                  	$councellor=$row["councellor"];
                  	$contact=$row["contact"];
                  	$date=$row["date2"];
                	
            		echo "<li><h3>Username:</h3>$username<br> 
            			<h3>Councellor:</h3>$councellor<br> 
            			<h3>Contact:</h3>$contact<br> 
            			<h3>Date:</h3>$date<br></li>";
            		echo "<br>";
                }
                echo "</ol>";
            }
     ?>
 </div>
 <h2 class="title">ListenUp<br>Admin Page</h2>
 <a href="login.php"><img src="images/Logo.png" height="250" width="250" class="adminlogo"></a>
	<div class="loginbox">
	<div class="header">
		<h2>Register Councellor</h2>
	</div>
	<img src="images/avatar.jpg" class="avatar">
	<form method="post" action="admin.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Councellor name</label>
			<input type="text" name="Councellor">
		</div>
		<div class="input-group">
			<label>College</label>
			<input type="text" name="College">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="emailc">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="passwordc_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="passwordc_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_coun">Register</button>
		</div>

	<?php  if (isset($_SESSION['Councellor'])) : ?>
			<p><strong>Councellor registered</strong></p>
			<p> <a href="login.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
</body>
</html>