<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="cs/style.css">
</head>
<body>
	<div class="listenup">
		<h1 class="title">ListenUp</h1>
		<h2 class="h">Need Someone To Talk To? <br><br> We Are Here To Listen!</h2>
	</div>
	<img src="images/Logo.png" height="130" width="130" class="loginlogo">
	</div>
	<div class="loginbox">
	<div class="header">
		<h2>Login</h2>
	</div>
	<img src="images/avatar.jpg" class="avatar">

	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
</html>