<?php

	include ('header.php');

    if(!empty($_SESSION['user'])) {

		echo"<script>window.location='user/index.php';</script>";
	}

    if (isset($_POST['login'])) {

        if (empty($_POST['email']) || empty($_POST['password'])) {

            echo'
	        	<div class="overlay">
					<div class="popup">
						<a class="close" href="account.php">&times;</a>
						<div class="content">
							<h2>Failed</h2>
							<p>Please Fill Your Username or Password</p>
						</div>
					</div>
				</div>
        	';
        
        } else {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $email2 = stripslashes($email);
            $password2 = stripslashes($password);
            $email3 = $connection->real_escape_string($email2);
            $password3 = $connection->real_escape_string($password2);
            $password4 = md5($password3);
            $sql="SELECT userID,email,password,role FROM user WHERE email='$email3' AND password='$password4'";
            $result = $connection->query($sql);
            $verify = $result->num_rows;
			if ($verify == 1) {
				$getID = $result->fetch_array();
            	$id = $getID['userID'];
            	$role = $getID['role'];

            	if ($role == 'USER') {
                	$_SESSION['user'] = $id;
              		$_SESSION['role'] = $role; 
                	header("location:user/index.php");

                } elseif ($role == 'ADMIN') {

                	$_SESSION['user'] = $id;
                	$_SESSION['role'] = $role;  
                	header("location:admin/index.php");

                } else {

	                echo'
		        		<div class="overlay">
							<div class="popup">
								<a class="close" href="account.php">&times;</a>
								<div class="content">
									<h2>Failed</h2>
									<p>Unauthorized user attempt</p>
								</div>
							</div>
						</div>
	        		';
                }

            } else {

                echo'
	        		<div class="overlay">
						<div class="popup">
							<a class="close" href="account.php">&times;</a>
							<div class="content">
								<h2>Failed</h2>
								<p>Email/Password Are Not Recognize</p>
							</div>
						</div>
					</div>
        		';
            }            
        }
    }

	if (isset($_POST['register'])) {
		$fname = $connection->real_escape_string($_POST['fname']);
        $lname = $connection->real_escape_string($_POST['lname']);
        $email = $connection->real_escape_string($_POST['email']);
        $password = $connection->real_escape_string($_POST['password']);
        $fullname = $fname . ' ' . $lname;
        $pass = md5($password);
        $search = "SELECT email,role FROM user WHERE userEmail='$email'";
        $result = $connection->query($search);
        $verify = $result->num_rows;

        if ($verify > 0) {
  
        	echo'
        		<div class="overlay">
					<div class="popup">
						<a class="close" href="account.php">&times;</a>
						<div class="content">
							<h2>Failed</h2>
							<p>Sorry, email already registered.</p>
						</div>
					</div>
				</div>
        	';

        } else {

        	$sql = "INSERT INTO user(username, email, password, role) 
        	VALUES ('$fullname', '$email', '$pass', 'USER')";

        	if ($connection->query($sql) === TRUE){

	        	echo'
	        		<div class="overlay">
						<div class="popup">
							<a class="close" href="account.php">&times;</a>
							<div class="content">
								<h2>Success</h2>
								<p>Your account registered successfully. Now you can login to your account.</p>
							</div>
						</div>
					</div>
	        	';

	        } 
        }
	}

	echo '
		<div class="body-main">
			<div class="wrap">
				<br>
				<div class="account-content">
					<div class="account-grid-left">
						<h2>Sign-In</h2>
						<form action="" method="POST">
							<h4>Email</h4>
							<input type="email" name="email" required>
							<h4>Password</h4>
							<input type="password" name="password" required>
							<br><br>
							<button class="btn-submit" type="submit" name="login">Login</button>
							&nbsp;&nbsp;
							<button class="btn-submit" type="reset">Clear</button>
						</form>
					</div>
					<div class="account-grid-right">
						<h2>Registration</h2>
						<form action="" method="POST">
							<h4>First Name</h4>
							<input type="text" name="fname" required>
							<h4>Last Name</h4>
							<input type="text" name="lname" required>
							<h4>Email</h4>
							<input type="email" name="email" required>
							<h4>Password</h4>
							<input type="password" name="password" required>

							<br><br>
							<button class="btn-submit" type="submit" name="register">Sign-Up</button>
							&nbsp;&nbsp;
							<button class="btn-submit" type="reset">Clear</button>
						</form>
					</div>
				</div>
				<br><br>
			</div>
		</div>
	';
?>