<?php
if(count($_POST)>0) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	$message = ucwords($key) . " field is required";
	break;
	}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$message = 'Passwords should be same<br>'; 
	}
                   /*Mobile Number Validation*/
                    if(!isset($message)){
                    if(!filter_var($_POST["mobileNo"],FILTER_VALIDATE_MOBILENO)){
                    $message = "Mobile no should be 10 numbers";
	}
	}

	/* Email Validation */
	if(!isset($message)) {
	if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
	$message = "Invalid UserEmail";
	}
	}
condition
	if(!isset($message)) {
		require_once("database.php");
		$db_handle = new DBController();
		$query = "INSERT INTO registered_users (first_name, password, email,mobileno) VALUES
		('" . $_POST["firstName"] . "','" . $_POST["mobileNO"] . "', '" . md5($_POST["password"]) . "', '" . $_POST["userEmail"] . "')";
		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$message = "You have registered successfully!";	
			unset($_POST);
		} else {
			$message = "Problem in registration. Try Again!";	
		}
	}
}
?>

<html>
<head><title>Registration</title>
<style type="text/css">
    .container {
        width: 300px;
        clear: both;
    }
    .container input {
        width: 100%;
        clear: both;
    }

    </style></head>
<center>
<body>
<div class="container">
<form action="course.html" method="post">
<fieldset>
  <legend><h2>ONLINE COURSE REGISTRATION</h2></legend>
 <label>First Name:</label>
 <input type="text" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"><br />
 <label>Email Id:</label>
 <input type="text" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"><br />
<label>Password:</label>
 <input type="password" name="password" value=""><br />
<label>Confirm Password:</label>
 <input type="password" name="confirm_password" value=""><br />
 <label>Mobile NO:</label>
 <input type="text" name="mobileNo" value="<?php if(isset($_POST['mobileNo'])) echo $_POST['mobileNo']; ?>"><br />
College Name:  <select name="college">
<option value="0">select....</option>
<option value="1"></option></select><br><br>
 <form action="course">
<input type="submit" value="Submit">
</form></h3>
<a href="login.html">If Already Registered!</a>

</fieldset>
</form></div>
</body>
</center>
<html>
