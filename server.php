<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";

	$Councellor = "";
	$College = "";
	$emailc = "";

	$name = "";
	$cname = "";
	$no = "";
	$dt = "";
	$dt1 = "";
	
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'username', 'password');
	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: Home.html');
		}

	}

	if (isset($_POST['reg_coun'])) {
		// receive all input values from the form
		$Councellor = mysqli_real_escape_string($db, $_POST['Councellor']);
		$College = mysqli_real_escape_string($db, $_POST['College']);
		$emailc = mysqli_real_escape_string($db, $_POST['emailc']);
		$passwordc_1 = mysqli_real_escape_string($db, $_POST['passwordc_1']);
		$passwordc_2 = mysqli_real_escape_string($db, $_POST['passwordc_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($Councellor)) { array_push($errors, "Name is required"); }
		if (empty($College)) { array_push($errors, "College is required"); }
		if (empty($emailc)) { array_push($errors, "Email is required"); }
		if (empty($passwordc_1)) { array_push($errors, "Password is required"); }

		if ($passwordc_1 != $passwordc_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$passwordc = md5($passwordc_1);//encrypt the password before saving in the database
			$query = "INSERT INTO professional (name, college, email, password) 
					  VALUES('$Councellor', '$College', '$emailc', '$passwordc')";
			mysqli_query($db, $query);

			$_SESSION['Councellor'] = $Councellor;
			$_SESSION['success'] = "Councellor registered";
			header('location: admin.php');
		}

	}
	if (isset($_POST['appn'])) {
		// receive all input values from the form
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$cname = mysqli_real_escape_string($db, $_POST['cname']);
		$no = mysqli_real_escape_string($db, $_POST['no']);
		$dt1 = mysqli_real_escape_string($db, $_POST['dt1']);

		// form validation: ensure that the form is correctly filled
		if (empty($name)) { array_push($errors, "Name is required"); }
		if (empty($cname)) { array_push($errors, "Choose a Councellor"); }
		if (empty($no)) {array_push($errors, "Contact number is required 10 digits"); }
		if (empty($dt1)) { array_push($errors, "set the date and time"); }
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			
			$query = "INSERT INTO appointment (username, councellor, contact, date2) 
					  VALUES('$name', '$cname', $no, '$dt1')";
			mysqli_query($db, $query);

			$_SESSION['name'] = $name;
			$_SESSION['success'] = "Appointment taken";
			header('location: appointment.php');
		}

	}
	// ... 

	// LOGIN USER

	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1 && $username!='admin') {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: Home.html');
			}
			else if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: admin.php');
			}

			else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>