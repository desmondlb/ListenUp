<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Appointment</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
	<style type="text/css">
  h1{
    color: white;
  }
		.container {
			width: 30%;
      top: 25%;
      left: 35%;
      position: absolute;
		}
		.btn-primary {
			width: 100%;
		}
    .topnav {
    background-color: #3679b5;
    overflow: hidden;
    left: 35%;
    top: 0;
    position: absolute;
    }
		body{
			background: url(1.jpg);
		}
    .logo {
    padding: 20px;
    float: left;
    }
    .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    }

/* Change the color of links on hover */
    .topnav a:hover {
    background-color: #0a60ad;
    
    }

/* Add a color to the active/current link */
    .topnav a.active {
    background-color: white;
    color: black;
    }

	</style>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script> 
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

	<script type='text/javascript'>
		$( document ).ready(function() {
			$('#datetimepicker1').datetimepicker();
		});
	</script>
    
</head>
<body>
<div class="logo">
               <img src="images/Logo.png" height="150"><h1 >ListenUp</h1>
            </div>
    <div class="topnav">
      <a href="login.php">Log Out</a>
      <a id="logo" href="Home.html">Home</a>
        <a href="appointment.php" class="active">Appoinment</a>
          <a href="blog1.html">Journal</a>
          <a href="#">Contact Us</a>
        </div>

<div class="container">
   <div class="panel panel-primary">
      <div class="panel-heading">Schedule an Appointment</div>
      <div class="panel-body">
         
            <form method="post" action="appointment.php">
               <div class="form-group">
                  <label class="control-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name">
               </div>
            

           		<div class="form-group">
                  <label class="control-label">Councellor</label>
                  <select class="form-control" name="cname" id="cname"><option>choose...</option>
                  	<?php
                  		$query = "SELECT * from professional";
						$result =mysqli_query($db, $query); 
                  		if($result)
                  		{
                  			while ($row=mysqli_fetch_array($result)) {
                  				$coun=$row["name"];
                  				echo "<option>$coun<br></option>";
                  			}

                  		}
                  	 ?>
                  </select>
               </div>
         
               <div class="form-group">
                  <label class="control-label">Contact number</label>
                  <input type="tel" class="form-control" name="no" id="no">
               </div>

               <div class="form-group">
                  <label class="control-label">Appointment Time</label>
                  <div class='input-group date' id='datetimepicker1'>
                     <input type='text' class="form-control" name="dt1" />
                     <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>
            
         <div class="form-group">
			<button type="submit" class="btn btn-primary" name="appn">Submit</button>
		</div>
		</form>
      </div>
   </div>
</div>
		
</body>
</html>