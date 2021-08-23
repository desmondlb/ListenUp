<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="cs/style.css">
</head>
<body>
	<div class="listenup">
		<h1 class="title">ListenUp</h1>
		<h2 class="h">Need Someone To Talk To? <br><br> We Are Here To Listen!</h2>
	</div>
	<img src="images/Logo.png" height="130" width="130" class="loginlogo">
	<div class="loginbox">
	<div class="header">
		<h2>Register</h2>
	</div>
	<img src="images/avatar.jpg" class="avatar">

	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</div>

	
</body>
</html>